<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Meta SEO -->
    <title>@yield('title', config('app.name'))</title>
    @yield('meta')

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/images/favicon/favicon-32x32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('assets/images/favicon/favicon-16x16.png')}}" sizes="16x16">
    <link rel="manifest" href="{{asset('assets/images/favicon/manifest.json')}}">
    <link rel="mask-icon" href="{{asset('assets/images/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!-- Open Graph -->
    @yield('open_graph')

    <!-- Twitter Card -->
    @yield('twitter_card')

    <!-- Bootstrap -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Ikon Sosial Media -->
    <link href="{{asset('assets/plugins/socicon/socicon.css')}}" rel="stylesheet">

    <!-- Ionicons -->
    <link href="{{asset('assets/plugins/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Webfonts -->
    <link href="{{asset('assets/css/webfont/font.css')}}" rel="stylesheet">

    <!-- Slider -->
    <link href="{{asset('assets/plugins/bxslider/jquery.bxslider.css')}}" rel="stylesheet">

    <!-- Scroller -->
    <link href="{{asset('assets/plugins/scroller/css/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">

    <!-- iCHeck -->
    <link href="{{asset('assets/plugins/icheck/skins/minimal/orange.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/animate.css')}}" rel="stylesheet">

    <!-- Style site -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    @yield('css')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body>
<header class="section-header">
    <nav class="navbar navbar-default navbar-static-top no-margin-bottom">
        <div class="navbar-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-5 col-md-4 no-padding-right">
                        <div class="navbar-menu">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hubungi <span class="hidden-xs">kami</span> <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">One more separated link</a></li>
                                    </ul>
                                </li>

                                <li><a href="#">Cara <span class="hidden-xs">belanja</span></a></li>
                            </ul>
                        </div> <!-- /.navbar menu -->
                    </div>

                    <div class="col-xs-7 col-md-4 col-md-push-4 no-padding-left">
                        <div class="navbar-menu text-right">
                            <ul class="nav navbar-nav navbar-right">
                                @if(! Auth::check())
                                    <li><a href="{{url('login')}}">Masuk</a></li>
                                    <li><a href="{{url('register')}}">Daftar</a></li>

                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o"></i> Account <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('profile')}}">Profile</a></li>
                                            @if(Auth::user()->level == 'admin')
                                                <li><a href="{{url('admin/dashboard')}}">Admin Area</a></li>
                                            @endif
                                            <li>
                                                <a href="#" id="logout">Logout</a>
                                                <form method="post" action="{{url('logout')}}">
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endif

                                <li class="">
                                    <a
                                        href="{{url('cart')}}"
                                        {{--class="dropdown-toggle navbar-cart"--}}
                                        {{--data-toggle="dropdown"--}}
                                        {{--role="button"--}}
                                        {{--aria-haspopup="true"--}}
                                        {{--aria-expanded="false"--}}
                                    >
                                        <i class="icon ion-android-cart"></i>
                                        <span class="hidden-xs"> Belanjaan saya </span>
                                        <span class="label label-default" id="isiKeranjang">
                                            {{ Cart::getTotalQuantity()}}
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div> <!-- /.navbar menu -->
                    </div>

                    <div class="col-xs-12 col-md-4 col-md-pull-4">
                        <div class="navbar-search">
                            <form action="">
                                <div class="form-group no-margin-bottom">
                                    <input type="search" class="form-control text-center" placeholder="Cari di SilahQan..." />
                                </div> <!-- /.form group -->
                            </form>
                        </div> <!-- /.search -->
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.navbar top -->

        <div class="navbar-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-md-push-4">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="{{url('/')}}">
                            <img class="img-responsive" src="{{asset('assets/images/top-logo.png')}}" alt="Logo" />
                        </a> <!-- /.logo -->
                    </div> <!-- /.col-md-4 -->

                    <div class="col-xs-12 col-sm-6 col-md-4 col-md-pull-4">
                        <div class="navbar-intro">
                            <div class="col-xs-3 col-sm-3">
                                <div class="text-center">
                                    <div class="navbar-intro-icon">
                                        <img class="img-responsive" src="{{asset('assets/images/bagian-atas/icon-menu-4.png')}}" alt="Alt" />
                                    </div> <!-- /.icon -->

                                    <div class="navbar-intro-text">
                                        Sahabat Produk Lokal
                                    </div> <!-- /.text -->
                                </div> <!-- /.navbar intro -->
                            </div> <!-- /.col-xs-3 -->

                            <div class="col-xs-3 col-sm-3">
                                <div class="text-center">
                                    <div class="navbar-intro-icon">
                                        <img class="img-responsive" src="{{asset('assets/images/bagian-atas/icon-menu-3.png')}}" alt="Alt" />
                                    </div> <!-- /.icon -->

                                    <div class="navbar-intro-text">
                                        Harga Grosir
                                    </div> <!-- /.text -->
                                </div> <!-- /.navbar intro -->
                            </div> <!-- /.col-xs-3 -->

                            <div class="col-xs-3 col-sm-3">
                                <div class="text-center">
                                    <div class="navbar-intro-icon">
                                        <img class="img-responsive" src="{{asset('assets/images/bagian-atas/icon-menu-2.png')}}" alt="Alt" />
                                    </div> <!-- /.icon -->

                                    <div class="navbar-intro-text">
                                        Transaksi Aman
                                    </div> <!-- /.text -->
                                </div> <!-- /.navbar intro -->
                            </div> <!-- /.col-xs-3 -->

                            <div class="col-xs-3 col-sm-3">
                                <div class="text-center">
                                    <div class="navbar-intro-icon">
                                        <img class="img-responsive" src="{{asset('assets/images/bagian-atas/icon-menu-1.png')}}" alt="Alt" />
                                    </div> <!-- /.icon -->

                                    <div class="navbar-intro-text">
                                        Pemberitahuan Mobile
                                    </div> <!-- /.text -->
                                </div> <!-- /.navbar intro -->
                            </div> <!-- /.col-xs-3 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.col-md-4 -->

                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <a href="#" class="navbar-promo text-right">
                            <img class="img-responsive" src="{{asset('assets/images/bagian-atas/gambar-top-bunga.png')}}" alt="Alt" />
                        </a> <!-- /.navbar promo -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.navbar header -->

        <div class="navbar-navigation collapse navbar-collapse text-uppercase" id="bs-example-navbar-collapse-1">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li class=""><a href="{{url('category/produk-baru')}}">Produk Baru</a></li>
                    @forelse(\App\Category::all() as $k => $v)
                        <li class=""><a href="{{url('category/' . $v->slug)}}">{{strtoupper($v->name)}}</a></li>
                        @empty

                    @endforelse
                </ul>
            </div> <!-- /.container -->
        </div> <!-- /.navbar navigation -->
    </nav> <!-- /.nav -->
