<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index(){
        $pharmacy = unserialize(session("pharmacy"));
        $orders = $this->getOrdersByPharmacy($pharmacy->id);
        $pending = 0;
        $ready=0;
        $container=0;
        $finish=0;
        foreach($orders as $order){
            if($order->status === 'pending'){
                $pending +=1;
            }
            elseif($order->status === 'ready')
            {
                $ready+=1;
            }
            elseif($order->status === 'container'){
                $container+=1;
            }
            elseif($order->status === 'finish'){
                $finish += 1;
            }
        }

        $data['pharmacy_name'] = $pharmacy->name;
        $data['pending'] = $pending;
        $data['ready'] = $ready;
        $data['container'] = $container;
        $data['finish'] = $finish;

        return view('home/index', $data);
    }

    public function getOrdersByPharmacy($id_pharmacy)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').config('ws.GET_ORDERS_BY_PHARMACY') , [
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
