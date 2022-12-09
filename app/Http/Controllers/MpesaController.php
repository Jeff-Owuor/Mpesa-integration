<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MpesaController extends Controller
{
    //
    public function getAccessToken(){
          $curl = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
          curl_setopt_array(
            $curl,
            array(
                CURLOPT_HTTPHEADER => ['Content-Type:application/json; charset=utf8'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY').':'.env('MPESA_CONSUMER_SECRET'),
            )    
          );
          $response = json_decode(curl_exec($curl));
          curl_close($curl);
          return $response->access_token;
    }

    public function makeHttp($url,$body){
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => ['Content-Type:application/json; charset=utf8','Authorization:Bearer '.$this->getAccessToken()],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($body),
            )    
          );

    }

    public function registerUrls(){
        $body = array(
            'ShortCode' => env('MPESA_SHORT_CODE'),
            'ResponseType' => 'completed',
            'ConfirmationURL' => env('MPESA_TEST_URL').'/api/confirmation/msape',
            'ValidationURL' => env('MPESA_TEST_URL').'/api/validation/msape',
        );

        $response = $this->makeHttp('https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl',$body);

        return $response;
    }

}