</header> <!-- /.header -->


<main class="section-main">
    @yield('content')
    
</main> <!-- /.main -->


<footer class="section-footer-wrap">
    <section class="section-payment">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="section-payment-item">
                        <h2 class="section-payment-title text-uppercase">Metode pembayaran</h2>

                        <div class="row">
                            <div class="col-xs-4 col-sm-3">
                                <img class="img-responsive" src="{{asset('assets/images/bank-dan-lain-lain/bank-transfer.png')}}" Alt="Alt" />
                            </div> <!-- /.col-xs-4 -->

                            <div class="col-xs-4 col-sm-3">
                                <img class="img-responsive" src="{{asset('assets/images/bank-dan-lain-lain/bank-bca.png')}}" Alt="Alt" />
                            </div> <!-- /.col-xs-4 -->

                            <div class="col-xs-4 col-sm-3">
                                <img class="img-responsive" src="{{asset('assets/images/bank-dan-lain-lain/bank-mandiri.png')}}" Alt="Alt" />
                            </div> <!-- /.col-xs-4 -->

                            <div class="col-xs-4 col-sm-3">
                                <img class="img-responsive" src="{{asset('assets/images/bank-dan-lain-lain/bank-bri.png')}}" Alt="Alt" />
                            </div> <!-- /.col-xs-4 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.payment item -->
                </div> <!-- /.col-sm-4 -->

                <div class="col-xs-12 col-sm-4">
                    <div class="section-payment-item">
                        <h2 class="section-payment-title text-uppercase">Jasa pengiriman</h2>

                        <div class="row">
                            <div class="col-xs-4 col-sm-3">
                                <img class="img-responsive" src="{{asset('assets/images/bank-dan-lain-lain/rpx-logistic.png')}}" Alt="Alt" />
                            </div> <!-- /.col-xs-4 -->

                            <div class="col-xs-4 col-sm-3">
                                <img class="img-responsive" src="{{asset('assets/images/bank-dan-lain-lain/jne-logistic.png')}}" Alt="Alt" />
                            </div> <!-- /.col-xs-4 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.payment item -->
                </div> <!-- /.col-sm-4 -->

                <div class="col-xs-12 col-sm-4">
                    <div class="section-payment-item">
                        <h2 class="section-payment-title text-uppercase">Verifikasi oleh</h2>

                        <div class="row">
                            <div class="col-xs-4 col-sm-3">
                                <img class="img-responsive" src="{{asset('assets/images/bank-dan-lain-lain/idea-member.png')}}" Alt="Alt" />
                            </div> <!-- /.col-xs-4 -->

                            <div class="col-xs-4 col-sm-3">
                                <img class="img-responsive" src="{{asset('assets/images/bank-dan-lain-lain/ssl-secure.png')}}" Alt="Alt" />
                            </div> <!-- /.col-xs-4 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.payment item -->
                </div> <!-- /.col-sm-4 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- /.payment -->


    <section class="section-footer">
        <div class="container">
            <div class="section-footer-about">
                <p><img class="img-responsive" src="{{asset('assets/images/logo-bawah.png')}}" alt="Alt" /> adalah E-Commerce kecantikan dan kesehatan terpercaya yang telah hadir di Indonesia untuk menyediakan produk-produk berkualitas dan original. Setelah bergerak selama 2 tahun dibidang online beauty, SilahQan.com akhirnya didirikan pada tahun 2016 demi berkomitmen melayani dan peduli akan kecantikan customernya, dan menjadi tempat solusi dari semua kebutuhan kecantikan dan kesehatan Anda.</p>

                <p>Kami menyediakan produk mulai dari ujung rambut sampai kaki Anda. Selain itu, tidak hanya wanita, tetapi kami juga menyediakan produk untuk menjaga kesehatan dan perawatan untuk pria.</p>
            </div> <!-- /.about -->

            <div class="section-footer-menu">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-3">
                        <div class="section-footer-menu-block">
                            <h2 class="section-footer-menu-title text-uppercase">Dukungan / Bantuan</h2>

                            <ul>
                                <li><a href="#">Cara pesan</a></li>
                                <li><a href="#">Pengiriman</a></li>
                                <li><a href="#">Proses Pengembalian</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div> <!-- /.menu block -->
                    </div> <!-- /.col-sm-3 -->

                    <div class="col-xs-12 col-sm-6 col-sm-3">
                        <div class="section-footer-menu-block">
                            <h2 class="section-footer-menu-title text-uppercase">Mitra Kami</h2>

                            <ul>
                                <li><a href="#">Partner / Suplier</a></li>
                            </ul>
                        </div> <!-- /.menu block -->
                    </div> <!-- /.col-sm-3 -->

                    <div class="col-xs-12 col-sm-6 col-sm-3">
                        <div class="section-footer-menu-block">
                            <h2 class="section-footer-menu-title text-uppercase">Informasi</h2>

                            <ul>
                                <li><a href="#">Tentang</a></li>
                                <li><a href="#">Syarat dan Ketentuan</a></li>
                                <li><a href="#">Kebijakan Privasi</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Karir</a></li>
                            </ul>
                        </div> <!-- /.menu block -->
                    </div> <!-- /.col-sm-3 -->

                    <div class="col-xs-12 col-sm-6 col-sm-3">
                        <div class="section-footer-menu-block">
                            <h2 class="section-footer-menu-title text-uppercase">Daftar Newsletter</h2>

                            <div class="section-footer-subscribe">
                                <form action="#" class="form-group no-margin-bottom position-relative">
                                    <input type="email" class="form-control" placeholder="Masukkan email Anda disini" />
                                    <i class="icon ion-android-mail"></i>
                                </form> <!-- /.form group -->

                                <div class="clearfix"></div>

                                <ul class="list-inline social-media">
                                    <li><a href="#" class="block"><i class="icon socicon-facebook"></i></a></li>
                                    <li><a href="#" class="block"><i class="icon socicon-twitter"></i></a></li>
                                    <li><a href="#" class="block"><i class="icon socicon-googleplus"></i></a></li>
                                    <li><a href="#" class="block"><i class="icon socicon-instagram"></i></a></li>
                                </ul> <!-- /.social-media -->
                            </div> <!-- /.subscribe -->
                        </div> <!-- /.menu block -->
                    </div> <!-- /.col-sm-3 -->
                </div> <!-- /.row -->
            </div> <!-- /.menu -->

            <div class="section-footer-copyright text-center">
                Copyright 2016 SilahQan.com. All Rights Reserved.
            </div> <!-- /.copyright -->
        </div> <!-- /.container -->
    </section> <!-- /.section footer -->

    <div class="arrow scrollToTop">
        <img class="img-responsive" src="{{asset('assets/images/arrow/button-back-top.png')}}" alt="Back Top" />
    </div> <!-- /.arrow -->
</footer> <!-- /.footer -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{--<script src="{{asset('assets/js/jquery/jquery.js')}}"></script>--}}
<script src="{{asset('assets/adminlte/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Slider -->
<script src="{{asset('assets/plugins/bxslider/jquery.bxslider.min.js')}}"></script>

<!-- Match Height -->
<script src="{{asset('assets/js/jquery.matchHeight-min.js')}}"></script>

<!-- Mouse Wheel -->
<script src="{{asset('assets/js/jquery/jquery.mousewheel.min.js')}}"></script>

<!-- Scroller -->
<script src="{{asset('assets/plugins/scroller/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- iCHeck -->
<script src="{{asset('assets/plugins/icheck/icheck.min.js')}}"></script>

<!-- Site functions -->
<script src="{{asset('assets/js/site.js')}}"></script>

@yield('js')
</body>
</html>