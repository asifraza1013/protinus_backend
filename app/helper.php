<?php

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Support\Facades\Session;

if (!function_exists('sendRequest')) {
	function sendRequest($method, $url, $data = [], $urlencoded = false, $code = null){

        // Guzzle Http payload
        $requestArray = [
            'method' => $method,
            'params' => [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ],

                'json' => $data
            ],
            'urlencoded' => $urlencoded,
        ];
        try {
            $client = new Client();
            $response = $client->request($requestArray['method'], env('BASE_URL').$url, $requestArray['params']);
            $responseBody = json_decode((string) $response->getBody(), false);
            return $responseBody;
        }
        catch (ConnectException $e) {
            $message = $e->getMessage();
            $message = (object)['message' => $message];
        }
        catch (RequestException $e) {
            return ['status' => false, 'data' => $e ? json_decode($e->getResponse()->getBody()->getContents(), true) : 'RequestException'];
        }
        catch (ClientException $e) {
            $message = json_decode($e->getResponse()->getBody()->getContents());
        }
        catch (BadResponseException $e) {
            $message = json_decode($e->getResponse()->getBody()->getContents());
        }
        catch (\Exception $e) {
            $message = (object) ['message' => $e->getMessage()];
        }
        Log::info('Helper exception --- '.$e);
        $data = (object) [
            'status' => false,
            'message' =>($message->message != "" || $message->message != null)?  $message->message : 'Server Error.',
            'data' => (object) [
                'message' =>($message->message != "" || $message->message != null)?  $message->message : 'Server Error.',
                'extra_message' =>(isset($message->extra_message))? $message->extra_message : 'Server Error.',
                'code' =>(isset($message->code))? $message->code : '500',
            ],
        ];
        return $data;
	}
}

/**
 * baseulr
 */
if (!function_exists('baseurl')) {
	function baseurl($url){
        $baseurl = 'http://127.0.0.1:8300/';
        return $baseurl.$url;
    }
}


/**
 * currency
 */
if (!function_exists('currency')) {
	function currency($amount = null){
        if($amount){
            return '$'.$amount;
        }else{
            return '$';
        }
    }
}
?>
