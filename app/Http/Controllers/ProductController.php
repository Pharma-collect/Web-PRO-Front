<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $result = $this->getProductsByPharmacy(1);
        return view('product/index')->with('products', $result);
    }

    public function getProductsByPharmacy($id_pharmacy)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://88-122-235-110.traefik.me:61001/api/product/getProductsByPharmacy', [
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

    public function dropProduct($id_product)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://88-122-235-110.traefik.me:61001/api/product/deleteProductById', [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'product_id' => $id_product,
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
