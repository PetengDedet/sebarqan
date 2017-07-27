@extends('layouts.master')

@section('css')
    <!-- Select -->
{{--    <link href="{{asset('assets/plugins/select/css/bootstrap-select.min.css')}}" rel="stylesheet">--}}
@endsection

@section('meta')
    <meta name="description" content="{{$product->meta_description}}">
    <meta name="keywords" content="{{$product->meta_keywords}}">
    <meta name="author" content="{{config('app.name')}}">
    <meta name="product:price:amount" content="{{$product->variant->first()->sale_price}}" />
    <meta name="product:price:currency" content="IDR" />
@endsection

@section('open_graph')
    <meta property="fb:app_id" content="{{config('admin.app.facebook.id')}}" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:title" content="{{$product->brand . ' ' . $product->name}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="product" />
    <meta property="og:description" content="{{$product->meta_description}}" />
    <meta property="og:image" content="{{$product->primePhoto}}" />
    <meta property="og:site_name" content="{{config('app.name')}}" />
@endsection

@section('twitter_card')
    <meta name="twitter:card" content="product" />
    <meta name="twitter:title" content="{{$product->brand . ' ' . $product->name}}" />
    <meta name="twitter:description" content="{{$product->meta_description}}" />
    <meta name="twitter:url" content="{{url()->current()}}" />
    <meta name="twitter:image" content="{{$product->primePhoto}}" />
    <meta name="twitter:label1" content="Harga" />
    <meta name="twitter:data1" content="Rp{{$product->variant->first()->sale_price}}" />
    <meta name="twitter:label2" content="Diskon" />
    <meta name="twitter:data2" content="{{number_format($product->variant->first()->discount, 0, '.', '.')}}%" />
@endsection

@section('content')
<section class="section-breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">{{title_case($product->name)}}</li>
        </ol>
    </div> <!-- /.container -->
</section> <!-- /.breadcrumb -->

    <main class="section-main">
    <section class="section-detail">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="section-detail-left">
                        <div class="section-detail-slider position-relative">
                            @if($product->featured == 1)
                                <div class="featured text-center">
                                    <div class="inner">
                                        <span class="block">Pilihan</span>
                                        <span class="block">Editor</span>
                                    </div>
                                </div> <!-- /.featured label -->
                            @endif
                            <div class="section-detail-slider-action">
{{--                                {{dd($product->photo)}}--}}
                                @forelse($product->photo as $k => $v)
                                    <div class="section-detail-slider-item">
                                        <img class="img-responsive" src="{{asset('storage/product_photo/' . $v->path)}}" alt="{{$product->slug . '_' . ($k+1)}}" />
                                    </div> <!-- /.item -->

                                    @empty

                                    <div class="section-detail-slider-item">
                                        <img class="img-responsive" src="{{$product->primePhoto}}" alt="{{$product->slug}}" />
                                    </div> <!-- /.item -->
                                @endforelse
                            </div> <!-- /.slider action -->
                        </div> <!-- /.slider -->

                        <div class="section-detail-description">
                            <div class="navtab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs text-uppercase" role="tablist">
                                    <li role="presentation" class="active"><a href="#description" role="tab" data-toggle="tab">Deskripsi</a></li>

                                    <li role="presentation"><a href="#review" role="tab" data-toggle="tab">Review</a></li>

                                    <li role="presentation"><a href="#order" role="tab" data-toggle="tab">Kapan Pesananmu Sampai?</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        <div class="section-description-content">
                                            {{--<h4 class="section-description-title text-uppercase">--}}
                                                {{--Lorem Ipsum--}}
                                            {{--</h4>--}}
                                            {!!$product->description!!}

                                        </div> <!-- /.content -->
                                    </div> <!-- /.tab description -->

                                    <div role="tabpanel" class="tab-pane" id="review">
                                    </div> <!-- /.tab review -->

                                    <div role="tabpanel" class="tab-pane" id="order">
                                    </div> <!-- /.tab order -->
                                </div> <!-- /.tab content -->
                            </div> <!-- /.navtab -->
                        </div> <!-- /.description -->
                    </div> <!-- /.detail left -->
                </div> <!-- /.col-sm-8 -->

                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="section-detail-meta">
                        <div class="section-detail-timer">
                            <div class="section-detail-timer-title">
                                Waktu Tersisa
                            </div>

                            <div class="row row-small">
                                <div class="col-xs-3">
                                    <div class="section-detail-timer-content text-center">
                                        <div class="section-detail-timer-nom">
                                            <div>0</div>
                                            <div>0</div>
                                        </div> <!-- /.nom -->

                                        <div class="section-detail-timer-label text-uppercase">
                                            Hari
                                        </div> <!-- /.label -->
                                    </div> <!-- /.content -->
                                </div> <!-- /.col-xs-3 -->

                                <div class="col-xs-3">
                                    <div class="section-detail-timer-content text-center">
                                        <div class="section-detail-timer-nom">
                                            <div>1</div>
                                            <div>2</div>
                                        </div> <!-- /.nom -->

                                        <div class="section-detail-timer-label text-uppercase">
                                            Jam
                                        </div> <!-- /.label -->
                                    </div> <!-- /.content -->
                                </div> <!-- /.col-xs-3 -->

                                <div class="col-xs-3">
                                    <div class="section-detail-timer-content text-center">
                                        <div class="section-detail-timer-nom">
                                            <div>3</div>
                                            <div>4</div>
                                        </div> <!-- /.nom -->

                                        <div class="section-detail-timer-label text-uppercase">
                                            Menit
                                        </div> <!-- /.label -->
                                    </div> <!-- /.content -->
                                </div> <!-- /.col-xs-3 -->

                                <div class="col-xs-3">
                                    <div class="section-detail-timer-content text-center">
                                        <div class="section-detail-timer-nom">
                                            <div>5</div>
                                            <div>6</div>
                                        </div> <!-- /.nom -->

                                        <div class="section-detail-timer-label text-uppercase">
                                            Detik
                                        </div> <!-- /.label -->
                                    </div> <!-- /.content -->
                                </div> <!-- /.col-xs-3 -->
                            </div> <!-- /.row -->

                            <div class="section-detail-timer-left">
                                Ayo buruan, sisa <b class="text-orange">{{$product->variant->sum('qty')}} item</b> lagi loh!
                            </div>
                        </div> <!-- /.timer -->

                        <div class="section-detail-meta-category text-orange">
                            {{title_case($product->brand)}}
                        </div> <!-- /.category -->

                        <h1 class="section-detail-meta-name text-uppercase">
                            {{title_case($product->name)}}
                        </h1> <!-- /.name -->

                        <div class="rating">
                            @for($i = 1; $i<=5;$i++)
                                @if($product->rate >= $i)
                                    <i class="ion-android-star"></i>
                                @else
                                    <i class="ion-android-star-outline"></i>
                                @endif
                            @endfor
                            <span class="count">{{$product->rating->count()}}</span>
                        </div> <!-- /.rating -->

                        <div class="price">
                            @if($product->variant->first()->sale_price > 0 AND \Carbon\Carbon::now()->between(\Carbon\Carbon::parse($product->variant->first()->sale_price_start), \Carbon\Carbon::parse($product->variant->first()->sale_price_end)))
                                <div class="discount">
                                    {{number_format($product->variant->first()->discount, 0, '.', '.')}}%
                                </div> <!-- /.discount -->
                            @endif

                            <div class="nominal">
                                {{--//DISCOUNT--}}
                                @if($product->variant->first()->sale_price > 0 AND \Carbon\Carbon::now()->between(\Carbon\Carbon::parse($product->variant->first()->sale_price_start), \Carbon\Carbon::parse($product->variant->first()->sale_price_end)))
                                    <div class="nominal-discount">
                                        Rp {{number_format($product->variant->first()->sale_price, 0, ',', '.')}}
                                    </div>
                                @endif

                                <div class="nominal-normal">
                                    Rp {{number_format($product->variant->first()->price, 0, ',', '.')}}
                                </div>
                            </div> <!-- /.nominal -->
                        </div> <!-- /.price -->

                        <div class="section-meta-pcs">
                            <ul>
                                <li>
                                    <span>6 pcs</span>
                                    <span>Rp 4.000/pc</span>
                                </li>

                                <li>
                                    <span>12 pcs</span>
                                    <span>Rp 3.900/pc</span>
                                </li>

                                <li class="section-meta-stock">
                                    <span>Stok</span>
                                    <span class="text-success"><b>Tersedia</b></span>
                                </li>
                            </ul>
                        </div> <!-- /.pcs -->

                        <div class="section-meta-variant">
                            @if(count($product->variant) > 1)
                                {{--<select class="selectpicker btn-block" title="Pilih Varian">--}}
                                <select class="form-control btn-block" title="Pilih Varian">
                                    @foreach($product->variant as $k => $v)
                                        <option
                                            value="{{$v->id}}"
                                            data-stock="{{$v->qty}}"
                                            data-price="{{$v->price}}"
                                            data-discount="{{number_format($v->discount, 0, '.', '.')}}"
                                        >
                                            {{title_case($v->variant_name)}}
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                                <input type="hidden" name="varaint_id" value="{{$product->variant->first()->id}}" id="variant_id">
                                <input type="hidden" name="stock" value="{{$product->variant->first()->qty}}" id="stock">
                        </div> <!-- /.variant -->

                        <div class="section-meta-addcart">
                            <div class="add-favorite">
                                <a href="#favorite">
                                    <i class="icon ion-ios-heart-outline"></i>
                                </a>

                                <div class="clearfix"></div>

                                <span>Share</span>
                            </div>

                            <div class="section-meta-addcart-content">
                                <div class="list-inline spinner position-relative">
                                    <li>
                                        <button type="button" class="btn btn-default no-border no-shadow btn-number" disabled="disabled" id="decrement" onclick="decrement()" data-type="minus" data-field="quant[1]">
                                            <i class="icon ion-minus-round"></i>
                                        </button>
                                    </li>

                                    <li>
                                        <input
                                            type="text"
                                            name="quantity"
                                            class="form-control text-center no-border no-shadow position-relative input-number"
                                            value="1"
                                            min="1"
                                            max="{{$product->variant->first()->qty}}"
                                            id="quantity"
                                            autocomplete="off"
                                        >
                                    </li>

                                    <li>
                                        <button type="button" class="btn btn-default no-border no-shadow btn-number" data-type="plus" id="increment" onclick="increment()" data-field="quant[1]">
                                            <i class="icon ion-plus-round"></i>
                                        </button>
                                    </li>
                                </div> <!-- /.amount -->

                                <a href="#" class="btn btn-block btn-orange text-uppercase" id="addToCart">
                                    Masukkan Ke Keranjang
                                </a>

                                <ul class="list-inline section-meta-social">
                                    <li><a href="#"><i class="socicon socicon-facebook"></i></a></li>
                                    <li><a href="#"><i class="socicon socicon-twitter"></i></a></li>
                                    <li><a href="#"><i class="socicon socicon-instagram"></i></a></li>
                                    <li><a href="#"><i class="socicon socicon-googleplus"></i></a></li>
                                    <li><a href="#"><i class="socicon socicon-pinterest"></i></a></li>
                                </ul> <!-- /.social -->
                            </div> <!-- /.content -->
                        </div> <!-- /.addcart -->
                    </div> <!-- /.meta -->

                    <div class="section-detail-similar">
                        <h3 class="section-detail-similar-label text-uppercase">
                            Produk Terkait
                        </h3>

                        <div class="section-product-list">
                            @forelse($product->related as $k => $v)
                                <a href="{{url($v->related_product->slug)}}" class="product-item">
                                    @if($v->related_product->is_featured == 1)
                                        <div class="featured text-center">
                                            <div class="inner">
                                                <span class="block">Pilihan</span>
                                                <span class="block">Editor</span>
                                            </div>
                                        </div> <!-- /.featured label -->
                                    @endif

                                    <div class="images">
                                        <img src="{{$v->related_product->primePhoto}}" alt="{{$v->related_product->meta_title}}" />
                                    </div> <!-- /.images -->

                                    <div class="meta">
                                        <div class="category">
                                            {{$v->related_product->brand}}
                                        </div> <!-- /.category -->

                                        <h2 class="name">
                                            {{$v->related_product->name}}
                                        </h2> <!-- /.name -->

                                        <div class="rating">
                                            @for($i = 1; $i<=5;$i++)
                                                @if($v->related_product->rate >= $i)
                                                    <i class="ion-android-star"></i>
                                                @else
                                                    <i class="ion-android-star-outline"></i>
                                                @endif
                                            @endfor

                                            <span class="count">{{$v->related_product->rating->count()}}</span>                                        </div> <!-- /.rating -->

                                        <div class="price">
                                            @if($v->related_product->variant->first()->sale_price > 0 AND \Carbon\Carbon::now()->between(\Carbon\Carbon::parse($v->related_product->variant->first()->sale_price_start), \Carbon\Carbon::parse($v->related_product->variant->first()->sale_price_end)))
                                                <div class="discount">
                                                    {{number_format($v->related_product->variant->first()->discount, 0, '.', '.')}}%
                                                </div> <!-- /.discount -->
                                            @endif

                                            <div class="nominal">
                                                {{--//DISCOUNT--}}
                                                @if($v->related_product->variant->first()->sale_price > 0 AND \Carbon\Carbon::now()->between(\Carbon\Carbon::parse($v->related_product->variant->first()->sale_price_start), \Carbon\Carbon::parse($v->related_product->variant->first()->sale_price_end)))
                                                    <div class="nominal-discount">
                                                        Rp {{number_format($v->related_product->variant->first()->sale_price, 0, ',', '.')}}
                                                    </div>
                                                @endif

                                                <div class="nominal-normal">
                                                    Rp {{number_format($v->related_product->variant->first()->price, 0, ',', '.')}}
                                                </div>
                                            </div> <!-- /.nominal -->
                                        </div> <!-- /.price -->
                                    </div> <!-- /.meta -->
                                </a> <!-- /.product item -->
                            @empty
                                -
                            @endforelse

                        </div> <!-- /.list similar -->
                    </div> <!-- /.similar -->
                </div> <!-- /.col-sm-4 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- /.detail -->
</main> <!-- /.main -->

@endsection


@section('js')
    <script type="application/javascript">
        function increment() {
            var max = parseInt($('#stock').val());
            var displayed = parseInt($('#quantity').val());

            $('#decrement').prop('disabled', false);

            if(displayed < max) {
                displayed++;
                $('#quantity').val(displayed);
            }else if(displayed == (max - 1)){
                displayed++;
                $('#quantity').val(displayed);
                $('#increment').prop('disabled', true);
            }else{
                $('#increment').prop('disabled', true);
            }

            if(displayed == 1) {
                $('#decrement').prop('disabled', true);
            }

            return false;
        }

        function decrement() {
            var displayed = parseInt($('#quantity').val());

            $('#increment').prop('disabled', false);

            if(displayed > 1) {
                displayed--;
                $('#quantity').val(displayed);
            }else if(displayed == 2){
                displayed--;
                $('#quantity').val(displayed);
                $('#decrement').prop('disabled', true);
            }

            if(displayed == 1) {
                $('#decrement').prop('disabled', true);
            }

            return false;
        }

        $(document).ready(function(){
            $('#addToCart').on('click', function(e){
                e.preventDefault();

                var variant_id = $('#variant_id').val();
                var qty = parseInt($('#quantity').val());

                $.ajax({
                    url: '{{url('increment-isi-keranjang')}}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: 'variant_id=' + variant_id + '&qty=' + qty,
                    beforeSend: function() {
                        $('#quantity').prop('disabled', true);
                        $('#addToCart').prop('disabled', true).html('<i class="fa fa-cog fa-spin"></i> Mengirim...')
                    },
                    success: function(response) {
                        if(response.status) {
                            $('#isiKeranjang').text(
                                //response.data.quantity
                                parseInt($('#isiKeranjang').text()) + qty
                            );
                        }else{
                            alert(response.message);
                        }

                        $('#quantity').prop('disabled', false);
                        $('#addToCart').prop('disabled', false).html('MASUKKAN KE KERANJANG');
                    },
                    error: function(response) {
                        $('#quantity').prop('disabled', false);
                        $('#addToCart').prop('disabled', false).html('MASUKKAN KE KERANJANG');
                    }
                })
                return false;
                alert('Variant_id : ' + variant_id + ' qty: ' + qty);
            });
        });
    </script>
@endsection