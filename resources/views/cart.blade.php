@extends('layouts.master')

@section('css')
    <!-- Select -->
    {{--    <link href="{{asset('assets/plugins/select/css/bootstrap-select.min.css')}}" rel="stylesheet">--}}
@endsection


@section('content')
    <main class="section-main">
        <section class="section-contact-top">
            <div class="container">
                <div class="show-contact-button visible-xs text-center" data-toggle="collapse"
                     data-target="#show-contact">
                    Bantuan?
                </div>

                <div id="show-contact" class="section-contact-top-inner collapse">
                    <div class="row row-sm-height">
                        <div class="col-xs-12 col-sm-3 col-sm-height col-sm-middle">
                            <div class="section-contact-top-item text-center">
                                <div class="section-contact-top-icon">
                                    <i class="icon fa fa-exclamation-circle"></i>
                                </div> <!-- /.icon -->

                                <div class="section-contact-top-text">
                                    <span class="block">Butuh Bantuan?</span>
                                    <span class="block">Hubungi Layanan Konsumer Kami</span>
                                    <span class="text-orange block">Senin - Jum'at (09.00 - 16.30)</span>
                                </div> <!-- /.text -->
                            </div> <!-- /.item -->
                        </div> <!-- /.col-sm-3 -->

                        <div class="col-xs-12 col-sm-3 col-sm-height col-sm-middle">
                            <div class="section-contact-top-item text-center">
                                <div class="section-contact-top-icon">
                                    <i class="icon fa fa-phone"></i>
                                </div> <!-- /.icon -->

                                <div class="section-contact-top-text">
                                    <span class="block">0811-222-5541</span>
                                </div> <!-- /.text -->
                            </div> <!-- /.item -->
                        </div> <!-- /.col-sm-3 -->

                        <div class="col-xs-12 col-sm-3 col-sm-height col-sm-middle">
                            <div class="section-contact-top-item text-center">
                                <div class="section-contact-top-icon">
                                    <i class="icon socicon-line"></i>
                                </div> <!-- /.icon -->

                                <div class="section-contact-top-text">
                                    <span class="block">@SilahQan.com</span>
                                </div> <!-- /.text -->
                            </div> <!-- /.item -->
                        </div> <!-- /.col-sm-3 -->

                        <div class="col-xs-12 col-sm-3 col-sm-height col-sm-middle">
                            <div class="section-contact-top-item text-center">
                                <div class="section-contact-top-icon">
                                    <i class="icon fa fa-envelope"></i>
                                </div> <!-- /.icon -->

                                <div class="section-contact-top-text">
                                    <span class="block">customerservice@silahqan.com</span>
                                </div> <!-- /.text -->
                            </div> <!-- /.item -->
                        </div> <!-- /.col-sm-3 -->
                    </div> <!-- /.row -->
                </div> <!-- /.inner -->
            </div> <!-- /.container -->
        </section> <!-- /.contact top -->


        <section class="section-cart">
            <div class="container">
                <div class="section-cart-inner">
                    <h3 class="section-cart-title text-uppercase">
                        Belanjaan Saya
                    </h3>

                    <div class="section-cart-heading">
                        <div class="row row-sm-height hidden-xs text-uppercase text-center">
                            <div class="col-xs-6 col-sm-5 col-sm-height">
                                <div class="text-orange">
                                    Produk
                                </div>
                            </div> <!-- /.col-sm-5 -->

                            <div class="col-xs-6 col-sm-2 col-sm-height col-sm-middle">
                                <div class="text-orange">
                                    Harga
                                </div>
                            </div> <!-- /.col-sm-2 -->

                            <div class="col-xs-5 col-sm-2 col-sm-height col-sm-middle">
                                <div class="text-orange">
                                    Jumlah
                                </div>
                            </div> <!-- /.col-sm-2 -->

                            <div class="col-xs-5 col-sm-2 col-sm-height col-sm-middle">
                                <div class="text-orange">
                                    Sub Total
                                </div>
                            </div> <!-- /.col-sm-2 -->

                            <div class="col-xs-2 col-sm-1 col-sm-height col-sm-middle">
                                <div class="text-orange">

                                </div>
                            </div> <!-- /.col-sm-2 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.cart heading -->

                    <div class="section-cart-list">
                        @forelse($cartCollection as $k => $v)
                            @php
                                $variant[$k] = \App\ProductVariant::find($v->id);
                            @endphp
                            <div class="row row-sm-height text-center">
                                <div class="col-xs-8 col-sm-5 col-sm-height section-cart-name">
                                    <a href="{{url($variant[$k]->product->url)}}" class="media block">
                                        <div class="media-left">
                                            <div class="section-cart-image ratio ratio-full">
                                                <img class="ratio-image" src="{{$variant[$k]->product->primePhoto}}" alt="{{$variant[$k]->product->name}}"/>
                                            </div> <!-- /.image -->
                                        </div> <!-- /.media left -->

                                        <div class="media-body media-middle">
                                            <h4 class="media-heading">
                                                {{title_case($variant[$k]->product->brand)}} - {{title_case($variant[$k]->product->name)}} {{title_case($variant[$k]->variant_name)}}
                                            </h4>
                                        </div> <!-- /.media body -->
                                    </a> <!-- /.media -->
                                </div> <!-- /.col-sm-5 -->

                                <div class="col-xs-4 col-sm-2 col-sm-height col-sm-middle">
                                    <div class="price text-center">
                                        Rp {{number_format($variant[$k]->price, 0, '.', '.')}}
                                    </div>
                                </div> <!-- /.col-sm-2 -->

                                <div class="clearfix visible-xs"></div>

                                <div class="col-xs-6 col-sm-2 col-sm-height col-sm-middle section-cart-amount">
                                    <div class="ammount text-center">
                                        <div class="list-inline spinner position-relative">
                                            <li>
                                                <button type="button"
                                                        class="btn btn-default no-border no-shadow btn-number"
                                                        disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="icon ion-minus-round"></i>
                                                </button>
                                            </li>

                                            <li><input type="text" name="quant[1]"
                                                       class="form-control text-center no-border no-shadow position-relative input-number"
                                                       value="{{$v->quantity}}" min="1" max="99999999999999999"></li>

                                            <li>
                                                <button type="button"
                                                        class="btn btn-default no-border no-shadow btn-number"
                                                        data-type="plus" data-field="quant[1]">
                                                    <i class="icon ion-plus-round"></i>
                                                </button>
                                            </li>
                                        </div> <!-- /.amount -->
                                    </div>
                                </div> <!-- /.col-sm-2 -->

                                <div class="col-xs-4 col-sm-2 col-sm-height col-sm-middle section-cart-subtotal">
                                    <div class="subtotal text-center">
                                        Rp {{number_format($variant[$k]->price * $v->quantity, 0, '.', '.')}}
                                    </div>
                                </div> <!-- /.col-sm-2 -->

                                <div class="col-xs-2 col-sm-1 col-sm-height col-sm-middle">
                                    <div class="trash text-center">
                                        <a href="#"><i class="icon fa fa-trash"></i></i>
                                    </div>
                                </div> <!-- /.col-sm-2 -->
                            </div> <!-- /.row -->
                        @empty
                            <div class="alert alert-link"><h4><em>Belum ada item di keranjang anda</em></h4></div>
                        @endforelse


                        <div class="section-cart-total">
                            <div class="row row-height">
                                <div class="col-xs-7 col-xs-height col-sm-9 col-sm-height col-xs-middle section-cart-total-text">
                                    <div class="text-right">
                                        <span class="block section-cart-total-title text-uppercase">Total</span>
                                        <span class="block text-muted">*Belum Termasuk Ongkos Kirim</span>
                                    </div> <!-- /.text -->
                                </div> <!-- /.col-xs-7 -->

                                <div class="col-xs-5 col-xs-height col-sm-3 col-sm-height col-xs-middle">
                                    <div class="section-cart-total-nom text-center">
                                        Rp {{number_format(Cart::getTotal(), 0, '.', '.')}}
                                    </div> <!-- /.nom -->
                                </div> <!-- /.col-xs-5 -->
                            </div> <!-- /.row -->
                        </div> <!-- /.total -->
                    </div> <!-- /.cart list -->

                    <div class="row">
                        <div class="hidden-xs col-sm-6">
                        </div>

                        <div class="col-xs-12 col-sm-3">
                            <div class="form-group">
                                <a href="#" class="btn btn-block btn-orange text-uppercase">Lanjutkan Belanja</a>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3">
                            <div class="form-group">
                                <a href="#" class="btn btn-block btn-success text-uppercase">Pembayaran</a>
                            </div>
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.inner -->
            </div> <!-- /.container -->
        </section> <!-- /.cart -->
    </main> <!-- /.main -->

@endsection