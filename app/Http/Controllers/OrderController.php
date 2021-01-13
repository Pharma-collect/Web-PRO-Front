<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $pharmacy = unserialize(session('pharmacy'));
        $pharmacy_id = $pharmacy->id;


        $data['orders'] = $this->getOrdersByPharmacy($pharmacy_id);
        $data['preparators'] = $this->getUserProByPharmacy($pharmacy_id);
        $data['containers'] = $this->getContainersByPharmacy($pharmacy_id);
        $data['clients'] = $this->getAllClients();

        return view('order/index', $data);
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

    public function getAllClients()
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET',  env('HOST_URL').env('GET_ALL_CLIENTS') , [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
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

    public function getUserProByPharmacy($id_pharma)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').env('GET_USER_PRO_BY_PHARMACY') , [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'pharmacy_id' => $id_pharma,
            ]
        ]);

        $resultResponse = json_decode($response->getBody()->getContents());

        if($resultResponse->success){
            return $resultResponse->result;
        } else {
            var_dump($resultResponse->error);
        }

    }

    public function getContainersByPharmacy($id_pharma)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').env('GET_CONTAINERS_BY_PHARMACY') , [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'pharmacy_id' => $id_pharma,
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
        $pharmacy = unserialize(session('pharmacy'));
        $pharmacy_id = $pharmacy->id;
        $preparators = $this->getUserProByPharmacy($pharmacy_id);
        $containers = $this->getContainersByPharmacy($pharmacy_id);

        $data['order'] = $result;
        $data['preparators'] = $preparators; 
        $data['containers'] = $containers;

        return view('order/update_form', $data);
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
            return redirect('admin/order');
        } else {
            var_dump($resultResponse->error);
        }

    }

    public function dropOrder()
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', env('HOST_URL').env('DELETE_ORDER_BY_ID'), [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'order_id' => request('del_order_id'),
            ]
        ]);

        $resultResponse = json_decode($response->getBody()->getContents());

        if($resultResponse->success){
            return redirect('admin/order');
        } else {
            var_dump($resultResponse->error);
        }

    }
}
