<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- <meta name="author" content="INSPIRO" /> -->
    <meta name="description" content="PT Trengginas Jaya">
    <link rel="icon" type="image/png" href="images/favicon.png">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>PT Trengginas Jaya</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
    <style>
        h2::before{
            background-color: #DD1F1A !important;
        }
        header.sticky-active > .header-inner > .container > #logo > a > span.name {
            color: black !important;
        }
        .white {
            color: white !important;
        }
        .black{
            color: black !important;
        }
        ul {
            list-style-type: none;
        }
    </style>
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-fullwidth="true" data-transparent="true">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="index.html">
                            <span class="watch-class white"><img src="{{ asset('asset_web/img/Trengginas@2x.png') }}" class="mr-2"> Trengginas</span>
                        </a>
                    </div>
                    <!--End: Logo-->
                    <!-- Search -->
                    <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                        <form class="search-form" action="search-results-page.html" method="get">
                            <input class="form-control" name="q" type="text" placeholder="Type & Search..." />
                            <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                        </form>
                    </div>
                    <!-- end: search -->
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="{{url('/webginas2/')}}" class="a_link watch-class white" data-href="fHome">Home</a></li>
                                    <li class="dropdown mega-menu-item"><a href="#" class="a_link watch-class white" data-href="fLayanan">Layanan</a>
                                        <ul class="dropdown-menu">
                                            <li class="mega-menu-content">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <ul>
                                                            <a href="{{url('webginas2/layanan/outsourcing')}}"><h5 style="font-weight: bold;padding-bottom:25px;">Outsourcing</h5></a>
                                                            <li><p>Security</p></li>
                                                            <li><p>Cleaning Service</p></li>
                                                            <li><p>Driver</p></li>
                                                            <li><p>Administrasi</p></li>
                                                            <li><p>Help Desk</p></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul>
                                                            <h5 style="font-weight: bold;padding-bottom:25px;">Trading & Bussiness Retail</h5>
                                                            <li><p>Pemenuhan Keb. Barang/Jasa</p></li>
                                                            <li><p>Mini Market (TJ Mart)</p></li>
                                                            <li><p>Layanan Catering</p></li>
                                                            <li><p>Jasa Laundry</p></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul>
                                                            <h5 style="font-weight: bold;padding-bottom:25px;">Property</h5>
                                                            <li><p>Building Maintenance</p></li>
                                                            <li><p>Rental Kendaraan</p></li>
                                                            <li><p>Sewa Peralatan Pesta/Wisuda</p></li>
                                                            <li><p>Jasa Konstruksi</p></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{url('/webginas2/perusahaan')}}" class="a_link watch-class white" data-href="fPerusahaan">Perusahaan</a></li>
                                    <li><a href="{{url('/webginas2/kontak')}}" class="a_link watch-class white" data-href="fKontak">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--END: NAVIGATION-->
                </div>
            </div>
        </header>
        <!-- end: Header -->
        <!-- Page title -->
        <section id="page-title" class="page-title-center text-light" style="background-color:#DD1F1A;">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="page-title">
                    <h1 style="font-weight: bold;">Berita</h1>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Isi Berita</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <!-- Content -->
        
        <!-- Berita -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="content col-lg-8">
                        <div class="single-post">
                            <div class="post-item-wrap">
                                
                                <div class="post-item-description" style="margin-bottom: 25px;">
                                    <h2>Isi Berita</h2>
                                    <div class="post-meta">
                                         <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Selasa, 03 November 2020</span>
                                    </div>
                                </div>

                                <div class="post-image">
                                    <a href="#">
                                        <img alt="" src="{{ asset('asset_web/homepages/berita/Rectangle18.png') }}">
                                    </a>
                                </div>

                                <div class="post-item-description" style="margin-top: 25px;">
                                    <p>
                                        The most happiest time of the day!. Praesent id dolor dui, dapibus gravida elit. 
                                        Donec consequat laoreet sagittis. Suspendisse ultricies ultrices viverra. 
                                        Morbi rhoncus laoreet tincidunt. Mauris interdum convallis metus. 
                                        Suspendisse vel lacus est, sit amet tincidunt erat. 
                                        Etiam purus sem, euismod eu vulputate eget, porta quis sapien. 
                                        Donec tellus est, rhoncus vel scelerisque id, iaculis eu nibh.
                                    </p>
                                    <p>
                                        Donec posuere bibendum metus. Quisque gravida luctus volutpat. Mauris interdum, 
                                        lectus in dapibus molestie, quam felis sollicitudin mauris, 
                                        sit amet tempus velit lectus nec lorem. Nullam vel mollis neque. 
                                        The most happiest time of the day!. Nullam vel enim dui. 
                                        Cum sociis natoque penatibus et magnis dis parturient montes, 
                                        nascetur ridiculus mus. Sed tincidunt accumsan massa id viverra. 
                                        Sed sagittis, nisl sit amet imperdiet convallis, nunc tortor consequat tellus,
                                        vel molestie neque nulla non ligula. Proin tincidunt tellus ac porta volutpat. 
                                        Cras mattis congue lacus id bibendum. Mauris ut sodales libero. 
                                        Maecenas feugiat sit amet enim in accumsan.
                                    </p>
                                    <p>
                                        Duis vestibulum quis quam vel accumsan. Nunc a vulputate lectus. 
                                        Vestibulum eleifend nisl sed massa sagittis vestibulum. 
                                        Vestibulum pretium blandit tellus, sodales volutpat sapien varius vel. 
                                        Phasellus tristique cursus erat, a placerat tellus laoreet eget. 
                                        Fusce vitae dui sit amet lacus rutrum convallis. Vivamus sit amet lectus venenatis
                                        est rhoncus interdum a vitae velit.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h2>Berita Terbaru</h2>
                        <ul style="margin-top: 30px;">
                            <li>
                                <a href="#">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </a>                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Berita -->

        <!-- Contact -->
        <section class="p-t-100 background-grey p-b-200" style="background-position:71% 22%;">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6">
                         <div class="row">
                             <div class="col-lg-12">
                                 <h2 class="m-b-10">Hubungi Kami</h2>
                             </div>
                             <div class="col-lg-6 m-b-30">
                                 <address>
                                     <strong>Alamat:</strong><br>
                                     Jl. Sumur Bandung No. 12, Bandung<br>
                                 </address>
                                 <strong>Telp:</strong> (022) 253205
                                 <br>
                                 <strong>Fax:</strong> (022) 2532053
                                 <br>
                                 <strong>Email:</strong> trengginasjaya@yahoo.co.id
                             </div>
                             <div class="col-lg-12 m-b-30">
                                 <h4>Sosial Media</h4>
                                 <div class="social-icons social-icons-light social-icons-colored-hover">
                                     <ul>
                                         <li class="social-facebook"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                         </li>
                                         <li class="social-twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                         <li class="social-instagram"><a href="#"><i class="fab fa-instagram"></i></a>
                                         <li class="social-youtube"><a href="#"><i class="fab fa-youtube"></i></a></li>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-5 offset-1">
                         <form class="widget-contact-form" novalidate action="include/contact-form.php" role="form" method="post">
                             <div class="row">
                                 <div class="form-group col-md-6">
                                     <label for="name">Nama</label>
                                     <input type="text" aria-required="true" required name="widget-contact-form-name" class="form-control required name" >
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="email">Email</label>
                                     <input type="email" aria-required="true" required name="widget-contact-form-email" class="form-control required email" >
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="message">Pesan</label>
                                 <textarea type="text" required name="widget-contact-form-message" rows="8" class="form-control required" ></textarea>
                             </div>
                             <div class="form-group">
                                 <button class="btn bg-red" type="submit" id="form-submit">Kirim Pesan</button>
                             </div>
                         </form>

                     </div>
                 </div>
             </div>
         </section>
         <!-- end: Contact -->

        <!-- end: Content -->
        <!-- Footer -->
        <footer id="footer">
            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; 2020 PT Trengginas Jaya. All Rights Reserved.</div>
                </div>
            </div>
        </footer>
        <!-- end: Footer -->
    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('asset_web/js/jquery.js') }}"></script>
    <script src="{{ asset('asset_web/js/plugins.js') }}"></script>
    <!--Template functions-->
    <script src="{{ asset('asset_web/js/functions.js') }}"></script>
    <script type="text/javascript">
        function checkHeader(){
            if($('#header').hasClass('sticky-active')) {
                $('.watch-class').removeClass('white');
                $('.watch-class').addClass('black');                
            } else {
                $('.watch-class').removeClass('black');
                $('.watch-class').addClass('white');
            }
        }
        setInterval(checkHeader, 500);
    </script>
</body>

</html>