<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class BayarController extends Controller
{
    public function __contruct() {
        if(!Session::get('login')){
            return redirect('dev-auth/login');
        }
    }

    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    public function index(Request $request){
        try{
                
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dev/bayar',[
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
            $response = $client->request('GET',  config('api.url').'dev/bayar-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bayar' => $request->no_bayar
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['data' => $data], 200);

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res["message"], 'status'=>false], 200);
        }
    }

    public function store(Request $request) {

            $this->validate($request, [
                'nim' => 'required',
                'keterangan' => 'required',
                'periode' => 'required'
            ]);

            try {
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'dev/bayar',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'nim' => $request->nim,
                        'tanggal' => $request->tanggal,
                        'keterangan' => $request->keterangan,
                        'periode' => $request->periode,
                        'no_tagihan' => $request->no_tagihan,
                        'nama_jenis' => $request->ket_tagihan,
                        'nilai' => $request->nilai_t,
                        'nilai' => $request->nilai_b
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
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function update(Request $request) {

            $this->validate($request, [
                'nim' => 'required',
                'keterangan' => 'required',
                'periode' => 'required'
            ]);

            try {
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'dev/bayar',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'no_bayar' => $request->no_bayar,
                        'nim' => $request->nim,
                        'tanggal' => $request->tanggal,
                        'keterangan' => $request->keterangan,
                        'periode' => $request->periode,
                        'no_tagihan' => $request->no_tagihan,
                        'nama_jenis' => $request->ket_tagihan,
                        'nilai' => $request->nilai_t,
                        'nilai' => $request->nilai_b
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
                $data['message'] = $res;
                $data['status'] = false;
                return response()->json(['data' => $data], 500);
            }
    }

    public function destroy(Request $request) {
            try{
                $client = new Client();
                $response = $client->request('DELETE',  config('api.url').'dev/bayar',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' =>[
                        'no_bayar' => $request->no_bayar
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

    public function getFilterBayar(Request $request) {
        $client = new Client();

        $response = $client->request('GET',  config('api.url').'dev/filter-bayar',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'no_bayar' => $request->no_bayar,
                'keterangan' => $request->keterangan,
                'flag_aktif' => $request->flag_aktif,
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
        
            $data = json_decode($response_data,true);
        }
        return response()->json(['daftar' => $data['data'], 'status' => true], 200);
    }

    public function getDataBayar(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'dev/lap-bayar', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_bayar' => $request->input('no_bayar'),
                    'tanggal' => $request->input('tanggal'),
                    'nim' => $request->input('nim'),
                    'keterangan' => $request->input('keterangan'),
                    'nama' => $request->input('nama'),
                    'periode' => $request->input('periode'),
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $res = json_decode($response_data, true);
                $data = $res['data'];
            }

            if (isset($request->back)) {
                $back = true;
            } else {
                $back = false;
            }

            return response()->json(['result' => $data, 'status' => true, 'auth_status' => 1, 'periode' => 0, 'res' => $res, 'back' => $back], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res["message"], 'status' => false, 'auth_status' => 2], 200);
        }
    }
}