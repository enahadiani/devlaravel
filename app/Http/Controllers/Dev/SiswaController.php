<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class SiswaController extends Controller
{
    public function __contruct() {

        if(!Session::get('login')){
            return redirect('dev-auth/login');
        }
        
    }

    public function index(Request $request){
        try{
                
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dev/siswa',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
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

    public function show(Request $request){
        try{
                
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dev/siswa',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nim' => $request->nim
                ]
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

    public function store(Request $request) {

            $this->validate($request, [
                'nim' => 'required',
                'nama' => 'required',
                'kode_jur' => 'required'
            ]);

            try {
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'dev/siswa',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'nim' => $request->nim,
                        'nama' => $request->nama,
                        'kode_jur' => $request->kode_jur
                    ]
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data], 200);  
                }

            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function update(Request $request) {

            $this->validate($request, [
                'nim' => 'required',
                'nama' => 'required',
                'kode_jur' => 'required'
            ]);

            try {
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'dev/siswa',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => $request->all()
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data], 200);  
                }

            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function destroy(Request $request) {
            try{
                $client = new Client();
                $response = $client->request('DELETE',  config('api.url').'dev/siswa',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' =>[
                        'nim' => $request->nim
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                }
                return response()->json(['data' => $data], 200); 
            
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                $data['message'] = $res['message'];
                $data['status'] = false;
                return response()->json(['data' => $data], 200);
            }
    }
    
    public function getFilterNIM(Request $request) {
        $client = new Client();

        $response = $client->request('GET',  config('api.url').'dev/filter-nim',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'nim' => $request->nim,
                'nama' => $request->nama,
                'flag_aktif' => $request->flag_aktif
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
        
            $data = json_decode($response_data,true);
        }
        return response()->json(['daftar' => $data['data'], 'status' => true], 200);
    }

    function getDataSiswa(Request $request){
        try{
    
            $client = new Client();
    
            $response = $client->request('GET',  config('api.url').'dev/lap-siswa',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'kode_jur' => $request->kode_jur,
                    'nama_jur' => $request->nama_jur,
                    'flag_aktif' => $request->flag_aktif,
                    
                ]
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $res = json_decode($response_data,true);
                $data = $res['data'];
            }
            if(isset($request->back)){
                $back = true;
            }else{
                $back = false;
            }
            
            return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1, 'res'=>$res,'lokasi'=>Session::get('namaLokasi'),'back'=>$back], 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
        } 
   
}
}