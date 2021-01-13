<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function index(){
        $pharmacy = unserialize(session('pharmacy'));
        $pharmacy_id = $pharmacy->id;
        $result = $this->getOrdersByPharmacy($pharmacy_id);
        return view('order/index')->with('orders', $result);
    }

    public function getOrdersByPharmacy($id_pharmacy)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').env('GET_ORDERS_BY_PHARMACY') , [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'pharmacy_id' => $id_pharmacy,
            ]
        ]);

        $resultResponse = json_decode($response->getBody()->getContents());

        if($resultResponse->success){
            return $resultResponse->result;
        } else {
            var_dump($resultResponse->error);
        }

    }
}
