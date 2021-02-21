<?php

namespace App\Http\Controllers;

class AuthenticationController extends Controller
{
    public function index(){
        $data['success_connect'] = true;

        return view('authentication/login', $data);
    }

    public function login(){
        $username = request('username');
        $password = request('password');

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', env('HOST_URL').config('ws.LOGIN'), [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'http_errors' => false,
            'form_params' => [
                'username' => $username,
                'password' => $password,
            ]
        ]);

        $resultResponse = json_decode($response->getBody()->getContents());

        if($resultResponse->success){

            session(['username' => $resultResponse->result->username]);
            session(['user_id' => $resultResponse->result->id]);
            session(['isAdmin' => $resultResponse->result->is_admin]);
            session(['token' => $resultResponse->result->token]);
            session(['pharmacy' => serialize($resultResponse->result->pharmacy)]);
            session(['pharmacy_name' => $resultResponse->result->pharmacy->name]);

            return redirect('/admin');
        } else {
            $data['success_connect'] = false;

            return view('authentication/login', $data);
        }
    }
}
