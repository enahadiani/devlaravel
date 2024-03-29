<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;

class TagihanController extends Controller
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
            $response = $client->request('GET',  config('api.url').'dev/tagihan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_tagihan' => $request->no_tagihan
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
            $response = $client->request('GET',  config('api.url').'dev/tagihan-detail',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_tagihan' => $request->no_tagihan
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
                $response = $client->request('POST',  config('api.url').'dev/tagihan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'nim' => $request->nim,
                        'tanggal' => $request->tanggal,
                        'keterangan' => $request->keterangan,
                        'periode' => $request->periode,
                        'kode_jenis' => $request->kode_jenis,
                        'nama_jenis' => $request->nama_jenis,
                        'nilai' => $request->nilai
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
                $response = $client->request('PUT',  config('api.url').'dev/tagihan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'no_tagihan' => $request->no_tagihan,
                        'nim' => $request->nim,
                        'tanggal' => $request->tanggal,
                        'keterangan' => $request->keterangan,
                        'periode' => $request->periode,
                        'kode_jenis' => $request->kode_jenis,
                        'jenis_tagihan' => $request->jenis_tagihan,
                        'nilai' => $request->nilai
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
                $response = $client->request('DELETE',  config('api.url').'dev/tagihan',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' =>[
                        'no_tagihan' => $request->no_tagihan
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

    public function getFilterTagihan(Request $request) {
        $client = new Client();

        $response = $client->request('GET',  config('api.url').'dev/filter-tagihan',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => [
                'no_tagihan' => $request->no_tagihan,
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

     public function getDataTagihan(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->request('GET',  config('api.url') . 'dev/lap-tagihan', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'no_tagihan' => $request->input('no_tagihan'),
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

    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        try{
            
            $image_path = $request->file('file')->getPathname();
            $image_mime = $request->file('file')->getmimeType();
            $image_org  = $request->file('file')->getClientOriginalName();
            $fields[0] = array(
                'name'     => 'file',
                'filename' => $image_org,
                'Mime-Type'=> $image_mime,
                'contents' => fopen($image_path, 'r' ),
            );
            $fields[1] = array(
                'name'     => 'nik_user',
                'contents' => Session::get('nikUser')
            );

            $fields[2] = array(
                'name'     => 'kode_tagihan',
                'contents' => $request->kode_tagihan
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url').'gl-trans/ju-excel',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                return response()->json(['data' => $data], 200);  
            }
            
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res;
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        } 
        
    }

}