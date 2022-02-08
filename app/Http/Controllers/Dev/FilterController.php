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

        public function getFilterNIM(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'dev/siswa',[
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

        public function getFilterJurusan(Request $request) {
            $client = new Client();

            $response = $client->request('GET',  config('api.url').'dev/jurusan',[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                ],
                'query' => [
                    'kode_jur' => $request->kode_jur,
                    'nama' => $request->nama,
                    'flag_aktif' => $request->flag_aktif,
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