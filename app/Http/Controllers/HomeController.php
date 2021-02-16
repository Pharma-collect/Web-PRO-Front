<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index(){
        $pharmacy = unserialize(session("pharmacy"));
        $data['order_status'] = $this->getOrderStatus($pharmacy->id);
        $data['prescription_status'] = $this->getPrescriptionStatus($pharmacy->id);
        $data['ca'] = $this->getCA($pharmacy->id);

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

    public function getPrescriptionsByPharmacy($id_pharmacy)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').config('ws.GET_PRESCRIPTIONS_BY_PHARMACY') , [
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

    public function getProductsByPharmacy($pharmacy_id)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').config('ws.GET_PRODUCTS_BY_PHARMACY') , [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'pharmacy_id' => $pharmacy_id,
            ]
        ]);

        $resultResponse = json_decode($response->getBody()->getContents());

        if($resultResponse->success){
            return $resultResponse->result;
        } else {
            var_dump($resultResponse->error);
        }

    }


    public function getOrderDetailsByOrder($id_order)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').config('ws.GET_ORDER_DETAILS_BY_ORDER') , [
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

    public function getCA($id_pharmacy){
        $orders = $this->getOrdersByPharmacy($id_pharmacy);
        $products = $this->getProductsByPharmacy($id_pharmacy);
        $test = 0;
        $ca = array_fill(0, 3, 0);
        foreach($orders as $order){
            if($order->status === 'finish'){
                $ca[0] += ($order->total_price);
                $details = $this->getOrderDetailsByOrder($order->id);
                foreach($details as $detail){
                    foreach($products as $product)
                    {
                        if($product->id === $detail->id_product){
                            if($product->prescription_only === 0)
                            {
                                $ca[1] += (($detail->quantity)*($product->price));
                            }
                            else
                            {
                                $ca[2] += (($detail->quantity)*($product->price));
                            }                            
                        }
                    }
                }
            }
        }
        return $ca;
    }

    public function getOrderStatus($id_pharmacy){
        $orders = $this->getOrdersByPharmacy($id_pharmacy);
        $order_status = array_fill(0, 4, 0);

        foreach($orders as $order){
            if($order->status === 'pending'){
                $order_status[0]+=1;
            }
            elseif($order->status === 'ready')
            {
                $order_status[1]+=1;
            }
            elseif($order->status === 'container'){
                $order_status[2]+=1;
            }
            elseif($order->status === 'finish'){
                $order_status[3] += 1;
            }
        }
        return $order_status;
    }

    public function getPrescriptionStatus($id_pharmacy){
        $prescriptions = $this->getPrescriptionsByPharmacy($id_pharmacy);
        $prescription_status = array_fill(0, 4, 0);

        foreach($prescriptions as $presc){
            if($presc->status === 'pending'){
                $prescription_status[0]+=1;
            }
        }
        return $prescription_status;
    }
}
