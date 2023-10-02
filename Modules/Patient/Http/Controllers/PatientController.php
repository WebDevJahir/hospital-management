<?php

namespace Modules\Patient\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Package;
use Modules\Patient\Entities\Patient;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Modules\Admin\Entities\District;
use Modules\Admin\Entities\PoliceStation;
use Modules\Admin\Services\Sms;
use Illuminate\Support\Str;
use Modules\Accounts\Entities\Invoice;
use Modules\Accounts\Entities\InvoiceDetail;
use Modules\Admin\Entities\Project;
use Modules\Admin\Services\SendMail;
use Modules\Patient\Http\Requests\PatientRequest;
use PhpMyAdmin\Plugins\Schema\Dia\Dia;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $patients = Patient::with('user', 'package.incomeSubCategory')->latest()->take(20)->get();
        return view('patient::patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $max_reg_no = Patient::latest()->value('registration_no');

        $districts = District::latest()->get();
        $police_stations = PoliceStation::latest()->get();

        $package = Package::with('incomeSubCategory')
            ->whereHas('incomeSubCategory', function ($query) {
                $query->where('name', 'Free');
            })
            ->first();
        $reg_no = $max_reg_no ? $max_reg_no + 1 : Date('Y') . '-' . '01';
        $patient = new Patient();
        return view('patient::patient.modals.modal', compact('reg_no', 'districts', 'police_stations', 'package', 'patient'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PatientRequest $request)
    {
        $reg_no = Patient::max('registration_no') ? Patient::max('registration_no') + 1 : Date('Y') . '-' . '01';
        $data = $request->except('_token', '_method', 'confirm_password', 'email', 'package');
        $data['registration_no'] = $reg_no;
        //data for user table
        $userData = $request->only(['name', 'email', 'contact_no']);
        $userData['password'] =  Hash::make($data['password']);
        DB::beginTransaction();
        $user = User::create($userData);
        //patient data
        $data['user_id'] = $user->id;
        $patient = Patient::create($data);
        DB::commit();
        //send sms
        $msisdn = $data['contact_no'];
        $messageBody = $data['name'] . ", Thanks for your registration in Hospice Bangladesh.You successfully created an account at Hospice Bangladesh. You agreed our Terms & Conditions.";
        $csmsId = Str::random(10); // csms id must be unique
        $sms = new Sms();
        $sms->sendSms($msisdn, $messageBody, $csmsId);
        //send mail
        $package = Package::whereIncomeSubCategoryId('13')->first();
        $project = Project::find($package->id);
        if (!empty($patient->email)) {
            $messageData = [
                'patient_id' => $patient->id,
                'patient_name' => $patient->name,
                'password' => $data['password'],
                'package' => $package,
                'reg_no' => $reg_no,
                'phone' => $patient->contact_no,
                'project' => $project,
            ];
            $sent = SendMail::handel($patient->email, $messageData);
        }
        return redirect()->route('patient.index')->with('success', 'Patient created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('patient::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Patient $patient)
    {
        $reg_no = Patient::max('registration_no');
        $districts = District::latest()->get();
        $police_stations = PoliceStation::whereDistricId($patient->district_id)->latest()->get();
        return view('patient::patient.modals.modal', compact('patient', 'reg_no', 'districts', 'police_stations'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $data = $request->except('_token', '_method', 'confirm_password', 'email', 'package');
        //data for user table
        $userData = $request->only(['name', 'email', 'contact_no']);
        $userData['password'] =  Hash::make($data['password']);
        DB::beginTransaction();
        $user = User::find($patient->user_id);
        $user->update($userData);
        //patient data
        $patient->update($data);
        DB::commit();
        return redirect()->route('patient.index')->with('success', 'Patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function planAndStatusEdit(Request $request)
    {
        $patient = Patient::find($request->id);
        $packages = Package::latest()->get();
        return view('patient::patient.modals.plan_modal', compact('patient', 'packages'));
    }

    public function planAndStatusUpdate(Request $request, $id)
    {
        $patient = Patient::with('package')->findOrFail($request->id);
        $package = Package::find($request->package_id);
        $now = Carbon::now();

        $invoice_no = Invoice::max('invoice_no');
        $invoice_array = explode('-', $invoice_no);
        $invoice_no = $invoice_array[0] . '-' . ($invoice_array[1] + 1);
        $invoice_no = $invoice_no ?: $now->format('Ym') . '-1';

        $patientData = [
            'package_id' => $request->package_id,
            'last_payment_date' => '',
            'due_payment_date' => '',
            'reminder_date' => '',
            'status' => $request->status,
        ];

        if ($request->package_id != '13' && $request->status != 'Died') {
            $dueDate = $now->addDays($package->duration);
            $reminderDate = $dueDate->copy()->subDays(3);

            $patientData['last_payment_date'] = $package->duration === 'continue' ? 'continue' : $now->toDateString();
            $patientData['due_payment_date'] = $package->duration === 'continue' ? 'continue' : $dueDate->toDateString();
            $patientData['reminder_date'] = $package->duration === 'continue' ? 'continue' : $reminderDate->toDateString();

            $invoiceData = [
                'patient_id' => $patient->user_id,
                'invoice_date' => $now->toDateString(),
                'invoice_no' => $invoice_no++,
                'invoice_type' => 'package',
                'sub_total' => $package->price,
                //'discount' => 0,
                //'delivery_method' => null,
                //'advance' => 0,
                'city_id' => $patient->city_id,
                //'collection_charge' => 0,
                //'delivery_charge' => 0,
                //'service_charge' => 0,
                'due' => $package->price,
                'total' => $package->price,
                'project_id' => $package->id,
                'payment_status' => 'due',
            ];

            $invoiceDetailData = [
                'income_head_id' => $package->income_head_id,
                'income_subcategory_id' => $package->income_sub_category_id,
                'quantity' => 1,
                'price' => $package->price,
                'total' => $package->price,
                'invoice_date' => $now->toDateString(),
            ];
        }

        DB::beginTransaction();
        $patient->update($patientData);
        if (isset($invoiceData)) {
            $invoice = Invoice::create($invoiceData);
            $invoiceDetailData['invoice_id'] = $invoice->id;
            InvoiceDetail::create($invoiceDetailData);
        }
        DB::commit();
        return redirect()->route('patient.index')->with('success', 'Patient plan and status updated successfully');
    }
}
