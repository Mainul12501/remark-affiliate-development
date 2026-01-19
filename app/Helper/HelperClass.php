<?php

namespace App\Helper;

use App\Models\User;
use App\Models\UserInfo;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Xenon\LaravelBDSms\Facades\SMS;
use Xenon\LaravelBDSms\Provider\Ssl;
use Xenon\LaravelBDSms\Sender;
use Exception;

class HelperClass
{
    public static function createAndLoginUser($request)
    {
        $user = DB::transaction(function () use ($request) {
            $user = User::createOrUpdateUser($request);
            $userInfo = UserInfo::createOrUpdateUserInfo($request, $user);
            return $user;
        });
        Auth::login($user);
        return $user;
    }

    public static function sendOtpSms($to, $message = '')
    {
//        SMS::shoot($to, $message);
        $sender = Sender::getInstance();
        $sender->setProvider(Ssl::class); //change this provider class according to need
        $sender->setMobile($to);
        $sender->setMessage($message);
        $sender->setQueue(false); //set true if you want to sent sms from queue
        $sender->setConfig(
            [
                'api_token' => "pndhzxym-cf4ugvbx-4vzvcozb-yma2movv-u3ub0k7e",
                'sid' => "HERLANOTP",
                'csms_id' => uniqid(),
            ]
        );
        $status = $sender->send();
        return $status;
    }

//public $apiUrl = "https://smsplus.sslwireless.com/";
//public $apiToken = "pndhzxym-cf4ugvbx-4vzvcozb-yma2movv-u3ub0k7e";
//public $sid = "HERLANOTP";
//
//    public  function sendSmsToNumber(string $phone, string $message)
//    {
//        // Generate unique ID for the SMS
//        $csmsId = uniqid();
//
//        // Prepare the request data
//        $url = rtrim($this->apiUrl, '/') . "/api/v3/send-sms";
//        $params = json_encode([
//            "api_token" => $this->apiToken,
//            "sid"       => $this->sid,
//            "msisdn"    => $phone,
//            "sms"       => $message,
//            "csms_id"   => $csmsId,
//        ]);
//
//        // Make the cURL request
//        try {
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, $url);
//            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
//            curl_setopt($ch, CURLOPT_HTTPHEADER, [
//                'Content-Type: application/json',
//                'Content-Length: ' . strlen($params),
//                'Accept: application/json'
//            ]);
//
//            // Execute the request and handle the response
//            $response = curl_exec($ch);
//            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//            curl_close($ch);
//
//            // Log the response
//            if ($httpCode == 200) {
//                Log::info("SMS sent to {$phone}: " . $response);
//            } else {
//                Log::error("Failed to send SMS to {$phone}: " . $response);
//            }
//        } catch (Exception $e) {
//            Log::error("Exception occurred while sending SMS to {$phone}: " . $e->getMessage());
//        }
//    }


    /**
     * Make an HTTP request using Guzzle
     *
     * @param string $url
     * @param string $method
     * @param array $data
     * @param array $headers
     * @param int $timeout
     * @return array
     */
//    public static function requestApi(
//        string $url,
//        string $method = 'GET',
//        array $data = [],
//        array $headers = [],
//        int $timeout = 30
//    ): array {
//        $client = new Client([
//            'timeout' => $timeout,
//        ]);
//
//        $options = [
//            'headers' => $headers,
//        ];
//
//        $method = strtoupper($method);
//
//        // GET / DELETE → query params
//        if (in_array($method, ['GET', 'DELETE'])) {
//            $options['query'] = $data;
//        }
//
//        // POST / PUT / PATCH → body
//        if (in_array($method, ['POST', 'PUT', 'PATCH'])) {
//            $options['json'] = $data;
//        }
//
//        try {
//            $response = $client->request($method, $url, $options);
//
//            return [
//                'success' => true,
//                'status' => $response->getStatusCode(),
//                'data' => json_decode($response->getBody()->getContents(), true),
////                'headers' => $response->getHeaders(),
//            ];
//
//        } catch (RequestException $e) {
//
//            return [
//                'success' => false,
//                'status' => $e->hasResponse()
//                    ? $e->getResponse()->getStatusCode()
//                    : 500,
//                'message' => $e->getMessage(),
//                'error' => $e->hasResponse()
//                    ? json_decode($e->getResponse()->getBody()->getContents(), true)
//                    : null,
//            ];
//        }
//    }




}
