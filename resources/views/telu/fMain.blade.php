
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SAKU - Admin Dashboard</title>

    <!-- Selectize -->
    <link href="{{ asset('asset_elite/selectize.bootstrap3.css') }}" rel="stylesheet">
    <!-- Sweet Alert CSS -->
    <link rel="stylesheet" href="{{ asset('asset_elite/swal/sweetalert2.min.css') }}">
    <!-- Bootstrap CSS CDN -->
    <link href="{{ asset('asset_elite/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Datatables Button CSS -->
    <link rel="stylesheet" href="{{ asset('asset_elite/datatables/datatables/buttons/css/buttons.dataTables.min.css') }}">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('asset_elite/sakube.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_elite/toggle.scss') }}">
    <style>
        
    </style>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('asset_elite/bootstrap/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_elite/bootstrap/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('asset_elite/datatables/datatables/css/dataTables.bootstrap4.min.css') }}">
    <script src="{{ asset('asset_elite/bootstrap/js/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('asset_elite/datatables/datatables/js/jquery.dataTables.min.js') }}"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> -->

    <!-- 

    ====================== DATATABLES BOOTSTRAP 4 RESPONSIVE PACKAGE
        -->
        <script src="{{ asset('asset_elite/datatables/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('asset_elite/datatables/datatables/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('asset_elite/datatables/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    
    <!-- jQuery Custom Scroller CDN -->
    <script src="{{ asset('asset_elite/bootstrap/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    
    <!-- Selectize JS -->
    <script src="{{ asset('asset_elite/standalone/selectize.min.js') }}"></script>
    <!-- Sweet Alert JS -->
    <script src="{{ asset('asset_elite/swal/sweetalert2.all.min.js') }}"></script>
    <!-- Font Awesome JS -->
    <script defer src="{{ asset('asset_elite/bootstrap/js/solid.js') }}"></script>
    <script defer src="{{ asset('asset_elite/bootstrap/js/fontawesome.js') }}"></script>
    <script src="{{ asset('asset_elite/highcharts2.js') }}"></script>
    <script src="{{ asset('asset_elite/highcharts-more.js') }}"></script>
    
    
    <!-- Popper.JS -->
    <script src="{{ asset('asset_elite/bootstrap/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('asset_elite/bootstrap/js/bootstrap.js') }}"></script>
    
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
<div class="loading" style="display: none;">
</div>
<div class="loading-text" style="display: none;">
Selamat Bekerja
</div>
<div class="overlay"></div>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header" style="padding:.65rem; height:10vh;">
            <div class="row align-items-center justify-content-center" >
                <div class="col-2">
                <img src="{{ asset('asset_elite/icons/InfoKeuangan.svg') }}" height="25px" width="25px" alt="Info Keuangan Logo" title="Info Keuangan">  
                </div>
                <div class="col-7 pl-4">
                    <div class="row"  style="font-size: 14px;">
                        <b>
                        @php
                            $tahun=substr(Session::get('periode'),0,4);
                            $bulan=substr(Session::get('periode'),5,2);
                            if ($bulan =="01"){
                                $bulan= "Januari ";
                            }elseif ($bulan=="02") {
                                $bulan= "Februari ";
                            }elseif ($bulan=="03") {
                                $bulan= "Maret ";
                            }elseif ($bulan=="04") {
                                $bulan= "April ";
                            }elseif ($bulan=="05") {
                                $bulan= "Mei ";
                            }elseif ($bulan=="06") {
                                $bulan= "Juni ";
                            }elseif ($bulan=="07") {
                                $bulan= "Juli ";
                            }elseif ($bulan=="08") {
                                $bulan= "Agustus ";
                            }elseif ($bulan=="09") {
                                $bulan= "September ";
                            }elseif ($bulan=="10") {
                                $bulan= "Oktober ";
                            }elseif ($bulan=="11") {
                                $bulan= "November ";
                            }elseif ($bulan=="12") {
                                $bulan= "Desember ";
                            }else{
                                $bulan= "-";
                            }
                        @endphp
                        {{$bulan}} {{$tahun}}
                        </b>
                    </div>
                    <div class="row"  style="font-size: 12px;">
                    @if(Session::has('namaLokasi'))
                        Lokasi {{Session::get('namaLokasi')}}
                    @else
                        Lokasi -
                    @endif
                    </div>
                </div>
                <div class="col-3 ">
                    <a href="#" id="sidebarCollapse" class="sidebarCollapseHide">
                        <img src="{{ asset('asset_elite/icons/BackButton.svg') }}" height="25px" width="25px" alt="Hide" title="Hide"> 
                    </a>
                </div>
            </div>
            
            <!-- <img src="{{ asset('asset_elite/images/logo.png') }}" width="30px" alt="homepage"/>
            <img src="{{ asset('asset_elite/images/logo-text.png') }}" width="90px" alt="homepage" /></span> </a> -->
            </div>
            <!-- <div class="dropdown-divider"></div> -->
            <center>
            <!-- <div class="can-toggle">
            <input id="b" type="checkbox">
            <label for="b">
                <div class="can-toggle__switch" data-checked="Transaksi" data-unchecked="Laporan"></div>
            </label>
            </div> -->
                <div class="jenis-menu btn-group btn-group-toggle bg-light " data-toggle="buttons" style="margin:0px 0px 0px 0px;padding:5px;border-radius:15px;width:90%;">
                    <label class="btn btn-primary active" style="border-radius:10px 10px 10px 10px;border-width:0px;font-size:14px;margin-right:2.5px;" id="btn-transaksi">
                        <input type="radio" name="options" value="transaksi" autocomplete="off" checked> Transaksi
                    </label>
                    <label class="btn btn-light" id="btn-laporan" style="border-radius:10px 10px 10px 10px;border-width:0px;font-size:14px;margin-left:2.5px;">
                        <input type="radio" name="options" value="laporan" id="btn-laporan" autocomplete="off"> Laporan
                    </label>
                </div>
            </center>

            <ul class="list-unstyled components" id="menu-sidebar">

            </ul>
        </nav>

        <nav id="sidebar-right" class="active">
            <section id="right-sidebarProfile" style="display: none;">
                <div class="container" style="padding:25px;">
                    <div class="row justify-content-end">
                        <button type="button" class="btn btn-primary btn-sm" style="background-color: white;color:#007aff;padding:2px 20px;border-radius: 20px;">Edit</button>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4 justify-content-center align-items-center pl-0">
                            @if (Session::has('foto'))
                            <center>
                                <img src="{{ asset('asset_elite/images/'.Session::get('foto')) }}" class="profile-image-sm" style="border: 2px solid #007aff;width: 50px;height: 50px;">
                            </center>
                            @else
                            <center>
                                <img src="{{ asset('asset_elite/images/user.png') }}" class="profile-image-sm" style="border: 2px solid #007aff;width: 50px;height: 50px;">
                            </center>
                            @endif
                        </div>
                        <div class="col-8 justify-content-center">
                            <div class="row mb-1">
                                {{Session::get('namaUser')}}
                            </div>
                            <div class="row mt-1" >
                                {{Session::get('userLog')}}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2 profile-title pl-2">
                        Jabatan
                    </div>
                    <div class="row profile-desc pl-2">
                        {{Session::get('jabatan')}}
                    </div>
                    <div class="row mt-2 profile-title pl-2">
                        Username
                    </div>
                    <div class="row profile-desc pl-2">
                        {{Session::get('userLog')}}
                    </div>
                    <div class="row mt-2 profile-title pl-2">
                        E-mail
                    </div>
                    <div class="row profile-desc pl-2">
                        {{Session::get('email')}}
                    </div>
                    <div class="row mt-2 profile-title pl-2">
                        Nomor Ponsel
                    </div>
                    <div class="row profile-desc pl-2">
                        {{Session::get('no_telp')}}
                    </div>

                    <!-- <div class="row mt-2 profile-title">
                        Password
                    </div>
                    <div class="row profile-desc">
                        <div class="col-6" style="padding-left:0px;">
                            &#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;
                        </div>
                        <div class="col-4">
                            <span id="password-level" class="level-kuat">
                                Kuat
                            </span>
                        </div>
                        <div class="col-2">
                            <img src="/vendor/sakube/assets/icons/eye.svg" width="20px" height="20px"  alt="show" id="show-hidePassword" style="cursor:pointer;">
                        </div>
                    </div> -->
                </div>
                <hr class="mt-4">
                <div class="container" style="padding:  0px 25px 0px 25px;">
                    <div class="row profile-title">
                        Pusat Pertanggungjawaban / PP
                    </div>
                </div>
                <hr>
                <div class="container" style="padding: 0px 25px 0px 25px;">
                    <div class="row profile-title">
                        Data Personal
                    </div>
                </div>
                <div class="container" style="padding: 5px 25px 5px 25px;position:fixed;bottom:0;background:black;">
                    <a href='{{url('telu/logout')}}'>
                        <div class="row">
                            Keluar
                        </div>
                    </a>
                </div>
                    
            </section>
            <section id="right-sidebarNotif" style="display: none;">
            <div class="container mt-2">

                <div class="sidebar-header">
                    @php
                            if (date('m')==1){
                                $bulan= "Januari ";
                            }elseif (date('m')==2) {
                                $bulan= "Februari ";
                            }elseif (date('m')==3) {
                                $bulan= "Maret ";
                            }elseif (date('m')==4) {
                                $bulan= "April ";
                            }elseif (date('m')==5) {
                                $bulan= "Mei ";
                            }elseif (date('m')==6) {
                                $bulan= "Juni ";
                            }elseif (date('m')==7) {
                                $bulan= "Juli ";
                            }elseif (date('m')==8) {
                                $bulan= "Agustus ";
                            }elseif (date('m')==9) {
                                $bulan= "September ";
                            }elseif (date('m')==10) {
                                $bulan= "Oktober ";
                            }elseif (date('m')==11) {
                                $bulan= "November ";
                            }elseif (date('m')==12) {
                                $bulan= "Desember ";
                            }else{
                                $bulan= "-";
                            }                   
                        @endphp
                        <div class='row align-items-center'>
                            <div class='col-3' style='font-size:40px;'>
                                {{date('d')}}
                            </div>
                            <div class='col-9'>
                                <div class='row'>    
                                {{$bulan}}
                                </div>
                                <div class='row'>    
                                {{date('Y')}}
                                </div>
                            </div>
                        </div>
                </div>
                <div class="sidebar-content">
                    Nama Modul
                </div>
                <div class="card" style="border-color: #7f7f7f;">
                    <div class="card-header active" style="background-color:#9f9f9f;">
                        KKN09876
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span> -->
                    </div>
                    <div class="card-body " style="background-color: #afafaf;">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt tempore cupiditate est, velit impedit atque quas provident maxime quos facilis ut placeat saepe sint? Maxime aut minima cumque veniam? Ratione!    
                    </div>
                </div>
            </div>

            </section>
        </nav>

        <!-- Page Content  -->
        <div id="content" style='background: white;'>

            <nav class="navbar navbar-expand-lg navbar-light sticky-top">
                <div class="container-fluid">

                    <a href="#" id="sidebarCollapse" class="sidebarCollapseShow mr-2" style="display:none;">
                        <img src="{{ asset('asset_elite/icons/menuButton.svg') }}" height="25px" width="25px" alt="Show" title="Show Sidebar"> 
                    </a>
                    <span class="lokasi-title">
                        {{Session::get('namaLokasi')}} 
                    </span>
                    
                    <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> -->
                    <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> -->
                        <!-- <i class="fas fa-align-justify"></i>
                    </button> -->

                    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <!-- <ul class="nav navbar-nav ml-auto"> -->
                        <ul class="nav ml-auto">
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="right-sidebarCollapseProfile">
                                <!-- <span class="dropdown-text">Profile</span> -->
                                <span class="dropdown-text">
                                    @if (Session::has('foto'))
                                        <img src="{{ asset('asset_elite/images/'.Session::get('foto')) }}" class="profile-image-xs">
                                    @else
                                        <img src="{{ asset('asset_elite/images/user.png') }}" class="profile-image-xs">
                                    @endif
                                    {{Session::get('namaUser')}}
                                </span>
                            </a>
                            <div class="vl"></div>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="link-dashboard">
                                <img src="{{ asset('asset_elite/icons/Dashboard.svg') }}" height="25px" width="25px" alt="Dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard"> 
                                <!-- <i class="menu-icon fa fa-desktop"></i> -->
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('telu/telu_main')}}" target="_blank">
                                <img src="{{ asset('asset_elite/icons/NewTab.svg') }}" height="25px" width="25px" alt="New Tab" data-toggle="tooltip" data-placement="bottom" title="New Tab"> 
                                <!-- <i class="menu-icon fa fa-window-restore"></i>     -->
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="right-sidebarCollapseNotif">
                                    <!-- <i class="menu-icon fas fa-box"></i> -->
                                    <img src="{{ asset('asset_elite/icons/Notif.svg') }}" height="25px" width="25px" alt="Notif" data-toggle="tooltip" data-placement="bottom" title="Notifikasi"> 
                                </a>
                            </li>
                        </ul>
                    <!-- </div> -->
                </div>
            </nav>
            <style>
                
                .nav2 {
                    display: flex;
                    flex-wrap: wrap;
                    padding: 10px;
                    margin-bottom: 0;
                    list-style: none; 
                    margin-left:20px;
                }

                .nav2-link {
                    display: block;
                    padding: 2px 20px; 
                    border-radius: 25px;
                    line-height: 25px;
                    height: 30px;
                }
                .nav2-link:hover, .nav2-link:focus {
                    text-decoration: none; 
                }
                .nav2-link.active{
                    background: #ad1d3e;
                    color: white;
                    padding: 2px 20px;
                }
            </style>
            <nav class="nav2">
                <a class="nav2-link active a_link" href='#' data-href="app/telu/dashTelu"><img src="{{ asset('asset_elite/icons/home-run1.svg') }}" style='margin-bottom:5px;width:15px'> Home</a>
                <a class="nav2-link a_link" href='#' data-href="app/telu/dashTeluPdpt"><img src="{{ asset('asset_elite/icons/coins1.svg') }}" style='margin-bottom:5px;width:20px'> Pendapatan</a>
                <a class="nav2-link a_link" href="#"><img src="{{ asset('asset_elite/icons/coins1.svg') }}" style='margin-bottom:5px;width:20px'> Beban</a>
            </nav>
            <section id="content-body">
            
            </section>
        </div>
    </div>

