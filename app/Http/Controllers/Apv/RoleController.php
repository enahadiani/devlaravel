<?php

namespace App\Http\Controllers\Apv;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'http://api.simkug.com/api/apv/';

    public function __contruct(){
        if(!Session::get('login')){
            return redirect('saku/login')->with('alert','Session telah habis !');
        }
    }

    
    public function joinNum($num){
        // menggabungkan angka yang di-separate(10.000,75) menjadi 10000.00
        $num = str_replace(".", "", $num);
        $num = str_replace(",", ".", $num);
        return $num;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $client = new Client();
        $response = $client->request('GET', $this->link.'role',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"]["data"];
        }
        return response()->json(['daftar' => $data, 'status'=>true], 200); 
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
            'kode_role' => 'required',
            'nama' => 'required',
            'kode_pp' => 'required',
            'bawah' => 'required',
            'atas' => 'required',
            'modul' => 'required',
            'detail.*.kode_jab'=> 'required'
        ]);

        $detail = array();
        if(isset($request->kode_jab)){
            $kode_jab = $request->kode_jab;
            for($i=0;$i<count($kode_jab);$i++){
                $detail[] = array(
                    'kode_jab' => $kode_jab[$i]
                );
            }
        }


        $fields =
              array (
                'kode_role' => $request->kode_role,
                'nama' => $request->nama,
                'kode_pp' => $request->kode_pp,
                'bawah' => $this->joinNum($request->bawah),
                'atas' => $this->joinNum($request->atas),
                'modul' => $request->modul,
                'detail' => $detail
              );

        $client = new Client();
        $response = $client->request('POST', $this->link.'role',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Content-Type'     => 'application/json'
            ],
            'body' => json_encode($fields)
        ]);
        
        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            return response()->json(['data' => $data["success"]], 200);  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kode_role)
    {
        $client = new Client();
        $response = $client->request('GET', $this->link.'role/'.$kode_role,[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"];
        }
        return response()->json(['data' => $data], 200); 
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
    public function update(Request $request, $kode_role)
    {
        $this->validate($request, [
            'kode_role' => 'required',
            'nama' => 'required',
            'kode_pp' => 'required',
            'bawah' => 'required',
            'atas' => 'required',
            'modul' => 'required',
            'detail.*.kode_jab'=> 'required'
        ]);

        $detail = array();
        if(isset($request->kode_jab)){
            $kode_jab = $request->kode_jab;
            for($i=0;$i<count($kode_jab);$i++){
                $detail[] = array(
                    'kode_jab' => $kode_jab[$i]
                );
            }
        }


        $fields =
              array (
                'kode_role' => $request->kode_role,
                'nama' => $request->nama,
                'kode_pp' => $request->kode_pp,
                'bawah' => $this->joinNum($request->bawah),
                'atas' => $this->joinNum($request->atas),
                'modul' => $request->modul,
                'detail' => $detail
              );

        $client = new Client();
        $response = $client->request('PUT', $this->link.'role/'.$kode_role,[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Content-Type'     => 'application/json'
            ],
            'body' => json_encode($fields)
        ]);
        
        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            return response()->json(['data' => $data["success"]], 200);  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_role)
    {
        $client = new Client();
        $response = $client->request('DELETE', $this->link.'role/'.$kode_role,[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ]
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"];
        }
        return response()->json(['data' => $data], 200); 
    
    }
}