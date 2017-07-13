@extends('layouts.master')

@section('content')
<section class="section-intro">
        <div id="carousel-intro" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-intro" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-intro" data-slide-to="1"></li>
                <li data-target="#carousel-intro" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <a href="#" class="item active">
                    <img class="hidden-xs" src="assets/images/banner-slider.png" alt="...">
                    <img class="visible-xs" src="assets/images/tes-mobile-slider.jpg" alt="...">
                </a> <!-- /.slider item -->

                <a href="#" class="item">
                    <img class="hidden-xs" src="assets/images/banner-slider.png" alt="...">
                    <img class="visible-xs" src="assets/images/tes-mobile-slider.jpg" alt="...">
                </a> <!-- /.slider item -->

                <a href="#" class="item">
                    <img class="hidden-xs" src="assets/images/banner-slider.png" alt="...">
                    <img class="visible-xs" src="assets/images/tes-mobile-slider.jpg" alt="...">
                </a> <!-- /.slider item -->
            </div>
        </div>
    </section> <!-- /.intro -->


    <section class="section-recomended position-relative">
        <div class="container">
            <div class="section-recomended-content">
                <div class="navtab">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li role="presentation" class="active"><a href="#recomended" role="tab" data-toggle="tab">Recomended</a></li>

                        <li role="presentation"><a href="#hot-deals" role="tab" data-toggle="tab">Hot Deals</a></li>

                        <li role="presentation"><a href="#under" role="tab" data-toggle="tab">Under Rp 20.000</a></li>

                        <li role="presentation"><a href="#best" role="tab" data-toggle="tab">Best Seller</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="recomended">
                            <div class="section-product-list">
                                <div class="row-del recomended-slide">
                                    <div class="col-xs-3-del">
                                        <a href="#" class="product-item">
                                            <div class="featured text-center">
                                                <div class="inner">
                                                    <span class="block">Pilihan</span>
                                                    <span class="block">Editor</span>
                                                </div>
                                            </div> <!-- /.featured label -->

                                            <div class="images">
                                                <img src="assets/images/bagian-produk-recomended/recomended-produk-1.png" alt="Alt" />
                                            </div> <!-- /.images -->

                                            <div class="meta">
                                                <div class="countdown">
                                                    <div class="hours">
                                                        00
                                                    </div> <!-- /.hours -->

                                                    <div class="minute">
                                                        00
                                                    </div> <!-- /.minutes -->

                                                    <div class="second">
                                                        00
                                                    </div> <!-- /.second -->
                                                </div> <!-- /.countdown -->

                                                <div class="category">
                                                    Cream Pot
                                                </div> <!-- /.category -->

                                                <h2 class="name">
                                                    Cream Pot Musron Jar 30GR
                                                </h2> <!-- /.name -->

                                                <div class="rating">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star-outline"></i>
                                                    <i class="ion-android-star-outline"></i>
                                                    <i class="ion-android-star-outline"></i>

                                                    <span class="count">33</span>
                                                </div> <!-- /.rating -->

                                                <div class="price">
                                                    <div class="discount">
                                                        10%
                                                    </div> <!-- /.discount -->

                                                    <div class="nominal">
                                                        <div class="nominal-discount">
                                                            Rp 4.500.00
                                                        </div>

                                                        <div class="nominal-normal">
                                                            Rp 4.050
                                                        </div>
                                                    </div> <!-- /.nominal -->
                                                </div> <!-- /.price -->
                                            </div> <!-- /.meta -->
                                        </a> <!-- /.product item -->
                                    </div> <!-- /.col-xs-3 -->

                                    <div class="col-xs-3-del">
                                        <a href="#" class="product-item">
                                            <div class="images">
                                                <img src="assets/images/bagian-produk-recomended/recomended-produk-2.png" alt="Alt" />
                                            </div> <!-- /.images -->

                                            <div class="meta">
                                                <div class="countdown">
                                                </div> <!-- /.countdown -->

                                                <div class="category">
                                                    Sponge Blender
                                                </div> <!-- /.category -->

                                                <h2 class="name">
                                                    Sponge Blender Foundation Model Guci
                                                </h2> <!-- /.name -->

                                                <div class="rating">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star-outline"></i>
                                                    <i class="ion-android-star-outline"></i>
                                                    <i class="ion-android-star-outline"></i>

                                                    <span class="count">33</span>
                                                </div> <!-- /.rating -->

                                                <div class="price">
                                                    <div class="nominal">
                                                        <div class="nominal-normal">
                                                            Rp 14.990
                                                        </div>
                                                    </div> <!-- /.nominal -->
                                                </div> <!-- /.price -->
                                            </div> <!-- /.meta -->
                                        </a> <!-- /.product item -->
                                    </div> <!-- /.col-xs-3 -->

                                    <div class="col-xs-3-del">
                                        <a href="#" class="product-item">
                                            <div class="images">
                                                <img src="assets/images/bagian-produk-recomended/recomended-produk-3.png" alt="Alt" />
                                            </div> <!-- /.images -->

                                            <div class="meta">
                                                <div class="category">
                                                    Lanbis
                                                </div> <!-- /.category -->

                                                <h2 class="name">
                                                    Ultimate Flash Hugging
                                                </h2> <!-- /.name -->

                                                <div class="rating">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>

                                                    <span class="count">10</span>
                                                </div> <!-- /.rating -->

                                                <div class="price">
                                                    <div class="nominal">
                                                        <div class="nominal-normal">
                                                            Rp 25.900
                                                        </div>
                                                    </div> <!-- /.nominal -->
                                                </div> <!-- /.price -->
                                            </div> <!-- /.meta -->
                                        </a> <!-- /.product item -->
                                    </div> <!-- /.col-xs-3 -->

                                    <div class="col-xs-3-del">
                                        <a href="#" class="product-item">
                                            <div class="images">
                                                <img src="assets/images/bagian-produk-recomended/recomended-produk-4.png" alt="Alt" />

                                                <div class="outstock">OPPS! Kehabisan Stock</div> <!-- /.out stock -->
                                            </div> <!-- /.images -->

                                            <div class="meta">
                                                <div class="category">
                                                    Brush Egg
                                                </div> <!-- /.category -->

                                                <h2 class="name">
                                                    Brush Cleanser / Pembersih Kuas Make Up
                                                </h2> <!-- /.name -->

                                                <div class="rating">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star-outline"></i>
                                                    <i class="ion-android-star-outline"></i>
                                                    <i class="ion-android-star-outline"></i>

                                                    <span class="count">33</span>
                                                </div> <!-- /.rating -->

                                                <div class="price">
                                                    <div class="discount">
                                                        60%
                                                    </div> <!-- /.discount -->

                                                    <div class="nominal">
                                                        <div class="nominal-discount">
                                                            Rp 14.900.00
                                                        </div>

                                                        <div class="nominal-normal">
                                                            Rp 5.960
                                                        </div>
                                                    </div> <!-- /.nominal -->
                                                </div> <!-- /.price -->
                                            </div> <!-- /.meta -->
                                        </a> <!-- /.product item -->
                                    </div> <!-- /.col-xs-3 -->

                                    <div class="col-xs-3-del">
                                        <a href="#" class="product-item">
                                            <div class="images">
                                                <img src="assets/images/bagian-produk-recomended/recomended-produk-5.png" alt="Alt" />
                                            </div> <!-- /.images -->

                                            <div class="meta">
                                                <div class="category">
                                                    Safe Core
                                                </div> <!-- /.category -->

                                                <h2 class="name">
                                                    Aromathreapy Original 10ML
                                                </h2> <!-- /.name -->

                                                <div class="rating">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star-outline"></i>
                                                    <i class="ion-android-star-outline"></i>
                                                    <i class="ion-android-star-outline"></i>

                                                    <span class="count">33</span>
                                                </div> <!-- /.rating -->

                                                <div class="price">
                                                    <div class="discount">
                                                        70%
                                                    </div> <!-- /.discount -->

                                                    <div class="nominal">
                                                        <div class="nominal-discount">
                                                            Rp 16.750.00
                                                        </div>

                                                        <div class="nominal-normal">
                                                            Rp 5.025
                                                        </div>
                                                    </div> <!-- /.nominal -->
                                                </div> <!-- /.price -->
                                            </div> <!-- /.meta -->
                                        </a> <!-- /.product item -->
                                    </div> <!-- /.col-xs-3 -->
                                </div> <!-- /.row -->
                            </div> <!-- /.section product list -->
                        </div> <!-- /.recomended -->


                        <div role="tabpanel" class="tab-pane" id="hot-deals">...</div>
                        <div role="tabpanel" class="tab-pane" id="under">...</div>
                        <div role="tabpanel" class="tab-pane" id="best">...</div>
                    </div>
                </div> <!-- /.navtab -->

                <div class="section-feedback">
                    <a href="#" class="block text-uppercase">Apa Pendapatmu?</a>
                </div> <!-- /.feedback -->
            </div> <!-- /.content -->
        </div> <!-- /.container -->
    </section> <!-- /.section highlight -->


    <section class="section-grid">
        <div class="row row-small">
            <div class="col-xs-12 col-sm-4 no-padding-left">
                <div class="section-grid-big">
                    <div id="carousel-grid-1" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-grid-1" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-grid-1" data-slide-to="1"></li>
                            <li data-target="#carousel-grid-1" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="section-grid-item item active">
                                <div class="ratio ratio-full">
                                    <a href="#" class="ratio-inner">
                                        <img class="ratio-image" src="assets/images/produk-banner-tengah-1.png" alt="Alt" />
                                    </a> <!-- /.ratio inner -->
                                </div> <!-- /.ratio -->
                            </div> <!-- /.grid item -->

                            <div class="section-grid-item item">
                                <div class="ratio ratio-full">
                                    <a href="#" class="ratio-inner">
                                        <img class="ratio-image" src="assets/images/produk-banner-tengah-1.png" alt="Alt" />
                                    </a> <!-- /.ratio inner -->
                                </div> <!-- /.ratio -->
                            </div> <!-- /.grid item -->

                            <div class="section-grid-item item">
                                <div class="ratio ratio-full">
                                    <a href="#" class="ratio-inner">
                                        <img class="ratio-image" src="assets/images/produk-banner-tengah-1.png" alt="Alt" />
                                    </a> <!-- /.ratio inner -->
                                </div> <!-- /.ratio -->
                            </div> <!-- /.grid item -->
                        </div> <!-- /.carousel list -->
                    </div> <!-- /.carousel wrap -->
                </div> <!-- /.grid big -->
            </div> <!-- /.col-sm-4 -->

            <div class="col-xs-12 col-sm-4">
                <div class="section-grid-item">
                    <div class="ratio ratio-full">
                        <div class="ratio-inner">
                            <div class="section-grid-small section-grid-small-top">
                                <div id="carousel-grid-2" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-grid-2" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-grid-2" data-slide-to="1"></li>
                                        <li data-target="#carousel-grid-2" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="section-grid-item item active">
                                            <div class="ratio ratio-full">
                                                <a href="#" class="ratio-inner">
                                                    <img class="ratio-image" src="assets/images/produk-banner-tengah-2.png" alt="Alt" />
                                                </a> <!-- /.ratio inner -->
                                            </div> <!-- /.ratio -->
                                        </div> <!-- /.grid item -->

                                        <div class="section-grid-item item">
                                            <div class="ratio ratio-full">
                                                <a href="#" class="ratio-inner">
                                                    <img class="ratio-image" src="assets/images/produk-banner-tengah-2.png" alt="Alt" />
                                                </a> <!-- /.ratio inner -->
                                            </div> <!-- /.ratio -->
                                        </div> <!-- /.grid item -->

                                        <div class="section-grid-item item">
                                            <div class="ratio ratio-full">
                                                <a href="#" class="ratio-inner">
                                                    <img class="ratio-image" src="assets/images/produk-banner-tengah-2.png" alt="Alt" />
                                                </a> <!-- /.ratio inner -->
                                            </div> <!-- /.ratio -->
                                        </div> <!-- /.grid item -->
                                    </div> <!-- /.carousel list -->
                                </div> <!-- /.carousel wrap -->
                            </div> <!-- /.grid small -->

                            <div class="section-grid-small">
                                <div id="carousel-grid-3" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-grid-3" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-grid-3" data-slide-to="1"></li>
                                        <li data-target="#carousel-grid-3" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="section-grid-item item active">
                                            <div class="ratio ratio-full">
                                                <a href="#" class="ratio-inner">
                                                    <img class="ratio-image" src="assets/images/produk-banner-tengah-2.png" alt="Alt" />
                                                </a> <!-- /.ratio inner -->
                                            </div> <!-- /.ratio -->
                                        </div> <!-- /.grid item -->

                                        <div class="section-grid-item item">
                                            <div class="ratio ratio-full">
                                                <a href="#" class="ratio-inner">
                                                    <img class="ratio-image" src="assets/images/produk-banner-tengah-2.png" alt="Alt" />
                                                </a> <!-- /.ratio inner -->
                                            </div> <!-- /.ratio -->
                                        </div> <!-- /.grid item -->

                                        <div class="section-grid-item item">
                                            <div class="ratio ratio-full">
                                                <a href="#" class="ratio-inner">
                                                    <img class="ratio-image" src="assets/images/produk-banner-tengah-2.png" alt="Alt" />
                                                </a> <!-- /.ratio inner -->
                                            </div> <!-- /.ratio -->
                                        </div> <!-- /.grid item -->
                                    </div> <!-- /.carousel list -->
                                </div> <!-- /.carousel wrap -->
                            </div> <!-- /.grid small -->
                        </div> <!-- /.ratio inner -->
                    </div> <!-- /.ratio -->
                </div> <!-- /.grid item -->
            </div> <!-- /.col-sm-4 -->

            <div class="col-xs-12 col-sm-4 no-padding-right">
                <div class="section-grid-big with-margin">
                    <div id="carousel-grid-4" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-grid-4" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-grid-4" data-slide-to="1"></li>
                            <li data-target="#carousel-grid-4" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="section-grid-item item active">
                                <div class="ratio ratio-full">
                                    <a href="#" class="ratio-inner">
                                        <img class="ratio-image" src="assets/images/produk-banner-tengah-1.png" alt="Alt" />
                                    </a> <!-- /.ratio inner -->
                                </div> <!-- /.ratio -->
                            </div> <!-- /.grid item -->

                            <div class="section-grid-item item">
                                <div class="ratio ratio-full">
                                    <a href="#" class="ratio-inner">
                                        <img class="ratio-image" src="assets/images/produk-banner-tengah-1.png" alt="Alt" />
                                    </a> <!-- /.ratio inner -->
                                </div> <!-- /.ratio -->
                            </div> <!-- /.grid item -->

                            <div class="section-grid-item item">
                                <div class="ratio ratio-full">
                                    <a href="#" class="ratio-inner">
                                        <img class="ratio-image" src="assets/images/produk-banner-tengah-1.png" alt="Alt" />
                                    </a> <!-- /.ratio inner -->
                                </div> <!-- /.ratio -->
                            </div> <!-- /.grid item -->
                        </div> <!-- /.carousel list -->
                    </div> <!-- /.carousel wrap -->
                </div> <!-- /.grid big -->
            </div> <!-- /.col-sm-4 -->
        </div> <!-- /.row -->
    </section> <!-- /.section grid -->


    <section class="section-new">
        <div class="container">
            <h2 class="section-label text-center text-uppercase">
                <div class="row row-small">
                    <div class="col-xs-4 col-sm-5">
                        <div class="section-label-border left">
                        </div> <!-- /.border -->
                    </div> <!-- /.col-xs-5 -->

                    <div class="col-xs-4 col-sm-2">
                        <div class="section-label-text">Produk baru</div>
                    </div> <!-- /.col-xs-2 -->

                    <div class="col-xs-4 col-sm-5">
                        <div class="section-label-border right">
                        </div> <!-- /.border -->
                    </div> <!-- /.col-xs-5 -->
                </div> <!-- /.row -->
            </h2> <!-- /.section new label -->

            <div class="section-product-list">
                <div class="row-del recomended-slide">
                    <div class="col-xs-3-del">
                        <a href="#" class="product-item">
                            <div class="featured text-center">
                                <div class="inner">
                                    <span class="block">Pilihan</span>
                                    <span class="block">Editor</span>
                                </div>
                            </div> <!-- /.featured label -->

                            <div class="images">
                                <img src="assets/images/bagian-produk-baru/produk-baru-1.png" alt="Alt" />
                            </div> <!-- /.images -->

                            <div class="meta">
                                <div class="category">
                                    Sumber Ayu
                                </div> <!-- /.category -->

                                <h2 class="name">
                                    Pembersih kewanitaan daun sirih 90ml
                                </h2> <!-- /.name -->

                                <div class="rating">
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                </div> <!-- /.rating -->

                                <div class="price">
                                    <div class="nominal">
                                        <div class="nominal-normal">
                                            Rp 8,250.00
                                        </div>
                                    </div> <!-- /.nominal -->
                                </div> <!-- /.price -->
                            </div> <!-- /.meta -->
                        </a> <!-- /.product item -->
                    </div> <!-- /.col-xs-3 -->

                    <div class="col-xs-3-del">
                        <a href="#" class="product-item">
                            <div class="images">
                                <img src="assets/images/bagian-produk-baru/produk-baru-2.png" alt="Alt" />
                            </div> <!-- /.images -->

                            <div class="meta">
                                <div class="countdown">
                                </div> <!-- /.countdown -->

                                <div class="category">
                                    ACL
                                </div> <!-- /.category -->

                                <h2 class="name">
                                    ACL hair mask 200gr
                                </h2> <!-- /.name -->

                                <div class="rating">
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                </div> <!-- /.rating -->

                                <div class="price">
                                    <div class="nominal">
                                        <div class="nominal-normal">
                                            Rp 23.990
                                        </div>
                                    </div> <!-- /.nominal -->
                                </div> <!-- /.price -->
                            </div> <!-- /.meta -->
                        </a> <!-- /.product item -->
                    </div> <!-- /.col-xs-3 -->

                    <div class="col-xs-3-del">
                        <a href="#" class="product-item">
                            <div class="images">
                                <img src="assets/images/bagian-produk-baru/produk-baru-3.png" alt="Alt" />
                            </div> <!-- /.images -->

                            <div class="meta">
                                <div class="category">
                                    BioAqua
                                </div> <!-- /.category -->

                                <h2 class="name">
                                    Blueberry mask facial sheet masker wajah
                                </h2> <!-- /.name -->

                                <div class="rating">
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                </div> <!-- /.rating -->

                                <div class="price">
                                    <div class="nominal">
                                        <div class="nominal-normal">
                                            Rp 3,900.00
                                        </div>
                                    </div> <!-- /.nominal -->
                                </div> <!-- /.price -->
                            </div> <!-- /.meta -->
                        </a> <!-- /.product item -->
                    </div> <!-- /.col-xs-3 -->

                    <div class="col-xs-3-del">
                        <a href="#" class="product-item">
                            <div class="images">
                                <img src="assets/images/bagian-produk-baru/produk-baru-4.png" alt="Alt" />
                            </div> <!-- /.images -->

                            <div class="meta">
                                <div class="countdown">
                                    <div class="hours">
                                        00
                                    </div> <!-- /.hours -->

                                    <div class="minute">
                                        00
                                    </div> <!-- /.minutes -->

                                    <div class="second">
                                        00
                                    </div> <!-- /.second -->
                                </div> <!-- /.countdown -->

                                <div class="category">
                                    BioAqua
                                </div> <!-- /.category -->

                                <h2 class="name">
                                    Masker carchoal anti komedo actived carbon mask
                                </h2> <!-- /.name -->

                                <div class="rating">
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                    <i class="ion-android-star-outline"></i>
                                </div> <!-- /.rating -->

                                <div class="price">
                                    <div class="nominal">
                                        <div class="nominal-normal">
                                            Rp 17,500.00
                                        </div>
                                    </div> <!-- /.nominal -->
                                </div> <!-- /.price -->
                            </div> <!-- /.meta -->
                        </a> <!-- /.product item -->
                    </div> <!-- /.col-xs-3 -->

                    <div class="col-xs-3-del">
                        <a href="#" class="product-item">
                            <div class="images">
                                <img src="assets/images/bagian-produk-baru/produk-baru-5.png" alt="Alt" />
                            </div> <!-- /.images -->

                            <div class="meta">
                                <div class="countdown">
                                    <div class="hours">
                                        00
                                    </div> <!-- /.hours -->

                                    <div class="minute">
                                        00
                                    </div> <!-- /.minutes -->

                                    <div class="second">
                                        00
                                    </div> <!-- /.second -->
                                </div> <!-- /.countdown -->

                                <div class="category">
                                    Cream Pot
                                </div> <!-- /.category -->

                                <h2 class="name">
                                    Cream pot mushroom jar 30gr
                                </h2> <!-- /.name -->

                                <div class="rating">
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>
                                    <i class="ion-android-star"></i>

                                    <span class="count">26</span>
                                </div> <!-- /.rating -->

                                <div class="price">
                                    <div class="discount">
                                        10%
                                    </div> <!-- /.discount -->

                                    <div class="nominal">
                                        <div class="nominal-discount">
                                            Rp 4,500.00
                                        </div>

                                        <div class="nominal-normal">
                                            Rp 4.050
                                        </div>
                                    </div> <!-- /.nominal -->
                                </div> <!-- /.price -->
                            </div> <!-- /.meta -->
                        </a> <!-- /.product item -->
                    </div> <!-- /.col-xs-3 -->
                </div> <!-- /.row -->
            </div> <!-- /.section product list -->

            <a href="#" class="btn btn-orange btn-block text-center">Lihat Lebih Banyak</a>
        </div> <!-- /.container -->
    </section> <!-- /.section new -->


    <section class="section-blog-latest">
        <div class="container">
            <h2 class="section-label text-center text-uppercase">
                <div class="row row-small">
                    <div class="col-xs-4 col-sm-5">
                        <div class="section-label-border left">
                        </div> <!-- /.border -->
                    </div> <!-- /.col-xs-5 -->

                    <div class="col-xs-4 col-sm-2">
                        <div class="section-label-text">Beauty blog</div>
                    </div> <!-- /.col-xs-2 -->

                    <div class="col-xs-4 col-sm-5">
                        <div class="section-label-border right">
                        </div> <!-- /.border -->
                    </div> <!-- /.col-xs-5 -->
                </div> <!-- /.row -->
            </h2> <!-- /.section new label -->

            <div class="section-blog-content">
                <div class="row row-small">
                    <div class="col-xs-12 col-sm-6">
                        <a href="#" class="section-blog-item block">
                            <div class="row row-small">
                                <div class="col-xs-12 col-sm-12 col-md-7">
                                    <div class="section-blog-image">
                                        <div class="ratio ratio-normal">
                                            <div class="ratio-inner">
                                                <img class="ratio-image" src="assets/images/bagian-blog/blog-banner-1.png" alt="Alt" />
                                            </div> <!-- /.ratio inner -->
                                        </div> <!-- /.ratio normal -->
                                    </div> <!-- /.image -->
                                </div> <!-- /.col-md-8 -->

                                <div class="col-xs-12 col-sm-12 col-md-5">
                                    <div class="section-blog-text">
                                        <h2 class="section-blog-title text-uppercase">Lorem Ipsum</h2>

                                        <p>Usage: Click the "Upload Fonts" button, check the agreement and download your fonts. If you need more fine-grain control, choose the Expert option. Usage: Click the "Upload Fonts" button, check the agreement and download your fonts. <span class="readmore">Selanjutnya <i class="icon ion-ios-arrow-right"></i></p>
                                    </div> <!-- /.text -->
                                </div> <!-- /.col-md-4 -->
                            </div> <!-- /.row -->
                        </a> <!-- /.blog item -->
                    </div> <!-- /.col-sm-6 -->

                    <div class="col-xs-12 col-sm-6">
                        <a href="#" class="section-blog-item block">
                            <div class="row row-small">
                                <div class="col-xs-12 col-sm-12 col-md-7">
                                    <div class="section-blog-image">
                                        <div class="ratio ratio-normal">
                                            <div class="ratio-inner">
                                                <img class="ratio-image" src="assets/images/bagian-blog/blog-banner-2.png" alt="Alt" />
                                            </div> <!-- /.ratio inner -->
                                        </div> <!-- /.ratio normal -->
                                    </div> <!-- /.image -->
                                </div> <!-- /.col-md-8 -->

                                <div class="col-xs-12 col-sm-12 col-md-5">
                                    <div class="section-blog-text">
                                        <h2 class="section-blog-title text-uppercase">Lorem Ipsum</h2>

                                        <p>Usage: Click the "Upload Fonts" button, check the agreement and download your fonts. If you need more fine-grain control, choose the Expert option. Usage: Click the "Upload Fonts" button, check the agreement and download your fonts. <span class="readmore">Selanjutnya <i class="icon ion-ios-arrow-right"></i></p>
                                    </div> <!-- /.text -->
                                </div> <!-- /.col-md-4 -->
                            </div> <!-- /.row -->
                        </a> <!-- /.blog item -->
                    </div> <!-- /.col-sm-6 -->
                </div> <!-- /.row -->

                <a href="#" class="btn btn-orange btn-block text-center btn-more">Lihat Lebih Banyak</a>
            </div> <!-- /.blog content -->
        </div> <!-- /.container -->
    </section> <!-- /.latest blog -->
@endsection