<script type="text/javascript">
    // var $request = "<?=$_SERVER['REQUEST_URI']?>";
    // var $request2 = $request.split("/");
    var form = "{{Session::get('dash')}}";
    var menu = "{{Session::get('kodeMenu')}}";
    var login = "{{Session::get('isLoggedIn')}}";

    // FUNCTION LOAD FORM
    function loadForm(url){
        $('#content-body').load(url);
    }

    $('#btn-transaksi').on('click',function(){
        $('#btn-transaksi').addClass('btn-primary');
        $('#btn-transaksi').removeClass('btn-light');
        $('#btn-laporan').addClass('btn-light');
        $('#btn-laporan').removeClass('btn-primary');
    });

    $('#btn-laporan').on('click',function(){
        $('#btn-laporan').addClass('btn-primary');
        $('#btn-laporan').removeClass('btn-light');
        $('#btn-transaksi').addClass('btn-light');
        $('#btn-transaksi').removeClass('btn-primary');
    });

    // ON CLICK MENU
    $('.nav2').on('click','.a_link',function(e){
        e.preventDefault();
        var url = $(this).data('href');
        var url = "{{ url('/saku/form')}}"+"/"+form;
        if(form == "" || form == "-"){
            // alert('Form dilock!');
        return false;
        }else{
            loadForm(url);
         }
    });

    // Menu Handler
    $(".btn-group-toggle input:radio").on('change', function() {
        let val = $(this).val();
    var kodeMenu = "{{Session::get('kodeMenu')}}";
        if (val == 'transaksi') {
            var jenis= 'T';
            $.ajax({
                type: 'GET',
                url: "{{url('/telu/menu')}}",
                dataType: 'json',
                async:false,
                data: {'kodeklp':kodeMenu,'jenis':jenis},
                success:function(result){
                    if(result.status){
                        $('#menu-sidebar').html('');
                        $(result.hasil).appendTo('#menu-sidebar').slideDown();
                    }
                }
            });
        }else{
            var jenis= 'L';
            $.ajax({
                type: 'GET',
                url: "{{url('/telu/menu')}}",
                dataType: 'json',
                async:false,
                data: {'kodeklp':kodeMenu,'jenis':jenis},
                success:function(result){
                    if(result.status){
                        $('#menu-sidebar').html('');
                        $(result.hasil).appendTo('#menu-sidebar').slideDown();
                    }
                }
            });
        }
    });

    $('#link-dashboard').on('click',function(){
        var url = "{{ url('/telu/form')}}"+"/"+form;
        loadForm(url);
    });

    $('#sidebarCollapse').on('click',function(){
        $('#sidebar-hide-icon').hide();
    });

    if (!sessionStorage.isVisited) {
        $('.loading').show();
        $('.loading-text').show();
        $(document).ready(function(){
            sessionStorage.isVisited = 'true'
            $('.loading').delay(3000).fadeOut(3000);
            $('.loading-text').delay(3000).fadeOut(3000);
        });
    }

    $(document).ready(function(){
        var kodeMenu="Session::get('kodeMenu')";
        var jenis= 'T';
        $.ajax({
            type: 'GET',
            url: "{{url('/telu/menu')}}",
            dataType: 'json',
            async:false,
            data: {'kodeklp':kodeMenu,'jenis':jenis},
            success:function(result){
                // console.log(result);
                if(result.status){
                    $('.nav2').html('');
                    $(result.hasil).appendTo('.nav2').slideDown();
                }
            }
        });

        $('[data-toggle="tooltip"]').tooltip()

        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('.sidebarCollapseHide').on('click',function(){
            $('#sidebar, #content').addClass('active');
            $('.sidebarCollapseShow').show();
            $('.sidebarCollapseHide').hide();
        });

        // $('.sidebarCollapseShow').on('click',function(){
        //     $('#sidebar, #content').removeClass('active');
        //     $('.sidebarCollapseHide').show();
        //     $('.sidebarCollapseShow').hide();
        // });

        $('#right-sidebarCollapseNotif').on('click', function () {
            $('#sidebar-right').toggleClass('active');
            $('#right-sidebarNotif').show();
            $('#right-sidebarProfile').hide();
            $('.overlay').toggleClass('active');
        });

        $('#right-sidebarCollapseProfile').on('click', function () {
            $('#sidebar-right').toggleClass('active');
            $('#right-sidebarProfile').show();
            $('#right-sidebarNotif').hide();
            $('.overlay').toggleClass('active');
        });

        $('.sidebarCollapseHide').click();

        if(form !="" || form != "-"){
            var url = $(this).data('href');
            var url = "{{ url('/telu/form')}}"+"/"+form;
            loadForm(url)
        }
    });
    </script>
    
    {{-- @if(!Session::get('isLogedIn'))
       <script>
            alert('Harap login terlebih dahulu !'); 
            window.location="{{url('/')}}";
        </script>
    @endif --}}
    
</body>



</html>