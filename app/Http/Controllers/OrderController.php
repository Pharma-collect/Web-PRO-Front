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

    public function getAllClients()
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET',  env('HOST_URL').config('ws.GET_ALL_CLIENTS') , [
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

        $response = $client->request('POST',  env('HOST_URL').config('ws.GET_ORDER_BY_ID') , [
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

        $response = $client->request('POST',  env('HOST_URL').config('ws.GET_USER_PRO_BY_PHARMACY') , [
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

        $response = $client->request('POST',  env('HOST_URL').config('ws.GET_CONTAINERS_BY_PHARMACY') , [
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

    public function getProductsByPharmacy($id_pharmacy)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').config('ws.GET_PRODUCTS_BY_PHARMACY') , [
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

    public function getPrescriptionById($id_prescription)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').config('ws.GET_PRESCRIPTION_BY_ID') , [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'prescription_id' => $id_prescription,
            ]
        ]);

        $resultResponse = json_decode($response->getBody()->getContents());

        if($resultResponse->success){
            return $resultResponse->result;
        } else {
            var_dump($resultResponse->error);
        }
    }

    public function updatePrescription($id_prescription, $id_preparator)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').config('ws.UPDATE_PRESCRIPTION_BY_ID') , [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'id_prescription' => $id_prescription,
                'id_preparator' => $id_preparator
            ]
        ]);

        $resultResponse = json_decode($response->getBody()->getContents());

        if($resultResponse->success){
            var_dump($resultResponse->result);
            return redirect('admin/order');
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
        $detail = $request->details;

        $response = $client->request('POST', env('HOST_URL').config('ws.UPDATE_ORDER_BY_ID'), [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'order_id' => $request->updated_order_id,
                'status' => $status, 
                'id_preparator' => $preparator, 
                'id_container' => $container, 
                'detail' => $detail
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

        $response = $client->request('POST', env('HOST_URL').config('ws.DELETE_ORDER_BY_ID'), [
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

    public function newOrderForm(Request $request)
    {
        $pharmacy = unserialize(session('pharmacy'));
        $pharmacy_id = $pharmacy->id;

        $data['products'] = $this->getProductsByPharmacy($pharmacy_id);
        $data['containers'] = $this->getContainersByPharmacy($pharmacy_id);
        $data['prescription'] = $request->prescription_id;

        return view('order/new_order_form', $data);
    }

    public function newOrder(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $pharmacy = unserialize(session('pharmacy'));

        $id_preparator = session('user_id');

        $id_container = $request->container;
        $id_prescription = $request->prescription_id;
        $prescription = $this->getPrescriptionById($id_prescription);
        $id_client = $prescription->id_client;

        $id_pharmacy = $pharmacy->id;
        $details = $request->details;


        $products = $request->input('products');
        $quantities = $request->input('quantity');
        $prices = $request->input('price');
        
        $total_price=0;
        foreach(array_combine($prices, $quantities) as $price => $qty){
            if(($qty)){
                $total_price=$total_price + ($price * $qty);
            }
        }

        $quantities = array_filter($quantities);
        $tab_products = array();
        foreach(array_combine($products, $quantities) as $product => $qty)
        {
            $array_tmp = array(
                'id_product' => $product,
                'quantity' => $qty
            );
            
            array_push($tab_products, $array_tmp);
        }

        $response = $client->request('POST', env('HOST_URL').config('ws.ADD_ORDER'), [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'status' => 'pending',
                'total_price' => $total_price,
                'id_client' => $id_client,
                'id_preparator' => $id_preparator,
                'id_container' => $id_container,
                'id_pharmacy' => $id_pharmacy,
                'products' => $tab_products,
                'detail' => $details,
                'id_prescription' => $id_prescription


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
