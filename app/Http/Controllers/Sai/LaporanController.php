<?php
    namespace App\Http\Controllers\Sai;

    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use GuzzleHttp\Client;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class LaporanController extends Controller {

        public $link = 'https://api.simkug.com/api/sai-report/';

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('tarbak/login')->with('alert','Session telah habis !');
            }
        }

        public function getDataTagihan(Request $request) {
           try{
                $client = new Client();
                $response = $client->request('GET', $this->link.'lap-tagihan',[
                    'headers' => [
                        'Authorization' => 'Bearer '.Session::get('token'),
                        'Accept'     => 'application/json',
                    ],
                    'query' => [
                        'kode_cust' => $request->kode_cust,
                        'no_bill' => $request->no_bill,
                        'no_kontrak' => $request->no_kontrak,
                    ]
                ]);

                if ($response->getStatusCode() == 200) { // 200 OK
                    $response_data = $response->getBody()->getContents();
                    
                    $res = json_decode($response_data,true);
                    $data = $res['data'];
                }

                if(isset($request->back)){
                    $res['back']=true;
                }
                
                return response()->json(['result' => $data, 'status'=>true, 'auth_status'=>1,'sumju'=>$request->sumju,'res'=>$res], 200); 
            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return response()->json(['message' => $res["message"], 'status'=>false, 'auth_status'=>2], 200);
            } 
        }
    }
?>