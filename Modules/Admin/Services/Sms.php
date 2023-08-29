<?php

namespace Modules\Admin\Services;

use App\Models\User;

class Sms
{
    public function sendSms($msisdn, $messageBody, $csmsId)
    {
        $params = [
            "api_token" => env('SMS_API_TOKEN'),
            "sid" => env('SMS_SID'),
            "msisdn" => $msisdn,
            "sms" => $messageBody,
            "csms_id" => $csmsId
        ];
        $url = env('SMS_URL');
        $params = json_encode($params);

        $this->callApi($url, $params);
    }


    private function callApi($url, $params)
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
