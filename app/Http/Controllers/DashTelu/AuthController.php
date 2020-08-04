<?php
    namespace App\Http\Controllers\DashTelu;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use Illuminate\Support\Facades\Session;
    use GuzzleHttp\Exception\BadResponseException;

    class AuthController extends Controller 
    {
        public $link = 'https://api.simkug.com/api/ypt';

        public function index()
        {
            if(!Session::get('login')){
                return redirect('dash-telu/login')->with('alert','Kamu harus login dulu');
            }
            else{
                return view('dash-telu.main');
            }            
        }         

        function buildMenu($menu_array, $is_sub=FALSE) {

            $attr = (!$is_sub) ? ' data-link="menu" class="list-unstyled " ' : ' class="list-unstyled submenu inner-level-menu"';
            $menu = "<ul".$attr.">";
        
            foreach($menu_array as $id => $properties) {
            foreach($properties as $key => $val) {
                if(is_array($val)) {
                    if(count($val) > 0){
                        $sub = $this->buildMenu($val, TRUE);
                    }
                }
                else {
                    $sub = NULL;
                    $$key = $val;
                }
            }
            if(!isset($url)) {
                $url = $id;
            }
            if($sub != NULL){

                $menu .= "<li><a href='#' data-href='".$kode_form."' data-toggle='collapse' data-target='#collapse".$kode_menu."' aria-expanded='true'
                aria-controls='collapse".$kode_menu."' class='rotate-arrow-icon'><i class='".$icon."'></i> <span class='d-inline-block'>".$nama."</span></a>
                <div id='collapse".$kode_menu."' class='collapse show' data-parent='#".$kode_menu."'>".$sub."</div></li>";
            }else{
                $menu .= "<li><a href='#' data-href='".$kode_form."' class='a_link'><i class='".$icon."'></i> <span class='d-inline-block'>".$nama."</span></a>".$sub."</li>";
            }
            unset($url, $nama, $sub);
            }
        
            return $menu . "</ul>";
        }

        public function cek_session()
        {
            if(!Session::get('login')){
                return response()->json(['status'=>false], 200);
            }
            else{
                return response()->json(['status'=>true], 200);
            }
            
        }

        public function login()
        {
            return view('dash-telu.login');
        }

        public function cek_auth(Request $request)
        {
        try {
            $client = new Client();
            $response = $client->request('POST', $this->link.'/login',[
                'form_params' => [
                    'nik' => $request->input('nik'),
                    'password' => $request->input('password')
                ]
            ]);
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                $data = json_decode($response_data,true);
                if($data["message"] == "success"){
                    Session::put('token',$data["token"]);
                    Session::put('login',TRUE);
                    $response2 = $client->request('GET', $this->link.'/profile',[
                        'headers' => [
                            'Authorization' => 'Bearer '.$data["token"],
                            'Accept'     => 'application/json',
                        ]
                    ]);
            
                    if ($response2->getStatusCode() == 200) { // 200 OK
                        $response_data2 = $response2->getBody()->getContents();
                        
                        $data2 = json_decode($response_data2,true);
                        $res = $data2['user'];
                        if(count($res) > 0){
                            Session::put('isLoggedIn',TRUE);
                            Session::put('dash','dashTelu');
                            Session::put('kodeMenu',$res[0]["kode_klp_menu"]);
                            Session::put('userLog',$res[0]["nik"]);
                            Session::put('namaUser',$res[0]["nama"]);
                            Session::put('statusAdmin',$res[0]["status_admin"]);
                            Session::put('klpAkses',$res[0]["klp_akses"]);
                            Session::put('lokasi',$res[0]["kode_lokasi"]);
                            Session::put('namaLokasi',$res[0]["nmlok"]);
                            Session::put('kodePP',$res[0]["kode_pp"]);
                            Session::put('namaPP',$res[0]["nama_pp"]);
                            Session::put('kode_lokkonsol',$res[0]["kode_lokkonsol"]);
                            Session::put('foto',$res[0]["foto"]);
                            Session::put('logo',$res[0]["logo"]);
                            Session::put('no_telp',$res[0]["no_telp"]);
                            Session::put('jabatan',$res[0]["jabatan"]);
                            Session::put('periode',$data2["periode"][0]["periode"]);
                            // Session::put('periode','201905');
                            Session::put('kode_fs',(isset($data2["kode_fs"][0]["kode_fs"]) ? $data2["kode_fs"][0]["kode_fs"] : ""));
                        }
                    }
                    
                    return redirect('dash-telu/');
                }else{
                    return redirect('dash-telu/login')->with('alert','Password atau NIK, Salah !');
                }
            
                }else if($response->getStatusCode() == 401){
                    return redirect('dash-telu/login')->with('alert','Password atau NIK, Salah !');
                }

            } catch (BadResponseException $ex) {
                $response = $ex->getResponse();
                $res = json_decode($response->getBody(),true);
                return redirect('dash-telu/login')->with('alert',$res["message"]);
            }
        
        }

        public function logout()
        {
            Session::flush();
            return redirect('dash-telu/login')->with('alert','Kamu sudah logout');
        }

        public function getMenu(){
            $client = new Client();
            $kodemenu = Session::get('kodeMenu');
            $response = $client->request('GET', $this->link.'/menu/'.$kodemenu,[
                'headers' => [
                    'Authorization' => 'Bearer '.Session::get('token'),
                    'Accept'     => 'application/json',
                    ]
            ]);

            $hasil = "";
            if ($response->getStatusCode() == 200) { // 200 OK
                $response_data = $response->getBody()->getContents();
                
                $data = json_decode($response_data,true);
                $main_menu = $data['success']['data'];
                $main = "<div class='scroll'>
                <ul class='list-unstyled'>";
                $submenu = "<div class='scroll'>";
                $pre_prt = 1;
                $parent_array = array();
                $hasil = "";
                $kode = array(); 
                if(count($main_menu) > 0){
                    for($i=0; $i<count($main_menu); $i++){
                        $forms = str_replace("_","/", $main_menu[$i]['form']);
                        $this_lv = $main_menu[$i]['level_menu']; 
                        $forms = explode("/",$forms);
                        if(ISSET($forms[2])){
                            $this_link = $forms[2];
                        }else{
                            $this_link = "";
                        }
                        
                        if($this_lv == 0){
                            if(!ISSET($main_menu[$i-1]['level_menu'])){
                                $prev_lv2 = 0; 
                            }else{
                                $prev_lv2 = $main_menu[$i-1]['level_menu'];
                            }
                    
                            if(!ISSET($main_menu[$i+1]['level_menu'])){
                                $next_lv2 = $main_menu[$i]['level_menu'];
                            }else{
                                $next_lv2 = $main_menu[$i+1]['level_menu']; //t1 nv=1
                            }
                            $level_nol = 'sub'.$main_menu[$i]['kode_menu'];
                            $sub[$level_nol] = "";
                            array_push($kode,$level_nol);
                            if($next_lv2 > 0){
                                $main .=" 
                                <li>
                                        <a href='#main".$main_menu[$i]['kode_menu']."'>
                                        <i class='".$main_menu[$i]['icon']."'></i>
                                            <span>".$main_menu[$i]['nama']."</span>
                                        </a>
                                </li>";

                                $submenu .= "<ul class='list-unstyled' data-link='main".$main_menu[$i]['kode_menu']."' id='sub".$main_menu[$i]['kode_menu']."'></ul>";
                            }else{
                                $main .=" 
                                <li>
                                        <a href='#' data-href='$this_link' class='a_link'>
                                        <i class='".$main_menu[$i]['icon']."'></i>
                                            <span>".$main_menu[$i]['nama']."</span>
                                        </a>
                                </li>";
                                $submenu .="";
                            }
                        }else{
                            if(!ISSET($main_menu[$i-1]['level_menu'])){
                                $prev_lv = 1; 
                            }else{
                                $prev_lv = $main_menu[$i-1]['level_menu'];
                            }
                    
                            if(!ISSET($main_menu[$i+1]['level_menu'])){
                                $next_lv = $main_menu[$i]['level_menu'];
                            }else{
                                $next_lv = $main_menu[$i+1]['level_menu']; //t1 nv=1
                            }
                            
                            // Sintaks Menu Level 0 dan Tanpa Anak
                            if($this_lv == 1 AND $next_lv == 1){
                                
                                $sub[$level_nol] .= "
                                <li class=''>
                                    <a href='#' class='a_link' data-href='$this_link'>
                                        <i class='".$main_menu[$i]['icon']."'></i> <span class='d-inline-block'>".$main_menu[$i]['nama']."</span>
                                    </a>
                                </li>
                                ";
                                
                            }
                            // Sintaks Menu Level 0 dan beranak
                            else if($this_lv == 1 AND $next_lv > 1){
                                $sub[$level_nol] .="
                                <li>
                                <a href='#' data-toggle='collapse' data-target='#collapse".$main_menu[$i]['kode_menu']."' aria-expanded='true'
                                    aria-controls='collapse".$main_menu[$i]['kode_menu']."' class='rotate-arrow-icon'>
                                    <i class='simple-icon-arrow-down'></i> <span class='d-inline-block'>Menu Types</span>
                                </a>
                                <div id='collapse".$main_menu[$i]['kode_menu']."' class='collapse show' data-parent='#main".$main_menu[$i]['kode_menu']."'>
                                    <ul class='list-unstyled inner-level-menu'>

                                ";
                            }else if(($this_lv > $prev_lv OR $this_lv == $prev_lv OR $this_lv < $prev_lv) AND $this_lv < $next_lv){
                                $sub[$level_nol].= " 
                                <li>
                                <a href='#' data-toggle='collapse' data-target='#collapse".$main_menu[$i]['kode_menu']."' aria-expanded='true'
                                    aria-controls='collapse".$main_menu[$i]['kode_menu']."' class='rotate-arrow-icon'>
                                    <i class='simple-icon-arrow-down'></i> <span class='d-inline-block'>Menu Types</span>
                                </a>
                                <div id='collapse".$main_menu[$i]['kode_menu']."' class='collapse show' data-parent='#main".$main_menu[$i]['kode_menu']."'>
                                    <ul class='list-unstyled inner-level-menu'>";
                            }else if(($this_lv > $prev_lv OR $this_lv == $prev_lv OR $this_lv < $prev_lv) AND $this_lv == $next_lv){
                                $sub[$level_nol].= " 
                                <li class=''>
                                    <a href='#' class='a_link' data-href='$this_link'>
                                        <i class='".$main_menu[$i]['icon']."'></i> <span class='d-inline-block'>".$main_menu[$i]['nama']."</span>
                                    </a>
                                </li>
                                ";
                            }else if($this_lv > $prev_lv AND $this_lv > $next_lv){
                                $sub[$level_nol].= " 
                                <li class=''>
                                    <a href='#' class='a_link' data-href='$this_link'>
                                        <i class='".$main_menu[$i]['icon']."'></i> <span class='d-inline-block'>".$main_menu[$i]['nama']."</span>
                                    </a>
                                </li>";
                            }else if(($this_lv == $prev_lv OR $this_lv < $prev_lv) AND $this_lv > $next_lv){
                                $sub[$level_nol].= " 
                                <li class=''>
                                    <a href='#' class='a_link' data-href='$this_link'>
                                        <i class='".$main_menu[$i]['icon']."'></i> <span class='d-inline-block'>".$main_menu[$i]['nama']."</span>
                                    </a>
                                </li>
                                </div>
                                </ul>";
                            }
                        }
                    }
                }
                $main .="
                    </ul>
                </div>";
                
                // $str = file_get_contents('http://localhost:8080/laravelsai/public/data.json');
                // $menu = json_decode($str, true);
                // $allmenu = $menu['allmenu'];
                    

                // $output = $this->buildMenu($allmenu);

                $submenu .="</div>";

                    
                $success['status'] = true;
                $success['main_menu'] = $main;
                $success['sub_menu'] = $submenu;
                $success['subdata'] = $sub;
                $success['kode_menu'] = $kode;
        
            }else{
                $success['status'] = true;
                $success['main_menu'] = "" ;
            }
                    
            return response()->json([$success], 200);     
         }

    }

?>