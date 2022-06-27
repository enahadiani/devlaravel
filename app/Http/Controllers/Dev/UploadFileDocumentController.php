<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;


class UploadFileDocumentController extends Controller
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

    public function convertDate($date, $from = '/', $to = '-') {
        $explode = explode($from, $date);
        return "$explode[2]"."$to"."$explode[1]"."$to"."$explode[0]";
    }


    public function index(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dev2/mahasiswa3',[
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
        // return $request;
        $this->validate($request, [
            // 'nik' => 'required',
            'nim' => 'required|array',
            'nama' => 'required|array',
            'jenis_kelamin' => 'required|array',
            'kode_jur' => 'required|array',
            // 'file_dok' => 'required'
        ]);

        try {
            $fields = [
                [
                    "name" => "kode_lokasi",
                    "contents" => $request->input('kode_lokasi')
                ]
            ];

            $array_file = array();
            $array_nomor = array();
            $array_nim = array();
            $array_nama = array();
            $array_jenis_kelamin = array();
            $array_kode_jur = array();

            if(isset($request->nomor) && count($request->input('nomor')) > 0) {
                for($i=0; $i<count($request->input('nomor')); $i++) {
                    if($request->nim[$i] !== '' && $request->nim[$i] !== null){                        
                        if(isset($request->file('file_dok')[$i])){
                            $image_path = $request->file('file_dok')[$i]->getPathname();
                            $image_mime = $request->file('file_dok')[$i]->getmimeType();
                            $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                            $file_field= 
                                    array(
                                    'name'     => 'file_dok['.$i.']',
                                    'filename' => $image_org,
                                    'Mime-Type'=> $image_mime,
                                    'contents' => fopen($image_path, 'r' ),
                                )
                            ; 
                        } else {
                            $file_field= 
                                array(
                                'name'     => 'file_dok['.$i.']',
                                'contents' => '',
                            );
                        }
                        $data_nomor = array(
                            "name" => "nomor[]",
                            "contents" => $request->nomor[$i]
                        );
                        $data_nim = array(
                            "name" => "nim[]",
                            "contents" => $request->nim[$i]
                        );
                        $data_nama = array(
                            "name" => "nama[]",
                            "contents" => $request->nama[$i]
                        );
                        $data_jenis_kelamin = array(
                            "name" => "jenis_kelamin[]",
                            "contents" => $request->    jenis_kelamin[$i]
                        );
                        $data_kode_jur = array(
                            "name" => "kode_jur[]",
                            "contents" => $request->kode_jur[$i]
                        );
                        
                        
                        array_push($array_file, $file_field);
                        array_push($array_nomor, $data_nomor);
                        array_push($array_nim, $data_nim);
                        array_push($array_nama, $data_nama);
                        array_push($array_jenis_kelamin, $data_jenis_kelamin);
                        array_push($array_kode_jur, $data_kode_jur);
                        // print_r($data_nim);
                        // print_r($array_nim);
                    }
                }

                $fields = array_merge(
                    $fields,
                    $array_file,
                    $array_nomor,
                    $array_nim,
                    $array_nama,
                    $array_jenis_kelamin,
                    $array_kode_jur
                );
            }

            // if($request->hasFile('file_dok')) {
            //     $j=0;
            //     foreach($request->file_dok as $file){
            //         $image_path = $file->getPathname();
            //         $image_mime = $file->getmimeType();
            //         $image_org  = $file->getClientOriginalName();
            //         $file_field = array(
            //                 array(
            //                 'name'     => 'file_dok['.$j.']',
            //                 'filename' => $image_org,
            //                 'Mime-Type'=> $image_mime,
            //                 'contents' => fopen($image_path, 'r' ),
            //             )
            //         ); 
            //         $fields = array_merge($fields, $file_field);
            //         // print_r($file_field);
            //         // print_r($fields);
            //         $j++;
            //     }

            // }
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'dev2/file-doc-mahasiswa',[
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
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('GET',  config('api.url').'dev2/mahasiswa3-detail',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ], 
                'query' => [
                    'nim' => $request->query('kode')
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
    public function update(Request $request)
    {
        // return $request;
        $this->validate($request, [
            // 'nik' => 'required',
            'nim' => 'required|array',
            'nama' => 'required|array',
            'jenis_kelamin' => 'required|array',
            'kode_jur' => 'required|array',
            // 'file_dok' => 'required'
        ]);

        try {
            $fields = [
                [
                    "name" => "kode_lokasi",
                    "contents" => $request->input('kode_lokasi')
                ],
                [
                    "name" => "id",
                    "contents" => $request->input('id')
                ]

            ];
            
            $array_file = array();
            $array_nomor = array();
            $array_nim = array();
            $array_nama = array();
            $array_jenis_kelamin = array();
            $array_kode_jur = array();

            if(isset($request->nomor) && count($request->input('nomor')) > 0) {
                for($i=0; $i<count($request->input('nomor')); $i++) {
                    if(isset($request->file('file_dok')[$i])){
                        $image_path = $request->file('file_dok')[$i]->getPathname();
                        $image_mime = $request->file('file_dok')[$i]->getmimeType();
                        $image_org  = $request->file('file_dok')[$i]->getClientOriginalName();
                        $file_field= 
                                array(
                                'name'     => 'file_dok['.$i.']',
                                'filename' => $image_org,
                                'Mime-Type'=> $image_mime,
                                'contents' => fopen($image_path, 'r' ),
                            )
                        ; 
                    } else {
                        $file_field= 
                            array(
                            'name'     => 'file_dok['.$i.']',
                            'contents' => '',
                        );
                    }
                    $data_nomor = array(
                        "name" => "nomor[]",
                        "contents" => $request->nomor[$i]
                    );
                    $data_nim = array(
                        "name" => "nim[]",
                        "contents" => $request->nim[$i]
                    );
                    $data_nama = array(
                        "name" => "nama[]",
                        "contents" => $request->nama[$i]
                    );
                    $data_jenis_kelamin = array(
                        "name" => "jenis_kelamin[]",
                        "contents" => $request->    jenis_kelamin[$i]
                    );
                    $data_kode_jur = array(
                        "name" => "kode_jur[]",
                        "contents" => $request->kode_jur[$i]
                    );
                    array_push($array_file, $file_field);
                    array_push($array_nomor, $data_nomor);
                    array_push($array_nim, $data_nim);
                    array_push($array_nama, $data_nama);
                    array_push($array_jenis_kelamin, $data_jenis_kelamin);
                    array_push($array_kode_jur, $data_kode_jur);
                }

                $fields = array_merge(
                    $fields,
                    $array_file,
                    $array_nomor,
                    $array_nim,
                    $array_nama,
                    $array_jenis_kelamin,
                    $array_kode_jur
                );
            }

            // if($request->hasFile('file_dok')) {
            //     $j=0;
            //     foreach($request->file_dok as $file){
            //         $image_path = $file->getPathname();
            //         $image_mime = $file->getmimeType();
            //         $image_org  = $file->getClientOriginalName();
            //         $file_field = array(
            //                 array(
            //                 'name'     => 'file_dok['.$j.']',
            //                 'filename' => $image_org,
            //                 'Mime-Type'=> $image_mime,
            //                 'contents' => fopen($image_path, 'r' ),
            //             )
            //         ); 
            //         $fields = array_merge($fields, $file_field);
            //         // print_r($file_field);
            //         // print_r($fields);
            //         $j++;
            //     }
            // }
            $client = new Client();
            $response = $client->request('POST',  config('api.url').'dev2/file-doc-mahasiswa-update',[
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
            $data['message'] = $res;
            $data['status'] = false;
            return response()->json(['data' => $data], 500);
        }
    }


    public function destroy(Request $request)
    {
        try{
            $client = new Client();
            $response = $client->request('DELETE',  config('api.url').'dev2/file-doc-mahasiswa',
            [
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'nim' => $request->input('kode')
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