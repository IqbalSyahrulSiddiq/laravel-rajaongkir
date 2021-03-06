<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

class RajaongkirController extends Controller
{
    public function listProvinsi()
    {
        $apiKey = env('RAJA_ONGKIR_API_KEY');
        $baseUrl = env('RAJA_ONGKIR_BASE_URL');
        $request = Http::get($baseUrl.'/province?key='.$apiKey);
        $response = $request->getBody();
        $listProvinsi =  json_decode($response);
        $dataProvinsi = $listProvinsi->rajaongkir->results;
      
        /* return response()->json([
            'data' => $listProvinsi,
            'message' => 'Sukses'
        ]);  */

        return view('home',compact('dataProvinsi'));
    }

    public function listKokab(Request $request)
    {
        $apiKey = env('RAJA_ONGKIR_API_KEY');
        $baseUrl = env('RAJA_ONGKIR_BASE_URL');
        $request = Http::get($baseUrl.'/city?key='.$apiKey.'&province='.$request->provAsal);
        $response = $request->getBody();
        $listKokab =  json_decode($response);
        $dataKokab = $listKokab->rajaongkir->results;
        
        //dd($dataKokab);
        return response()->json($dataKokab);
    }

    public function listKokabTujuan(Request $request)
    {
        $apiKey = env('RAJA_ONGKIR_API_KEY');
        $baseUrl = env('RAJA_ONGKIR_BASE_URL');
        $request = Http::get($baseUrl.'/city?key='.$apiKey.'&province='.$request->provTujuan);
        $response = $request->getBody();
        $listKokab =  json_decode($response);
        $dataKokab = $listKokab->rajaongkir->results;
        
        //dd($dataKokab);
        return response()->json($dataKokab);
    }

    public function kalkulasiOngkir(Request $request)
    {
        $apiKey = env('RAJA_ONGKIR_API_KEY');
        $baseUrl = env('RAJA_ONGKIR_BASE_URL');
        $request = Http::post($baseUrl.'/cost',[
            'key' => $apiKey,
            'origin' => $request->kokabAsal,
            'destination' => $request->kokabTujuan,
            'courier' => $request->kurir,
            'weight' => $request->berat_gram
        ]);

        return $request;

    }
}
