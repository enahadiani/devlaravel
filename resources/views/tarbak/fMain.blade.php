<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('asset_elite/images/sai_icon/saku.png') }}">
    <title>SAKU | Sistem Akuntansi Keuangan Digital</title>
    <!-- This page CSS -->
    <!-- Font Awesome CSS -->
    <link href="{{ url('asset_elite/icons/font-awesome/css/fa-brands.css') }}" rel="stylesheet">
    <link href="{{ url('asset_elite/icons/font-awesome/css/fa-regular.css') }}" rel="stylesheet">
    <link href="{{ url('asset_elite/icons/font-awesome/css/fa-solid.css') }}" rel="stylesheet">
    <link href="{{ url('asset_elite/icons/font-awesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ url('asset_elite/icons/font-awesome/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ url('asset_elite/icons/font-awesome/webfonts/fa-solid-900.woff2') }}" rel="stylesheet">
    <link href="{{ url('asset_elite/icons/font-awesome/webfonts/fa-solid-900.ttf') }}" rel="stylesheet">
    <link href="{{ url('asset_elite/icons/font-awesome/webfonts/fa-solid-900.woff') }}" rel="stylesheet">
    
    <!-- chartist CSS -->
    <link href="{{ url('asset_elite/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
     
    <!--Toaster Popup message CSS -->
    <link href="{{ url('asset_elite/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ url('asset_elite/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ url('asset_elite/dist/css/pages/dashboard1.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('asset_elite/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- Select 2 -->
    <link href="{{ url('asset_elite/node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- SAI CSS -->
    <link href="{{ url('asset_elite/dist/css/sai.css') }}" rel="stylesheet">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.6/dist/sweetalert2.min.css"> -->
    
    <link rel="stylesheet" href="{{ url('asset_elite/dist/js/swal/sweetalert2.min.css') }}">
    
    <!-- Quill Theme included stylesheets -->
    <!-- <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet"> -->
    <!-- Selectize -->
    <link href="{{ url('asset_elite/selectize.bootstrap3.css') }}" rel="stylesheet">
    <!-- Datepicker -->
    <link rel="stylesheet" href="{{ url('asset_elite/bootstrap-datepicker.min.css') }}">
    <!-- Tagify -->
    <link rel="stylesheet" href="{{ url('asset_elite/tagify/dist/tagify.css') }}">
    
    <style>
        .topbar .top-navbar .navbar-header {
            height: 50px;
            line-height: 50px;
        }
        .topbar .top-navbar,.navbar-collapse,.navbar-nav {
            height: 50px;
        }

        .left-sidebar {
            padding-top: 50px !important;
        }

        .fixed-header .page-wrapper, .fixed-layout .page-wrapper {
            padding-top: 50px !important;
        }

        .topbar .top-navbar .navbar-nav > .nav-item > .nav-link {
            line-height: 35px !important;
        }
        .ajax-content-section{
            min-height: 560px !important;
        }

        .navbar-header{
            width:260px;
        }

        .left-sidebar{
            width:260px;
        }

        .sidebar-nav > ul > li > ul > li > a {
            padding: 7px 10px 7px 15px;
        }

        .footer, .page-wrapper {
            margin-left: 260px;
        }
    </style>

    <script src="{{ url('asset_elite/dist/js/highcharts2.js') }}"></script>
    <!-- <script src="js/highcharts-3d.js"></script> -->
    <!-- <script src="https://code.highcharts.com/modules/bullet.js"></script> -->
    <script src="{{ url('asset_elite/dist/js/highcharts-more.js')}}"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!-- ===================================================================== -->
    <!-- ================================JS=================================== -->
    <!-- ===================================================================== -->

        
    <script src="{{ url('asset_elite/jquery-3.4.1.js') }}" ></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ url('asset_elite/node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ url('asset_elite/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ url('asset_elite/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ url('asset_elite/dist/js/waves.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ url('asset_elite/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ url('asset_elite/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Select 2 -->
    <script src="{{ url('asset_elite/node_modules/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
    <!--Menu sidebar -->
    <script src="{{ url('asset_elite/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('asset_elite/dist/js/custom.min.js') }}"></script>
    <!-- <script src="js/selectize.min.js"></script> -->
    <script src="{{ url('asset_elite/standalone/selectize.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{ url('asset_elite/node_modules/raphael/raphael-min.js') }}"></script>
    <script src="{{ url('asset_elite/node_modules/morrisjs/morris.min.js') }}"></script>
    <script src="{{ url('asset_elite/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
   
    <!-- Popup message jquery -->
    <script src="{{ url('asset_elite/node_modules/toast-master/js/jquery.toast.js') }}"></script>
    <!-- Datepicker -->
    <script src="{{ url('asset_elite/bootstrap-datepicker.min.js') }}"></script>
    <!-- Chart JS -->
    <!-- <script src="asset_elite/dist/js/dashboard1.js"></script> -->
    <!-- JS Tagify -->
    <!-- <script src="asset_elite/tagify/dist/tagify.js"></script>
    <script src="asset_elite/tagify/dist/tagify.min.js"></script>
    <script src="asset_elite/tagify/dist/jQuery.tagify.min.js"></script> -->

    <!-- sweet alert -->
    <!-- <script src="sweetalert2.all.min.js"></script> -->
    <!-- <script src="/swal/sweetalert2.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.17.6/dist/sweetalert2.all.min.js"></script>
     -->
    <script src="{{ url('asset_elite/dist/js/swal/sweetalert2.all.min.js') }}"></script>
    
    <!-- This is data table -->
    <script src="{{ url('asset_elite/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <!-- start - This is for export functionality only -->
    <!-- <script src="asset_elite/node_modules/jquery-datatables-editable/jquery.dataTables.js"></script> -->
    
    
    <!-- <script src="asset_elite/node_modules/jquery-datatables-editable/jquery.dataTables.js"></script> -->
    <script src="{{ url('asset_elite/node_modules/tiny-editable/mindmup-editabletable.js') }}"></script>
    <script src="{{ url('asset_elite/node_modules/tiny-editable/numeric-input-example.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/formatted-numbers.js"></script> -->

    
    <script src="{{ url('asset_elite/printThis/printThis.js') }}"></script>
    <script src="{{ url('asset_elite/jquery.tableToExcel.js') }}"></script>
    <script src="{{ url('asset_elite/jquery.twbsPagination.min.js') }}"></script>

    <!-- Tiny Editor -->
    <!-- <script src="asset_elite/tinymce/tinymce.min.js" referrerpolicy="origin"></script> -->
  
    <!-- end - This is for export functionality only -->
    <!-- Main Quill library -->
    <!-- <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script> -->
    <!-- End Main Quill Libary -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    
    
<![endif]-->
<script src="{{ url('asset_elite/tagify/dist/tagify.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.selectize').selectize();
            });            
        </script>
        
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SAKU admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="/$root_app/">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="asset_elite/images/sai_icon/esaku-landscape2.png" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo icon -->
                            <img src="{{ url('asset_elite/images/sai_icon/logo.png') }}" width="30px" alt="homepage" class="light-logo" />
                            <!-- <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                         <!-- Light Logo text -->    
                         <img src="{{ url('asset_elite/images/sai_icon/logo-text.png') }}" width="90px"  class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Search & enter">
                            </form>
                        </li> -->
                        <li class="nav-item"> 
                        <h3 style='line-height:50px;color:white'> 
                        {{ Session::get('namalokasi') }}
                        </h3>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <!-- <a href="javascript:void(0)">
                                                <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a> -->
                                            <!-- Message -->
                                            <!-- <a href="javascript:void(0)">
                                                <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a> -->
                                            <!-- Message -->
                                            <!-- <a href="javascript:void(0)">
                                                <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a> -->
                                            <!-- Message -->
                                            <!-- <a href="javascript:void(0)">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a> -->
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                     
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User Profile-->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            @if (Session::has('foto'))
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('asset_elite/images/'.Session::get('foto')) }}"  alt="user" class=""> <span class="hidden-md-down">{{ Session::get('namaUser') }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            @else
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('asset_elite/images/user.png') }}"  alt="user" class=""> <span class="hidden-md-down">{{ Session::get('namaUser') }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            @endif
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="#"  id='seeProfile' class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="{{url('tarbak/logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- <li class="nav-small-cap">--- PERSONAL</li>
                        <li> <a class=" waves-effect waves-dark" href="<?=$root_app?>/main/"aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</a>
                        </li> -->
                        <!-- <li class="nav-small-cap">--- DASHBOARD &amp; TABLE, FORM </li> -->
                        @php
                                $kode_menu = Session::get('kodeMenu');
                                // $sql = "select * from menu where kode_klp='".$kode_menu."' order by rowindex";
                                $sql="select a.*,b.form from menu a left join m_form b on a.kode_form=b.kode_form where a.kode_klp = '$kode_menu' and (isnull(a.jenis_menu,'-') = '-' OR a.jenis_menu = '') order by kode_klp, rowindex";
                                $rs=execute($sql);
                                //$daftar_menu = $rs->GetRowAssoc();
                                while ($row = $rs->FetchNextObject($toupper=false))
                                {
                                    $daftar_menu[] = (array)$row;
                                }

                                $pre_prt = 0;
                                $parent_array = array();
                                for($i=0; $i<count($daftar_menu); $i++){
                                    $forms = str_replace("_","/", $daftar_menu[$i]["form"]);
                                    $this_lv = $daftar_menu[$i]['level_menu']; // t1 lv=0
                                    // $this_link = "fMain.php?hal=".$forms.".php";
                                    $forms = explode("/",$forms);
                                    $this_link = "$root_app/".$forms[2];

                                    if(!ISSET($daftar_menu[$i-1]['level_menu'])){
                                        $prev_lv = 0; // t1 pv=0
                                    }else{
                                        $prev_lv = $daftar_menu[$i-1]['level_menu'];
                                    }

                                    if(!ISSET($daftar_menu[$i+1]['level_menu'])){
                                        $next_lv = $daftar_menu[$i]['level_menu'];
                                    }else{
                                        $next_lv = $daftar_menu[$i+1]['level_menu']; //t1 nv=1
                                    }

                                    if($daftar_menu[$i]['level_menu']=="0"){
                                        if($daftar_menu[$i]['icon'] != "" && $daftar_menu[$i]['icon'] != null){
                                            $icon=$daftar_menu[$i]['icon'];
                                        }else{
                                            $icon="icon-notebook";
                                        }
                                        
                                    }else{
                                        if($daftar_menu[$i]['icon'] != "" && $daftar_menu[$i]['icon'] != null){
                                            $icon=$daftar_menu[$i]['icon'];
                                        }else{
                                            $icon="";
                                        }
                                    }

                            //         <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                            // <ul aria-expanded="false" class="collapse">
                            //     <li><a href="index.html">Minimal </a></li>
                            //     <li><a href="index2.html">Analytical</a></li>
                            //     <li><a href="index3.html">Demographical</a></li>
                            //     <li><a href="index4.html">Modern</a></li>
                            // </ul>

                            // <span class='pull-right-container'>
                            //                         <i class='fa fa-angle-right pull-right'></i>
                            //                     </span>

                                    if($this_lv == 0 AND $next_lv == 0){
                                        echo " 
                                        <li >
                                            <a href='#' data-href='$this_link' class='waves-effect waves-dark a_link'>
                                                <i class='$icon'></i> <span class='hide-menu'>".$daftar_menu[$i]["nama"]."</span>
                                            </a>
                                        </li>";
                                    }
                                    else if($this_lv == 0 AND $next_lv > 0){
                                        echo " 
                                        <li class='treeview'>
                                            <a href='#' data-href='$this_link' class='has-arrow waves-effect waves-dark a_link' aria-expanded='false'>
                                                <i class='icon-notebook'></i> <span class='hide-menu'>".$daftar_menu[$i]["nama"]."</span>
                                            </a>
                                            <ul class='collapse' id='sai_adminlte_menu_".$daftar_menu[$i]["kode_menu"]."' aria-expanded='false'>";
                                    }else if(($this_lv > $prev_lv OR $this_lv == $prev_lv OR $this_lv < $prev_lv) AND $this_lv < $next_lv){
                                        echo " 
                                        <li class='treeview'>
                                            <a href='#' data-href='$this_link' class='waves-effect waves-dark a_link'>
                                                <i class='$icon'></i> <span>".$daftar_menu[$i]["nama"]."</span>
                                                <span class='pull-right-container'>
                                                    <i class='fa fa-angle-right pull-right'></i>
                                                </span>
                                            </a>
                                            <ul class='treeview-menu' id='sai_adminlte_menu_".$daftar_menu[$i]["kode_menu"]."'>";
                                    }else if(($this_lv > $prev_lv OR $this_lv == $prev_lv OR $this_lv < $prev_lv) AND $this_lv == $next_lv){
                                        echo " 
                                        <li class=''>
                                            <a href='#' data-href='$this_link' class='a_link'>
                                                <i class='$icon'></i> <span>".$daftar_menu[$i]["nama"]."</span>
                                            </a>
                                        </li>";
                                    
                                    }else if($this_lv > $prev_lv AND $this_lv > $next_lv){
                                        echo " 
                                        <li >
                                            <a href='#' data-href='$this_link' class='a_link'>
                                                <i class='$icon'></i> <span>".$daftar_menu[$i]["nama"]."</span>
                                            </a>
                                        </li>";
                                        for($i=0; $i<($this_lv - $next_lv); $i++){
                                            echo "</ul></li>";
                                        }
                                    }else if(($this_lv == $prev_lv OR $this_lv < $prev_lv) AND $this_lv > $next_lv){
                                        echo " 
                                        <li >
                                            <a href='#' data-href='$this_link' class='a_link'>
                                                <i class='$icon'></i> <span>".$daftar_menu[$i]["nama"]."</span>
                                            </a>
                                        </li>";
                                echo "</ul>
                                    </li>";
                                        // for($i=0; $i<($this_lv - $next_lv); $i++){
                                        //     echo "</ul></li>";
                                        // }
                                    }
                                }
                        @endphp
                                <!-- <li><a href="/main/konten">Table Konten</a></li>
                                <li><a href="galeri">Table Galeri</a></li>
                                <li><a href="kategori">Table Kategori</a></li> -->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="">
            
            <section class="content" id='ajax-content-section'>
                <div class="body-content">
                </div>
            </section>
            <script>

                function loadForm(url){
                    $('.body-content').load(url);
                }
                
                if(form !="" || form != "-"){
                    // loadForm("<?=$root?>/app/tarbak/"+form+".php")
                }

                $('.dropdown-menu').on('click','#seeProfile',function(e){
                    // loadForm("<?=$root?>/app/tarbak/fProfile.php");
                });
                
                $('.sidebar-nav').on('click','.a_link',function(e){
                    e.preventDefault();
                    var url = $(this).data('href');
                    var tmp = url.split("/");
                    if(tmp[4] == "" || tmp[4] == "-"){
                        // alert('Form dilock!');
                        return false;
                    }else{
                        // loadForm("<?=$root?>/app/tarbak/"+tmp[4]+".php");
                    }
                    // alert(tmp[4]);
                });
            </script>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
       <footer class="footer">
        © 2019 Eliteadmin by themedesigner.in - devastator21
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    
</body>
</html>