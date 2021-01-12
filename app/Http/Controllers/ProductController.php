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

        $response = $client->request('POST',  env('HOST_URL').env('GET_PRODUCTS_BY_PHARMACY') , [
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

    public function getProductById($id_product)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').env('GET_PRODUCT_BY_ID') , [
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

    public function updateForm($product_id)
    { 
        $result = $this->getProductById($product_id);
        return view('product/update_form')->with('product', $result);
    }

    public function updateProduct(Request $request, $product_id)
    {    
        $client = new \GuzzleHttp\Client();
        $name = $request->name;
        $price = $request->price;
        $qty = $request->quantity;
        $description = $request->description;
        $image_url = $request->image_url;

        $response = $client->request('POST', env('HOST_URL').env('UPDATE_PRODUCT_BY_ID'), [
            'verify' => false,
            'headers' => [
                'Host' => 'node',
            ],
            'form_params' => [
                'product_id' => $product_id,
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

    public function dropProduct($id_product)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', env('HOST_URL').env('DELETE_PRODUCT_BY_ID'), [
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
            return redirect('admin/product');
        } else {
            var_dump($resultResponse->error);
        }

    }
}
