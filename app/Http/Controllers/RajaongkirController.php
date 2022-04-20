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

        dd($listProvinsi);
        /* //dd($listProvinsi);

        return response()->json([
            'data' => $listProvinsi,
            'message' => 'Sukses'
        ]); */

        return view('home',compact('listProvinsi'));
    }
}
