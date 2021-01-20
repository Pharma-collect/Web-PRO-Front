<?php

namespace App\Http\Controllers;

class PrescriptionController extends Controller
{
    public function index(){
        $pharmacy = unserialize(session("pharmacy"));
        $pharmacy_id = $pharmacy->id;

        $data['prescriptions'] = $this->getPrescriptionsByPharmacy($pharmacy_id);
        $data['clients'] = $this->getAllClients();

        return view('prescription/index', $data);
    }

    public function getPrescriptionsByPharmacy($id_pharmacy)
    {    
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST',  env('HOST_URL').env('GET_PRESCRIPTIONS_BY_PHARMACY') , [
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
}
