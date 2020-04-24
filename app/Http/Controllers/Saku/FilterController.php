<?php

namespace App\Http\Controllers\Saku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $link = 'http://api.simkug.com/api/lapsaku/';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function lastOfMonth($year, $month) {
        return date("Y-m-d", strtotime('-1 second', strtotime('+1 month',strtotime($month . '/01/' . $year. ' 00:00:00'))));
    
    }

    function getGlFilterLokasi(Request $request){
        $client = new Client();
        $response = $client->request('GET', $this->link.'gl_filter_lokasi',[
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

    function getGlFilterPeriode(){
        $client = new Client();
        $response = $client->request('GET', $this->link.'gl_filter_periode',[
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
        $periode = Session::get('periode');
        if($periode != ""){
            $periode = $periode;
        }else{
            $periode = date('Ym');
        }
        $tahun = substr($periode,0,4);
        $bulan = substr($periode,5,2);
        if(strlen($bulan) == 1){
            $bulan = "0".$bulan;
        }else{
            $bulan = $bulan;
        }
        $tgl_awal = date($tahun.'-'.$bulan.'-01');
        $tgl_akhir = $this->lastOfMonth($tahun,$bulan);
        return response()->json(['daftar' => $data, 'status'=>true,'tgl_awal'=>$tgl_awal,'tgl_akhir'=>$tgl_akhir,'periode'=>$periode,'periodeAktif'=>Session::get('periode')], 200); 
        
    }

    function getGlFilterModul(Request $request){
        $client = new Client();

        if(isset($request->periode)){
            $periode = $request->periode;
        }else{
            $periode = "";
        }

        $query = [
            'periode' => $request->periode
        ];

        $response = $client->request('GET', $this->link.'gl_filter_modul',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query'=> $query
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"]["data"];
        }
        return response()->json(['daftar' => $data, 'status'=>true], 200); 
    }

    function getGlFilterBukti(Request $request){
        $client = new Client();

        if(isset($request->periode)){
            $periode = $request->periode;
        }else{
            $periode = "";
        }

        if(isset($request->modul)){
            $modul = $request->modul;
        }else{
            $modul = "";
        }

        $query = [
            'periode' => $periode,
            'modul' => $modul
        ];

        $response = $client->request('GET', $this->link.'gl_filter_bukti',[
            'headers' => [
                'Authorization' => 'Bearer '.Session::get('token'),
                'Accept'     => 'application/json',
            ],
            'query' => $query
        ]);

        if ($response->getStatusCode() == 200) { // 200 OK
            $response_data = $response->getBody()->getContents();
            
            $data = json_decode($response_data,true);
            $data = $data["success"]["data"];
        }
        return response()->json(['daftar' => $data, 'status'=>true], 200); 
    }

    function getGlFilterAkun(Request $request){
        $client = new Client();
        $response = $client->request('GET', $this->link.'gl_filter_akun',[
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

    function getGlFilterFs(Request $request){
        $client = new Client();
        $response = $client->request('GET', $this->link.'gl_filter_fs',[
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
}
