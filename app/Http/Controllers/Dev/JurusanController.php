<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class JurusanController extends Controller
{
    public function __contruct() {
        if(!Session::get('login')){
            return redirect('dev-auth/login');
        }
    }

    public function index(Request $request){
        try{
                
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dev/jurusan',[
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
            $response = $client->request('GET',  config('api.url').'dev/jurusan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_jur' => $request->kode_jur
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
                'kode_jur' => 'required',
                'nama' => 'required',
                'status' => 'required'
            ]);

            try {
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'dev/jurusan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_jur' => $request->kode_jur,
                        'nama' => $request->nama,
                        'status' => $request->status
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
                'kode_jur' => 'required',
                'nama' => 'required',
                'status' => 'required'
            ]);

            try {
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'dev/jurusan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_jur' => $request->kode_jur,
                        'nama' => $request->nama,
                        'status' => $request->status
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

    public function destroy(Request $request) {
            try{
                $client = new Client();
                $response = $client->request('DELETE',  config('api.url').'dev/jurusan',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' =>[
                        'kode_jur' => $request->kode_jur
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

}
