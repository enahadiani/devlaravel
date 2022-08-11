<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;


class DashboardController extends Controller
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

    public function getDataJurusan(Request $request){
        try {
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dash/data-jurusan',[
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

    public function getistSiswa($id){
        try {
            $client = new Client();
            $response = $client->request('GET', config('api.url').'dash/list-siswa/',[
                'headers' => [
                    'Authorization' => 'Bearer'.Session::get('token'),
                    'Accept'        => 'application/json',
                ],
                'query' => [
                    'kode_jur' => $id
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






}
