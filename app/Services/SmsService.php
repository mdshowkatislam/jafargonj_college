<?php

namespace App\Services;

use App\Models\AppConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * Class SmsService
 * @package App\Services
 */
class SmsService
{
    public function sendSms($phone, $message)
    {
        $phoneNumber = substr(preg_replace('/[^0-9]/', '', $phone), -11);

        $request_array = [
            "username" => "BUPadmin",
            "password" => "Bup@Api&20",
            "apicode" => "1",
            "msisdn" => $phoneNumber,
            "countrycode" => "880",
            "cli" => "BUP",
            "messagetype" => "1",
            "message" => $message,
            "messageid" => "0"
        ];

        $sms = Http::withOptions(['verify' => false])->withHeaders([
            'Content-Type' => 'application/json'
        ])
            ->send('POST', 'https://gpcmp.grameenphone.com/ecmapigw/webresources/ecmapigw.v2', [
                'body' => json_encode($request_array)
            ])->json();

        return $sms;
    }

}
