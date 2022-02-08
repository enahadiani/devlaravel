<?php
    namespace App\Http\Controllers\sekolah;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class FilterController extends Controller {

        public function __contruct() {
            if(!Session::get('login')){
            return redirect('dev-auth/login');
            }
        }

        public function getFilterPP(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'dev/tagihan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ]
            ]);

            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
            
                $data = json_decode($response_data,true);
            }
            return response()->json(['daftar' => $data['data'], 'status' => true], 200);
        }

    }
?>