<?php

namespace App\Http\Controllers;

use App\Models\Mpesa;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PricingController
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('codehacks.pricing');
    }

    //pricing.plans
    public function gold(): RedirectResponse
    {

        $user = Auth::user();
        $amount = ENV('GOLD_PRICE');
        $phone = $user->phone_number;

        //replace 0 at the beginning with 254
        if (substr($phone, 0, 1) == "0") {
            $phone = preg_replace('/^0/', '254', $phone);
        }

        //remove + at the beginning
        if (substr($phone, 0, 1) == "+") {
            $phone = preg_replace('/^+/', '', $phone);
        }

        $businessShortCode = 6437090;
        $passKey = ENV('LIVE_MPESA_PASSKEY');
        $timestamp = Carbon::rawParse('now')->format('YmdHms');

        $password = base64_encode($businessShortCode.$passKey.$timestamp);

        $url = ENV('LIVE_MPESA_URL');
        $curl_post_data = [
            'BusinessShortCode'=> ENV('LIVE_SHORT_CODE'),
            'Password'=> $password,
            'Timestamp'=> Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType'=> 'CustomerBuyGoodsOnline',
            'Amount' => $amount,
            'PartyA' => $phone,
            'PartyB' => ENV('TILL_NUMBER'),
            'PhoneNumber' => $phone,
            'CallBackURL' => ENV('CALLBACK_URL'),
            'AccountReference' => 'CodeHacks',
            'TransactionDesc' => "Deposit of KSh. {$amount}"
        ];

        $access_token = $this->generateAccessToken();
        //if the access token is null or empty
        if (!$access_token) {
            // Redirect to route 'response' with an error message
            return redirect()->route('response')->with('error', 'There was a server error. Please contact our Customer Care.');
        }

        $data_string = json_encode($curl_post_data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type:application/json',
            'Authorization:Bearer ' . $access_token,
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        // Handle the response from M-Pesa here

        // Decode the response from JSON to PHP array
        $response_data = json_decode($response, true);
        //dd($response_data);

        //check the if the response code exists in the response data
        if(!array_key_exists('ResponseCode', $response_data)) {
            return redirect()->route('response')->with('error', 'There was a server Error. Please Contacts Our Customer Care.');
        }

        // Check if the response is successful
        if($response_data['ResponseCode'] == "0") {

            //record the transaction
            Mpesa::create([
                'merchant_request_id' => $response_data['MerchantRequestID'],
                'checkout_request_id' => $response_data['CheckoutRequestID'],
                'response_code' => $response_data['ResponseCode'],
                'response_description' => $response_data['ResponseDescription'],
                'customer_message' => $response_data['CustomerMessage'],
                'status' => 'pending',
            ]);

            //return back with success message
            return redirect()->route('response')->with('success', 'Deposit initiated. Please enter your M-pesa pin to complete the transaction.');
        } else {
            // If not successful, return an error message
            return redirect()->route('response')->with('error', 'There was an error with your request. Please try again.');
        }
    }


    public function generateAccessToken()
    {
        $consumer_key = ENV('LIVE_MPESA_CONSUMER_KEY');
        $consumer_secret = ENV('LIVE_MPESA_CONSUMER_SECRET');
        $credentials = base64_encode($consumer_key . ':' . $consumer_secret);

        $url = ENV('LIVE_TOKEN_URL');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Basic ' . $credentials]);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $result = json_decode($result);
        $access_token = $result->access_token;

        curl_close($curl);

        return $access_token;
    }

}
