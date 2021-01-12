<?php

namespace App\Http\Controllers;

class AuthenticationController extends Controller
{
    public function index(){
        return view('authentication/login');
    }

    public function login(){
        $username = request('username');
        $password = request('password');

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://88-122-235-110.traefik.me:61001/api/user_pro/loginPro', [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
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

            return redirect('/');
        } else {
            return redirect('/connexion');
        }
    }
}
