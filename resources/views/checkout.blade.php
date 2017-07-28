@extends('layouts.master')

@section('css')
    <!-- Select -->
    {{--    <link href="{{asset('assets/plugins/select/css/bootstrap-select.min.css')}}" rel="stylesheet">--}}
@endsection


@section('content')
    <main class="section-main">
    <section class="section-contact-top">
        <div class="container">
            <div class="show-contact-button visible-xs text-center" data-toggle="collapse" data-target="#show-contact">
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


    <section class="section-checkout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="section-checkout-detail">
                        <div class="section-checkout-block">
                            <h4 class="section-checkout-label text-uppercase">
                                Detail Alamat
                            </h4> <!-- /.label -->

                            <div class="section-checkout-address">
                                <div class="section-checkout-address-item">
                                    <h5 class="section-checkout-address-label text-uppercase">
                                        Alamat Pengiriman
                                    </h5> <!-- /.label -->

                                    <div class="section-checkout-address-detail">
                                        <span class="block"><b>John Doe</b></span>
                                        <p>No. C, Jl. Kh. Hasyim Ashari No. 17, RT.17 / RW.3, Petojo Utara, Gambir, DKI Jakarta, Daerah Khusus Ibukota Jakarta 10130.</p>

                                        <p>Nomor Handphone: 08137986907</p>

                                        <a href="#" class="btn btn-orange text-uppercase" data-toggle="modal" data-target="#modal-address">Ubah</a>
                                    </div> <!-- /.detail -->
                                </div> <!-- /.address item -->

                                <div class="section-checkout-address-item">
                                    <h5 class="section-checkout-address-label text-uppercase">
                                        Alamat Penagihan
                                    </h5> <!-- /.label -->

                                    <div class="section-checkout-address-detail">
                                        <span class="block"><b>John Doe</b></span>
                                        <p>No. C, Jl. Kh. Hasyim Ashari No. 17, RT.17 / RW.3, Petojo Utara, Gambir, DKI Jakarta, Daerah Khusus Ibukota Jakarta 10130.</p>

                                        <p>Nomor Handphone: 08137986907</p>

                                        <a href="#" class="btn btn-orange text-uppercase" data-toggle="modal" data-target="#modal-address">Ubah</a>
                                    </div> <!-- /.detail -->
                                </div> <!-- /.address item -->

                                <!-- Modal address -->
                                <div class="modal fade" id="modal-address" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <form class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Ubah Alamat</h4>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama depan</label>
                                                            <input type="text" class="form-control form-control-custom" value="John" placeholder="Nama depan" />
                                                        </div> <!-- /.form-group -->
                                                    </div> <!-- /.col-sm-6 -->

                                                    <div class="col-xs-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nama belakang</label>
                                                            <input type="text" class="form-control form-control-custom" value="Doe" placeholder="Nama belakang" />
                                                        </div> <!-- /.form-group -->
                                                    </div> <!-- /.col-sm-6 -->
                                                </div> <!-- /.row -->

                                                <div class="form-group">
                                                    <label>Provinsi</label>
                                                    <select class="selectpicker" data-width="100%" data-style="btn-orange-ghost">
                                                        <option>Pilih Provinsi</option>
                                                        <option selected>Jakarta</option>
                                                        <option>Jambi</option>
                                                    </select>
                                                </div> <!-- /.form group -->

                                                <div class="form-group">
                                                    <label>Kota</label>
                                                    <select class="selectpicker" data-width="100%" data-style="btn-orange-ghost">
                                                        <option>Pilih Kota</option>
                                                        <option selected>Depok</option>
                                                        <option>Merangin</option>
                                                    </select>
                                                </div> <!-- /.form group -->

                                                <div class="form-group">
                                                    <label>Provinsi</label>
                                                    <select class="selectpicker" data-width="100%" data-style="btn-orange-ghost">
                                                        <option>Pilih Kecamatan</option>
                                                        <option selected>Kalibata</option>
                                                        <option>Telanai Pura</option>
                                                    </select>
                                                </div> <!-- /.form group -->

                                                <div class="form-group">
                                                    <label>Alamat lengkap</label>
                                                    <textarea class="form-control form-control-custom" rows="5" placeholder="Alamat lengkap">No. C, Jl. Kh. Hasyim Ashari No. 17, RT.17 / RW.3, Petojo Utara, Gambir, DKI Jakarta, Daerah Khusus Ibukota Jakarta 10130.</textarea>
                                                </div> <!-- /.form group -->

                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Kode POS</label>
                                                            <input type="text" class="form-control form-control-custom" value="36139" placeholder="Kode POS" />
                                                        </div> <!-- /.form-group -->
                                                    </div> <!-- /.col-sm-6 -->

                                                    <div class="col-xs-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nomor telepon</label>
                                                            <input type="text" class="form-control form-control-custom" value="08137986907" placeholder="Nomor telepon" />
                                                        </div> <!-- /.form-group -->
                                                    </div> <!-- /.col-sm-6 -->
                                                </div> <!-- /.row -->
                                            </div>

                                            <div class="modal-footer">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <button type="button" class="btn btn-default btn-block block" data-dismiss="modal">Batalkan</button>
                                                    </div> <!-- /.col-sm-6 -->

                                                    <div class="col-xs-12 col-sm-6">
                                                        <button type="submit" class="btn btn-orange btn-block block">Simpan Perubahan</button>
                                                    </div> <!-- /.col-sm-6 -->
                                                </div> <!-- /.row -->
                                            </div>
                                        </form> <!-- /.form -->
                                    </div>
                                </div> <!-- /.modal popup address -->
                            </div> <!-- /.address -->
                        </div> <!-- /.block -->

                        <div class="section-checkout-block">
                            <h4 class="section-checkout-label text-uppercase">
                                Pengiriman
                            </h4> <!-- /.label -->

                            <div class="text-muted section-checkout-sublabel">Pilih Jasa Pengiriman</div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-10">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group">
                                                <select class="selectpicker" data-width="100%" data-style="btn-lg btn-orange-ghost">
                                                    <option>JNE</option>
                                                    <option>TIKI</option>
                                                </select>
                                            </div> <!-- /.form group -->
                                        </div> <!-- /.col-sm-6 -->

                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group">
                                                <select class="selectpicker" data-width="100%" data-style="btn-lg btn-orange-ghost">
                                                    <option>REGULAR</option>
                                                    <option>YES</option>
                                                </select>
                                            </div> <!-- /.form group -->
                                        </div> <!-- /.col-sm-6 -->

                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group" style="margin-top:10px">
                                                <input type="text" class="form-control form-control-custom input-lg" value="Rp 7.000" readonly />
                                            </div> <!-- /.form group -->
                                        </div> <!-- /.col-sm-6 -->
                                    </div> <!-- /.row -->
                                </div> <!-- /.col-md-9 -->
                            </div> <!-- /.row -->
                        </div> <!-- /.block -->

                        <div class="section-checkout-block">
                            <h4 class="section-checkout-label text-uppercase">
                                Pembayaran
                            </h4> <!-- /.label -->

                            <div class="text-muted section-checkout-sublabel">Pilih Metode Pembayaran</div>

                            <div class="section-checkout-payment">
                                <div class="radio">
                                    <label><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"> <img src="assets/images/bank-dan-lain-lain/bank-bca.png" alt="BCA" /> Transfer BCA</label>
                                </div> <!-- /.payment item -->

                                <div class="radio">
                                    <label><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> <img src="assets/images/bank-dan-lain-lain/bank-mandiri.png" alt="BCA" /> Transfer Mandiri</label>
                                </div> <!-- /.payment item -->

                                <div class="radio">
                                    <label><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> <img src="assets/images/bank-dan-lain-lain/bank-bri.png" alt="BCA" /> Dan seterusnya... <span class="label label-danger">New</span></label>
                                </div> <!-- /.payment item -->
                            </div> <!-- /.payment -->
                        </div> <!-- /.block -->
                    </div> <!-- /.detail -->
                </div> <!-- /.col-sm-8 -->

                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="section-checkout-cart-wrap">
                        <div id="cart-wrap" class="section-checkout-cart">
                            <div class="section-checkout-cart-list">
                                <ul class="media-list no-margin-bottom">
                                    @forelse($cart as $k => $v)
                                        @php
                                            $variant[$k] = \App\ProductVariant::find($v->id);
                                        @endphp

                                        <a href="{{url($variant[$k]->product->url)}}" class="media block">
                                        <div class="media-left">
                                            <div class="section-checkout-cart-image ratio ratio-full">
                                                <img class="ratio-image" src="{{$variant[$k]->product->primePhoto}}" alt="{{$variant[$k]->product->name}}" />
                                            </div> <!-- /.image -->
                                        </div> <!-- /.media left -->

                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                {{title_case($variant[$k]->product->name)}}
                                            </h4>

                                            <div class="section-checkout-cart-category text-orange">
                                                {{title_case($variant[$k]->product->brand)}}
                                            </div>

                                            <ul class="section-checkout-cart-meta">
                                                <li>
                                                    <span>Varian</span>
                                                    <span>{{title_case($variant[$k]->variant_name)}}</span>
                                                </li>

                                                <li>
                                                    <span>Weight</span>
                                                    <span>{{title_case($variant[$k]->weight)}} g</span>
                                                </li>

                                                <li>
                                                    <span>JUMLAH</span>
                                                    <span>{{$v['quantity']}} @ Rp {{number_format($variant[$k]->price, 0, '.', '.')}}</span>
                                                </li>
                                            </ul>

                                            <div class="section-checkout-cart-subprice">
                                                Rp {{number_format(($variant[$k]->price * $v['quantity']), 0, '.', '.')}}
                                            </div> <!-- /.sub price -->
                                        </div> <!-- /.media body -->
                                    </a> <!-- /.cart item -->
                                    @endforeach
                                </ul>
                            </div> <!-- /.list -->

                            <div class="section-checkout-cart-block position-relative">
                                <div class="section-checkout-cart-total text-uppercase">
                                    Total Pembelian
                                </div>

                                <div class="section-checkout-cart-price">
                                    Rp {{number_format(Cart::getTotal(), 0, '.', '.')}}
                                </div>
                            </div> <!-- /.block -->

                            <div class="section-checkout-cart-block position-relative">
                                <div class="section-checkout-cart-total">
                                    <small>{{'discount_name'}} {{'discount_percent'}}%</small>
                                </div>

                                <div class="section-checkout-cart-price">
                                    Rp {{'discount_amount'}}
                                </div>
                            </div> <!-- /.block -->

                            <div class="section-checkout-cart-block position-relative">
                                <div class="section-checkout-cart-total text-uppercase">
                                    Biaya Pengiriman
                                </div>

                                <div class="section-checkout-cart-price">
                                    Rp {{'ship_fee'}}
                                </div>
                            </div> <!-- /.block -->

                            <div class="section-checkout-cart-block position-relative">
                                <div class="section-checkout-cart-total text-uppercase">
                                    Grand Total
                                </div>

                                <div class="section-checkout-cart-price">
                                    Rp {{'grand_total'}}
                                </div>
                            </div> <!-- /.block -->

                            <div class="form-group">
                                <label class="text-uppercase">Punya Kupon? Masukkan Disini</label>

                                <div class="row row-small">
                                    <div class="col-xs-8">
                                        <input type="text" class="text-center form-control form-control-custom" value="LIUU76" />
                                    </div>

                                    <div class="col-xs-4">
                                        <button type="submit" class="btn btn-orange btn-block btn-coupon">
                                            KLAIM
                                        </button>
                                    </div>
                                </div> <!-- /.row -->
                            </div> <!-- /.form group -->

                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Catatan"></textarea>
                            </div> <!-- /.form group -->

                            <div class="row">
                                <div class="hidden-xs col-sm-6"></div>

                                <div class="col-xs-12 col-sm-6">
                                    <div class="text-right">
                                        <button class="btn btn-success btn-lg text-uppercase btn-buy btn-block"><b>BELI</b></button>
                                    </div>
                                </div>
                            </div> <!-- /.row -->
                        </div> <!-- /.cart -->
                    </div> <!-- /.cart wrap -->
                </div> <!-- /.col-sm-4 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section> <!-- /.checkout -->
</main> <!-- /.main -->
@endsection