<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    
    public function view()
    {
        return view('login');
    }
    
    public function login()
    {
        $username = request('username');
        $password = request('password');

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://88-122-235-110.traefik.me:61001/api/user_client/loginClient', [
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
            var_dump($resultResponse->result);
        } else {
            var_dump($resultResponse->error);
        }

    }
}
