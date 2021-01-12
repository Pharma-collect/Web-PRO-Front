<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function index(){
        $pharmacy = unserialize(session('pharmacy'));
        $pharmacy_id = $pharmacy->id;

        $result = $this->getOrderByPharmacy($pharmacy_id);
        return view('order/index')->with('orders', $result);
    }

    public function getOrderByPharmacy($id_pharmacy)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').env('GET_ORDER_BY_PHARMACY') , [
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

    public function updateOrderForm()
    { 
        $result = $this->getOrderById(request('update_order_id'));

        return view('order/update_order_form')->with('order', $result);
    }
/*
    public function updateOrder(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $status = $request->status;
        $price = $request->price;
        $qty = $request->quantity;
        $description = $request->description;
        $image_url = $request->image_url;

        $response = $client->request('POST', env('HOST_URL').env('UPDATE_ORDER_BY_ID'), [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'product_id' => $request->updated_product_id,
                'title' => $name, 
                'price' => $price, 
                'description' => $description, 
                'capacity' => $qty,
                'image_url' => $image_url,
            ]
        ]);

        $resultResponse = json_decode($response->getBody()->getContents());

        if($resultResponse->success){
            return redirect('admin/product');
        } else {
            var_dump($resultResponse->error);
        }

    }
*/
    public function newOrderForm()
    {
        return view('order/new_order_form');
    }

    public function newOrder(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $pharmacy = unserialize(session('pharmacy'));

        $detail = $request->detail;
        $id_client = $request->id_client;
        $id_pharmacy = $pharmacy->id;
        $total_price = $request->total_price;

        $response = $client->request('POST', env('HOST_URL').env('ADD_ORDER'), [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'detail' => $detail,
                'id_client' => $id_client,
                'id_pharmacy' => $id_pharmacy,
                'total_price' => $total_price,
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
