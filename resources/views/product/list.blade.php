@extends('layouts.master')

@section('css')
    <!-- Range -->
    <link href="{{asset('assets/plugins/range/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/range/css/ion.rangeSlider.skinNice.css')}}" rel="stylesheet">
@endsection

@section('content')
    <main class="section-main">
        <section class="section-filter">
            <div class="show-filter-btn text-center show-filter hidden-md hidden-lg" data-target="#collapse-filter">
                Tampilkan Filter
            </div>

            <div id="collapse-filter" class="container-fluid collapse">
                <div class="row row-small">
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="section-filter-title text-uppercase text-center">Filter</div>

                        <div class="row row-small">
                            <div class="col-xs-6 col-sm-6 col-md-3">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle btn-show-filter hidden"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Jenis kulit <span class="ion-ios-arrow-down icon"></span>
                                    </button>

                                    <div class="section-filter-block">
                                        <div class="section-filter-label text-uppercase text-center">Jenis kulit</div>

                                        <div class="section-filter-list">
                                            @php
                                                $jenisKulit = \App\Personalisasi::where('jenis', 'Jenis Kulit')->get();
                                            @endphp

                                            @foreach($jenisKulit as $k => $v)
                                                <div class="checkbox">
                                                    <label><input type="checkbox"
                                                                  value="{{$v->id}}">{{title_case($v->name)}}</label>
                                                </div> <!-- /.filter item -->
                                            @endforeach
                                        </div> <!-- /.list filter -->
                                    </div> <!-- /.filter block -->
                                </div> <!-- /.btn group -->
                            </div> <!-- /.col-sm-3 -->

                            <div class="col-xs-6 col-sm-6 col-md-3">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle btn-show-filter hidden"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Jenis Kulit <span class="ion-ios-arrow-down icon"></span>
                                    </button>

                                    <div class="section-filter-block">
                                        <div class="section-filter-label text-uppercase text-center">Jenis Rambut</div>
                                        <div class="section-filter-list">
                                            @php
                                                $jenisRambut = \App\Personalisasi::where('jenis', 'Jenis Rambut')->get();
                                            @endphp

                                            @foreach($jenisRambut as $k => $v)
                                                <div class="checkbox">
                                                    <label><input type="checkbox"
                                                                  value="{{$v->id}}">{{title_case($v->name)}}</label>
                                                </div> <!-- /.filter item -->
                                            @endforeach
                                        </div> <!-- /.list filter -->

                                    </div> <!-- /.filter block -->
                                </div> <!-- /.btn group -->
                            </div> <!-- /.col-sm-3 -->

                            <div class="col-xs-6 col-sm-6 col-md-3">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle btn-show-filter hidden"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Kebutuhan Kulit <span class="ion-ios-arrow-down icon"></span>
                                    </button>
                                    <div class="section-filter-block">
                                        <div class="section-filter-label text-uppercase text-center">Kebutuhan Kulit
                                        </div>
                                        <div class="section-filter-list">
                                            @php
                                                $kebutuhanKulit = \App\Personalisasi::where('jenis', 'Kebutuhan Kulit')->get();
                                            @endphp

                                            @foreach($kebutuhanKulit as $k => $v)
                                                <div class="checkbox">
                                                    <label><input type="checkbox"
                                                                  value="{{$v->id}}">{{title_case($v->name)}}</label>
                                                </div> <!-- /.filter item -->
                                            @endforeach
                                        </div> <!-- /.list filter -->

                                    </div> <!-- /.filter block -->

                                </div> <!-- /.btn group -->
                            </div> <!-- /.col-sm-3 -->

                            <div class="col-xs-6 col-sm-6 col-md-3">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle btn-show-filter hidden"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Kebutuhan Rambut <span class="ion-ios-arrow-down icon"></span>
                                    </button>
                                    <div class="section-filter-block">
                                        <div class="section-filter-label text-uppercase text-center">Kebutuhan Rambut
                                        </div>
                                        <div class="section-filter-list">
                                            @php
                                                $kebutuhanRambut = \App\Personalisasi::where('jenis', 'Kebutuhan Rambut')->get();
                                            @endphp

                                            @foreach($kebutuhanRambut as $k => $v)
                                                <div class="checkbox">
                                                    <label><input type="checkbox"
                                                                  value="{{$v->id}}">{{title_case($v->name)}}</label>
                                                </div> <!-- /.filter item -->
                                            @endforeach
                                        </div> <!-- /.list filter -->

                                    </div> <!-- /.filter block -->

                                </div> <!-- /.btn group -->
                            </div> <!-- /.col-sm-3 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.col-sm-8 -->

                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="row row-small">
                            <div class="col-xs-12 col-sm-6">
                                <div class="section-filter-block-range range">
                                    <div class="range-title text-uppercase text-center">Rentang Harga</div>

                                    <input id="filter_harga"/>
                                </div> <!-- //price -->
                            </div> <!-- /.col-sm-6 -->

                            <div class="col-xs-12 col-sm-6">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle btn-show-filter hidden"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Urutkan <span class="ion-ios-arrow-down icon"></span>
                                    </button>

                                    <div class="section-filter-title text-uppercase text-center">Urutkan</div>

                                    <div class="section-filter-block sort">
                                        <div class="section-filter-list">
                                            <div class="radio">
                                                <label><input type="radio" name="rad" checked> Berdasarkan
                                                    Popularitas</label>
                                            </div> <!-- /.filter item -->

                                            <div class="radio">
                                                <label><input type="radio" name="rad"> Harga Tertinggi</label>
                                            </div> <!-- /.filter item -->

                                            <div class="radio">
                                                <label><input type="radio" name="rad"> Harga Terendah</label>
                                            </div> <!-- /.filter item -->

                                            <div class="radio">
                                                <label><input type="radio" name="rad"> Penjualan Tertinggi</label>
                                            </div> <!-- /.filter item -->

                                            <div class="radio">
                                                <label><input type="radio" name="rad"> Paling Sesuai</label>
                                            </div> <!-- /.filter item -->
                                        </div> <!-- /.list filter -->
                                    </div> <!-- /.filter block -->
                                </div> <!-- /.btn group -->
                            </div> <!-- /.col-sm-6 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.col-sm-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section> <!-- /.filter -->


        <section class="section-product">
            <div class="container">
                <div class="section-product-list">
                    <h2 class="section-label text-center text-uppercase">
                        <div class="row row-small">
                            <div class="col-xs-4 col-sm-5">
                                <div class="section-label-border left">
                                </div> <!-- /.border -->
                            </div> <!-- /.col-xs-5 -->

                            <div class="col-xs-4 col-sm-2">
                                <div class="section-label-text">{{$title}}</div>
                            </div> <!-- /.col-xs-2 -->

                            <div class="col-xs-4 col-sm-5">
                                <div class="section-label-border right">
                                </div> <!-- /.border -->
                            </div> <!-- /.col-xs-5 -->
                        </div> <!-- /.row -->
                    </h2> <!-- /.section new label -->

                    <div class="row" id="newProductContainer">
                        @forelse($newProduct as $k => $v)
                            <div class="col-xs-6 col-sm-6 col-md-3">
                                <a href="{{$v->slug}}" class="product-item">
                                    <div class="images">
                                        <img src="{{$v->primePhoto}}" alt="{{$v->title}}"/>
                                    </div> <!-- /.images -->

                                    <div class="meta">
                                        <div class="category">
                                            {{title_case($v->brand)}}
                                        </div> <!-- /.category -->

                                        <h2 class="name">
                                            {{title_case($v->name)}}
                                        </h2> <!-- /.name -->

                                        <div class="rating">
                                            @for($i = 1; $i<=5;$i++)
                                                @if($v->rate >= $i)
                                                    <i class="ion-android-star"></i>
                                                @else
                                                    <i class="ion-android-star-outline"></i>
                                                @endif
                                            @endfor

                                            <span class="count">{{$v->rating->count()}}</span>
                                        </div> <!-- /.rating -->

                                        <div class="price">
                                            @if($v->variant->first()->sale_price > 0 AND \Carbon\Carbon::now()->between(\Carbon\Carbon::parse($v->variant->first()->sale_price_start), \Carbon\Carbon::parse($v->variant->first()->sale_price_end)))
                                                <div class="discount">
                                                    {{number_format($v->variant->first()->discount, 0, '.', '.')}}%
                                                </div> <!-- /.discount -->
                                            @endif

                                            <div class="nominal">
                                                {{--//DISCOUNT--}}
                                                @if($v->variant->first()->sale_price > 0 AND \Carbon\Carbon::now()->between(\Carbon\Carbon::parse($v->variant->first()->sale_price_start), \Carbon\Carbon::parse($v->variant->first()->sale_price_end)))
                                                    <div class="nominal-discount">
                                                        Rp {{number_format($v->variant->first()->sale_price, 0, ',', '.')}}
                                                    </div>
                                                @endif

                                                <div class="nominal-normal">
                                                    Rp {{number_format($v->variant->first()->price, 0, ',', '.')}}
                                                </div>
                                            </div> <!-- /.nominal -->
                                        </div> <!-- /.price -->

                                    </div> <!-- /.meta -->
                                </a> <!-- /.product item -->
                            </div> <!-- /.col-xs-3 -->
                        @empty
                            <em>Belum ada produk baru</em>
                        @endforelse

                    </div> <!-- /.row -->
                </div> <!-- /.section product list -->

                <button class="btn btn-orange btn-block btn-more-product" onclick="loadMore(12, 1)" type="button" data-toggle="collapse" data-target="#more-product" aria-expanded="false" id="loadMore">
                    <i class="ion-chevron-down"></i>
                </button>
            </div> <!-- /.container -->
        </section> <!-- /.product list -->
    </main> <!-- /.main -->


@endsection

@section('js')
    <!-- Range -->
    <script src="{{asset('assets/plugins/range/js/ion-rangeSlider/ion.rangeSlider.min.js')}}"></script>
    <script>
        function loadMore(take, skip) {

            $.ajax({
                url: '{{url('get-new-product')}}/' + take + '/' + skip,
                type: 'GET',
                beforeSend: function () {
                    $('#loadMore').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
                },
                success: function (response) {
                    if (response.status) {
                        if ($.isArray(response.data)) {
                            $.each(response.data, function (k, v) {

                                var strVar = "";
                                strVar += "        <div class=\"col-xs-6 col-sm-6 col-md-3\">";
                                strVar += "            <a href=\"{{url('/')}}/" + v.slug + "\" class=\"product-item\">";
                                if (v.featured == 1) {
                                    strVar += "                <div class=\"featured text-center\">";
                                    strVar += "                    <div class=\"inner\">";
                                    strVar += "                        <span class=\"block\">Pilihan<\/span>";
                                    strVar += "                        <span class=\"block\">Editor<\/span>";
                                    strVar += "                    <\/div>";
                                    strVar += "                <\/div>";
                                }

                                strVar += "                <div class=\"images\">";
                                strVar += "                    <img src=\"" + v.primePhoto + "\" alt=\"Alt\" \/>";
                                strVar += "                <\/div>";
                                strVar += "                <!-- \/.images -->";
                                strVar += "                <div class=\"meta\">";
                                strVar += "                    <div class=\"category\">";
                                strVar += v.brand;
                                strVar += "                    <\/div>";
                                strVar += "                    <!-- \/.category -->";
                                strVar += "                    <h2 class=\"name\">";
                                strVar += v.name;
                                strVar += "                    <\/h2>";
                                strVar += "                    <!-- \/.name -->";
                                strVar += "                    <div class=\"rating\">";
                                for(i = 1; i<=5;i++) {
                                    if (v.rate >= i) {
                                        strVar += "<i class=\"ion-android-star\"></i>";
                                    } else {
                                        strVar += "<i class=\"ion-android-star-outline\"></i>";
                                    }
                                }
                                strVar += "                        <span class=\"count\">"+ v.rateCount +"<\/span>";
                                strVar += "                    <\/div>";
                                if(v.discount > 0) {
                                    strVar += "                    <!-- \/.rating -->";
                                    strVar += "                    <div class=\"price\">";
                                    strVar += "                        <div class=\"discount\">";
                                    strVar += "                            "+ v.discount +"%";
                                    strVar += "                        <\/div>";
                                }
                                strVar += "                        <!-- \/.discount -->";
                                strVar += "                        <div class=\"nominal\">";
                                if(v.discount > 0) {
                                    strVar += "                            <div class=\"nominal-discount\">";
                                    strVar += "                                Rp " + v.variant[0].sale_price;
                                    strVar += "                            <\/div>";
                                }
                                strVar += "                            <div class=\"nominal-normal\">";
                                strVar += "                                Rp " + v.variant[0].price;
                                strVar += "                            <\/div>";
                                strVar += "                        <\/div>";
                                strVar += "                        <!-- \/.nominal -->";
                                strVar += "                    <\/div>";
                                strVar += "                    <!-- \/.price -->";
                                strVar += "                <\/div>";
                                strVar += "                <!-- \/.meta -->";
                                strVar += "            <\/a>";
                                strVar += "            <!-- \/.product item -->";
                                strVar += "        <\/div>";

                                $('#newProductContainer').append(strVar);

                                $('#loadMore').html('<i class="ion-chevron-down"></i>');
                            });


                        } else {
                            alert('Tidak ada data untuk ditampilkan');
                        }
                    } else {
                        alert('Tidak ada data untuk ditampilkan')
                    }
                },
                error: function (response) {

                }
            });
        }
    </script>
@endsection