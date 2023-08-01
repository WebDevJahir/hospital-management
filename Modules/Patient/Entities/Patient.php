<?php

namespace Modules\Patient\Entities;

use App\Models\User;
use Modules\Admin\Entities\City;
use Modules\Admin\Entities\Upazila;
use Illuminate\Database\Eloquent\Model;
use Modules\Patient\Entities\PainStatus;
use Modules\Patient\Entities\PatientDetail;
use Modules\Patient\Entities\ConcernDisease;
use Modules\Patient\Entities\CurrentProblem;
use Modules\Patient\Entities\PrimaryDisease;
use Modules\Admin\Entities\IncomeSubCategory;
use Modules\Patient\Entities\PatientReferral;
use Modules\Patient\Entities\FunctionalStatus;
use Modules\Patient\Entities\PreviousTreatment;
use Modules\Patient\Entities\PsychologicalStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $gaured = [];

    public function package()
    {
        return $this->hasOne(IncomeSubCategory::class, 'id', 'package_id');
    }

    public function details()
    {
        return $this->hasOne(PatientDetail::class, 'patient_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function patientReferral()
    {
        return $this->hasOne(PatientReferral::class, 'patient_id', 'id');
    }

    public function primaryDiseases()
    {
        return $this->hasOne(PrimaryDisease::class, 'patient_id', 'id');
    }

    public function concernDiseases()
    {
        return $this->hasOne(ConcernDisease::class, 'patient_id', 'id');
    }

    public function previousTreatment()
    {
        return $this->hasOne(PreviousTreatment::class, 'patient_id', 'id');
    }

    public function functionStatus()
    {
        return $this->hasOne(FunctionalStatus::class, 'patient_id', 'id');
    }

    public function psychologicalStatus()
    {
        return $this->hasOne(PsychologicalStatus::class, 'patient_id', 'id');
    }

    public function currentProblem()
    {
        return $this->hasOne(CurrentProblem::class, 'patient_id', 'id');
    }

    public function painStatuses()
    {
        return $this->hasMany(PainStatus::class, 'patient_id', 'id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function thana()
    {
        return $this->hasOne(Upazila::class, 'id', 'thana_id');
    }
}
