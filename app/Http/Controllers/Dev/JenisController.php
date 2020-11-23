<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class JenisController extends Controller
{
    public function __contruct() {
        if(!Session::get('login')){
            return redirect('dev-auth/login');
        }
    }

    public function index(Request $request){
        try{
                
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'dev/jenis',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ]
                    // 'query' => [
                    //     'kode_pp' => $request->kode_pp
                    // ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data["data"];
                }
                return response()->json(['daftar' => $data, 'status' => true], 200);

            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

}
