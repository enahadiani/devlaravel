<?php

    namespace App\Http\Controllers\Sekolah;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class JenisPenilaianController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
                return redirect('sekolah-auth/login')->with('alert','Session telah habis !');
            }
        }

        public function index(Request $request)
        {
            try{
                // if(isset($request->kode_pp) && $request->kode_pp != ""){
                    $kode_pp = $request->kode_pp;
                // }else{
                //     $kode_pp = Session::get('kodePP');
                // }
                $client = new Client();
                $response = $client->request('GET',  config('api.url').'sekolah/jenis-nilai-all',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_pp' => $kode_pp,
                        'kode_jenis' => $request->kode_jenis,
                        'flag_aktif' => $request->flag_aktif
                    ]
                ]);
    
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                
                    $data = json_decode($response_data,true);
                    $data = $data["success"]["data"];
                }
                return response()->json(['daftar' => $data, 'status' => true], 200);
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false], 200);
            }
        }

        public function show(Request $request)
        {
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'sekolah/jenis-nilai',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_pp' => $request->kode_pp,
                    'kode_jenis' => $request->kode_jenis
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
                $data = $data["success"];
            }
            return response()->json(['data' => $data], 200);
        }

        public function store(Request $request) {

            $this->validate($request, [
                'kode_jenis' => 'required',
                'nama' => 'required',
                'kode_pp' => 'required',
                'flag_aktif' => 'required',
            ]);

            try {
                $client = new Client();
                $response = $client->request('POST',  config('api.url').'sekolah/jenis-nilai',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_jenis' => $request->kode_jenis,
                        'nama' => $request->nama,
                        'flag_aktif' => $request->flag_aktif,
                        'kode_pp' => $request->kode_pp,
                    ]
                ]);
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"]], 200);  
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
                'kode_jenis' => 'required',
                'nama' => 'required',
                'kode_pp' => 'required',
                'flag_aktif' => 'required',
            ]);

            try {
                $client = new Client();
                $response = $client->request('PUT',  config('api.url').'sekolah/jenis-nilai',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'form_params' => [
                        'kode_jenis' => $request->kode_jenis,
                        'nama' => $request->nama,
                        'flag_aktif' => $request->flag_aktif,
                        'kode_pp' => $request->kode_pp,
                    ]
                ]);
                // var_dump('Sukses');
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    return response()->json(['data' => $data["success"]], 200);  
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
                $response = $client->request('DELETE',  config('api.url').'sekolah/jenis-nilai',
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' =>[
                        'kode_pp' => $request->kode_pp,
                        'kode_jenis' => $request->kode_jenis
                    ]
                ]);
        
                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $data = json_decode($response_data,true);
                    $data = $data["success"];
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

?>