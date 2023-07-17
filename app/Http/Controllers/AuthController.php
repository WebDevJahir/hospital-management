<?php

namespace App\Http\Controllers;

use DB;
use App\Event;
use Exception;

use App\UserRole;
use App\Models\User;
use App\Http\Requests;
use App\ForgetPassword;
use App\UserPermission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Nahid\SslWSms\Facades\Sms;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller
{

  public function index()
  {
    if (Auth::check()) {
      return Redirect::to("dashboard");
    }
    return view('login');
  }

  public function userPanelLogin()
  {
    if (Auth::check() && Auth::user()->control_type == 'User') {
      return Redirect::to("user-panel");
    }
    return view('user_login');
  }

  public function userLoginPage()
  {
    return view('frontend.user_login.user_login');
  }

  public function postLogin(Request $request)
  {
    request()->validate([
      'email' => 'required',
      'password' => 'required:min:6',

    ]);

    $user = User::where('email', $request->email)->first();
    if (!$user || !Hash::check($request->password, $user->password)) {
      return response('Login invalid', 503);
    }

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      $user->createToken('web')->plainTextToken;
      // Authentication passed...
      if (Auth::user()->type == 'Admin' || Auth::user()->type == 'Doctor' || Auth::user()->type == 'employee' && Auth::user()->control_type == 'Admin') {
        $user = User::where('id', Auth::id())->first();
        $role = UserRole::where('id', $user->role_id)->first();
        $userPermission = UserPermission::where('role', $role->id)->first();
        if ($userPermission) {
          $permission = json_decode($userPermission->permission);
          Session::put('permission', $permission);
        }
        return redirect()->intended('/dashboard');
      } else {
        return redirect()->intended('/');
      }
    }
    return redirect()->back()->withErrors(['log_in' => ['Username or password error.']]);
  }

  public function userPostLogin(Request $request)
  {
    request()->validate([
      'email' => 'required',
      'password' => 'required:min:6',

    ]);
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      if (Auth::user()->type == 'Doctor' || Auth::user()->type == 'employee' && Auth::user()->control_type == 'User') {
        $user = User::where('id', Auth::id())->first();
        $role = UserRole::where('id', $user->role_id)->first();
        $userPermission = UserPermission::where('role', $role->id)->first();
        if ($userPermission) {
          $permission = json_decode($userPermission->permission);
          Session::put('permission', $permission);
        }
        return redirect()->intended('/user-panel');
      }
    }
    return redirect()->back()->withErrors(['log_in' => ['Username or password error.']]);
  }

  public function userLogin(Request $request)
  {
    request()->validate([
      'username' => 'required',
      'password' => 'required:min:6',
    ]);
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      // Authentication passed...
      return redirect()->intended('/my-panel');
    }

    return redirect()->back()->withErrors(['log_in' => ['Username or password error.']]);
  }

  public function dashboard()
  {

    if (Auth::check()) {

      return view('dashboard.dashboard');
    }
    return Redirect::to("admin-login")->withErrors(['log_in' => ['Opps! You do not have access']]);
  }

  public function logout()
  {
    if (Auth::check() && Auth::user()->type == 'user') {
      Session::flush();
      Auth::logout();
      return Redirect('/');
    } else {
      Session::flush();
      Auth::logout();
      return Redirect('admin-login');
    }
  }

  public function postRegistration(Request $request)
  {
    $otp = rand(100000, 1000000);

    $addUser = new User();
    $addUser->username = $request->username;
    $addUser->name = $request->name;
    $addUser->email = $request->email;
    $addUser->password = Hash::make($request->password);
    $addUser->mobile = $request->mobile;
    $addUser->otp_number = $otp;
    if ($addUser->save()) {
      $message = 'your otp number is ' . $otp . ' for hospice account activation';
      $msg = Sms::message($request->mobile, $message)->send();

      if ($msg->parameter == 'ok' and $msg->login == 'successfull') {
        echo 'Messages Sent';
      }
    }
  }

  public function SendForgetPasswordOTP(Request $request)
  {
    $find_mail_user = User::where('email', $request->phone_or_email)->first();
    if ($find_mail_user) {
      if ($find_mail_user) {
        $send_otp = new ForgetPassword();
        $send_otp->phone_or_email = $find_mail_user->email;
        $send_otp->otp = rand(0, 9999999);
        $send_otp->save();
        $mobile_or_email = $find_mail_user->email;

        Mail::raw("You forgot password otp is $send_otp->otp", function ($message) use ($mobile_or_email) {
          $message->to($mobile_or_email)
            ->subject('Forgot Password OTP Request');
        });
        return view('frontend.auth.verify_otp', compact('mobile_or_email'))->with('OTP send successfully');
      } else {
        $find_user = User::where('mobile', $request->phone_or_email)->first();
        if (!empty($find_user)) {
          $send_otp = new ForgetPassword();
          $send_otp->phone_or_email = $find_user->mobile;
          $send_otp->otp = rand(0, 9999999);
          $send_otp->save();
          $mobile_or_email = $find_user->mobile;
          $msisdn = $find_user->mobile;
          $messageBody = "Your forgot password otp is " . $send_otp->otp;
          $csmsId = Str::random(10); // csms id must be unique
          $this->singleSms($msisdn, $messageBody, $csmsId);
          return view('frontend.auth.verify_otp', compact('mobile_or_email'))->with('OTP send successfully');
        }
      }
    } else {
      return redirect('forgot-password')->with('error', 'Email or phone number not found');
    }
  }

  public function verifyOTP(Request $request)
  {
    $new_password = Str::random(10);
    $user = User::where('mobile', $request->mobile_or_email)->first();
    if ($user) {
      $user->password = Hash::make($new_password);
      $user->update();
      $msisdn = $user->mobile;
      $messageBody = "Your current password is " . $new_password;
      $csmsId = Str::random(10); // csms id must be unique
      $this->singleSms($msisdn, $messageBody, $csmsId);
      $delete_otp = ForgetPassword::where('phone_or_email', $user->mobile)->delete();
      return redirect('/')->with('success', 'We sent a new password to your mobile number');
    } else {
      $mail_user = User::where('email', $request->mobile_or_email)->first();
      $mail_user->password = Hash::make($new_password);
      $mail_user->update();
      $mobile_or_email = $mail_user->email;
      Mail::raw("You new password is $new_password", function ($message) use ($mobile_or_email) {
        $message->to($mobile_or_email)
          ->subject('Forgot password updated');
      });
      $delete_otp = ForgetPassword::where('phone_or_email', $mail_user->email)->delete();
      return redirect('/')->with('success', 'We sent a new password to your email');
    }
  }

  function singleSms($msisdn, $messageBody, $csmsId)
  {
    $params = [
      "api_token" => "hospicebd-a08446a0-e20e-4e6f-9295-81f6d09dc790",
      "sid" => "HOSPICEBDBRAND",
      "msisdn" => $msisdn,
      "sms" => $messageBody,
      "csms_id" => $csmsId
    ];
    $url = "https://smsplus.sslwireless.com/api/v3/send-sms";
    $params = json_encode($params);

    $this->callApi($url, $params);
  }


  function callApi($url, $params)
  {

    $ch = curl_init(); // Initialize cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($params),
      'accept:application/json'
    ));

    $response = curl_exec($ch);

    curl_close($ch);

    return $response;
  }
}
