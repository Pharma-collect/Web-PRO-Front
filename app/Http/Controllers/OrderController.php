<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

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

    public function getOrderById($id_order)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').env('GET_ORDER_BY_ID') , [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'order_id' => $id_order,
            ]
        ]);

        $resultResponse = json_decode($response->getBody()->getContents());

        if($resultResponse->success){
            return $resultResponse->result;
        } else {
            var_dump($resultResponse->error);
        }

    }

    public function updateForm()
    { 
        $result = $this->getOrderById(request('update_order_id'));

        return view('order/update_form')->with('order', $result);
    }

    public function updateOrder(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $status = $request->status;
        $preparator = $request->preparator;
        $container = $request->container;

        $response = $client->request('POST', env('HOST_URL').env('UPDATE_ORDER_BY_ID'), [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'order_id' => $request->updated_order_id,
                'status' => $status, 
                'id_preparator' => $preparator, 
                'id_container' => $container, 
                
            ]
        ]);



        $resultResponse = json_decode($response->getBody()->getContents());

        if($resultResponse->success){
            var_dump($resultResponse->result);
            //return redirect('admin/order');
        } else {
            var_dump($resultResponse->error);
        }

    }
}
