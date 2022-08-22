<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;


class UploadMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __contruct()
    {
        if (!Session::get('login')) {
            return redirect('dev-auth/login');
        }
    }

    public function reverseDate($ymd_or_dmy_date, $org_sep='-', $new_sep='-'){
        $arr = explode($org_sep, $ymd_or_dmy_date);
        return $arr[2].$new_sep.$arr[1].$new_sep.$arr[0];
    }

    public function index(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dev2/mahasiswa2',[
                'headers' => [
                    'Authorization' => 'Bearer'.Session::get('token'),
                    'Accept'        => 'application/json',
                ]
            ]);
          
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                $data = $data["data"];
                
            }
            return response()->json(
                ['daftar' => $data, 
                'status' => true],
                200
            );
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            return response()->json(['message' => $res['message'], 'status'=> false], 200 );
        }
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'deskripsi' => 'required|max:200'
        ]);

        try {
            $fields = [
                [
                    'name' => 'tanggal',
                    'contents' => $this->reverseDate($request->tanggal, '/', '-')
                ],
                [
                    'name' => 'deskripsi',
                    'contents' => $request->deskripsi
                ],
                [
                    'name' => 'no_tmp',
                    'contents' => Session::get('nikUser'),
                ]
            ];

            $client = new Client();
            $response = $client->request('POST', config('api.url').'dev2/mahasiswa-simpan', [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'        => 'application/json',
                ],
                'multipart' => $fields
            ]);

            if($response->getStatusCode() == 200){
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(["data" => $data], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $result['message'] = $res;
            $result['status'] = false;
            return response()->json(['data' => $result], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $client = new Client();
            $response = $client->request('DELETE', config('api.url').'dev2/mahasiswa2', [
                'headers' => [
                    'Authorization' => 'Bearer'.Session::get('token'),
                    'Accept'        => 'application/json',
                ],
                'query' => [
                    'nim' => $id
                ]
            ]);

            if($response->getStatusCode() == 200){
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['data' => $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        }
    }

    public function getDataTmp(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'dev2/mahasiswa-upload-tmp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'form_params' =>  $request->all()
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json($result, 200);
        } 
    }

    public function uploadExcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        try {

            $image_path = $request->file('file')->getPathname();
            $image_mime = $request->file('file')->getmimeType();
            $image_org  = $request->file('file')->getClientOriginalName();
            $fields[0] = array(
                'name'     => 'file',
                'filename' => $image_org,
                'Mime-Type' => $image_mime,
                'contents' => fopen($image_path, 'r'),
            );
            $fields[1] = array(
                'name'     => 'nik_user',
                'contents' => Session::get('nikUser')
            );

            $client = new Client();
            $response = $client->request('POST',  config('api.url') . 'dev2/import-mahasiswa2', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'multipart' => $fields
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data, true);
                return response()->json(['data' => $data], 200);
            }
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(), true);
            $result['message'] = $res;
            $result['status'] = false;
            return response()->json(["data" => $result], 200);
        }
    }

    public function exportExcel($id)
    {
        try {

            $client = new Client();
            $response = $client->request('DELETE', config('api.url').'dev2/mahasiswa2', [
                'headers' => [
                    'Authorization' => 'Bearer'.Session::get('token'),
                    'Accept'        => 'application/json',
                ],
                'query' => [
                    'nim' => $id
                ]
            ]);

            if($response->getStatusCode() == 200){
                $response_data = $response->getBody()->getContents();

                $data = json_decode($response_data,true);
                $data = $data;
            }
            return response()->json(['data' => $data], 200);
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json(["data" => $result], 200);
        }
    }

    public function doValidate(Request $request){
        try{

            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dev2/mahasiswa-upload-validate',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query'=>$request->all()
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 
        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            return response()->json(['message' => $res,'data' =>[], 'status'=>false], 200);
        } 
    }

    public function clearTmp(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'dev2/mahasiswa-upload-clear-temp',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' =>  $request->all()
            ]);
    
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
            }
            return response()->json($data, 200); 

        } catch (BadResponseException $ex) {
            $response = $ex->getResponse();
            $res = json_decode($response->getBody(),true);
            $result['message'] = $res["message"];
            $result['status']=false;
            return response()->json($result, 200);
        } 
    }





}
