<?php

namespace Modules\Admin\Services;

use Illuminate\Support\Facades\Mail;
use Modules\Admin\Entities\Project;

class SendMail
{
    public static function handel($email, $data)
    {
        $messageData = [
            'email' => $email,
            'patient_id' => $data['patient_id'],
            'patient_name' => $data['patient_name'],
            'password' => $data['password'],
            'package' => $data['package'],
            'reg_no' => $data['reg_no'],
            'phone' => $data['phone'],
            'project' => $data['project'],
        ];
        $sent =  Mail::send('email.sign_up_mail', $messageData, function ($message) use ($email) {
            $message->to($email)->cc('support@hospicebangladesh.com')->subject('Hospice Bangladesh - Thanks for Registration');
        });
    }
}
