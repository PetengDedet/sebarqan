@extends('layouts.master')

@section('css')
    <!-- Select -->
    {{--    <link href="{{asset('assets/plugins/select/css/bootstrap-select.min.css')}}" rel="stylesheet">--}}
@endsection


@section('content')
    <div class="modal fade" id="modal-address" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ubah/Tambah Alamat</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label>Nama depan</label>
                                <input type="text"
                                       name="nama_depan"
                                       id="nama_depan"
                                       class="form-control form-control-custom"
                                       value="" placeholder="Nama depan" required/>
                            </div> <!-- /.form-group -->
                        </div> <!-- /.col-sm-6 -->

                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label>Nama belakang</label>
                                <input type="text"
                                       name="nama_belakang"
                                       id="nama_belakang"
                                       class="form-control form-control-custom"
                                       value="" placeholder="Nama belakang"/>
                            </div> <!-- /.form-group -->
                        </div> <!-- /.col-sm-6 -->
                    </div> <!-- /.row -->

                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" class="form-control" id="provinsi" required>
                            @foreach($provinsi as $k => $v)
                                <option value="{{$v->id_prov}}">{{title_case($v->nama)}}</option>
                            @endforeach
                        </select>
                    </div> <!-- /.form group -->

                    <div class="form-group">
                        <label>Kota</label>
                        <select name="kabupaten" class="form-control" id="kabupaten" required>
                            @foreach($provinsi->first()->kabupaten as $k => $v)
                                <option value="{{$v->id_kab}}">{{title_case($v->nama)}}</option>
                            @endforeach
                        </select>
                    </div> <!-- /.form group -->

                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select name="kecamatan" class="form-control" id="kecamatan" required>
                            @foreach($provinsi->first()->kabupaten->first()->kecamatan as $k => $v)
                                <option value="{{$v->id_kec}}">{{title_case($v->nama)}}</option>
                            @endforeach
                        </select>
                    </div> <!-- /.form group -->

                    <div class="form-group">
                        <label>Desa/Kelurahan</label>
                        <select name="kelurahan" class="form-control" id="kelurahan" required>
                            @foreach($provinsi->first()->kabupaten->first()->kecamatan->first()->kelurahan as $k => $v)
                                <option value="{{$v->id_kel}}">{{title_case($v->nama)}}</option>
                            @endforeach
                        </select>
                    </div> <!-- /.form group -->

                    <div class="form-group">
                        <label>Alamat lengkap</label>
                        <textarea name="alamat_lengkap" id="alamat_lengkap" class="form-control form-control-custom" rows="5" placeholder="Alamat lengkap" required></textarea>
                    </div> <!-- /.form group -->

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label>Kode POS</label>
                                <input type="text" name="kode_pos" id="kode_pos" class="form-control form-control-custom" value="" placeholder="Kode POS" required/>
                            </div> <!-- /.form-group -->
                        </div> <!-- /.col-sm-6 -->

                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label>Nomor telepon</label>
                                <input type="text"
                                       name="no_telp"
                                       id="no_telp"
                                       class="form-control form-control-custom"
                                       value=""
                                       placeholder="Nomor telepon"
                                       required
                                />
                            </div> <!-- /.form-group -->
                        </div> <!-- /.col-sm-6 -->
                    </div> <!-- /.row -->
                </div>

                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <button type="button"
                                    class="btn btn-default btn-block block"
                                    data-dismiss="modal">Batalkan
                            </button>
                        </div> <!-- /.col-sm-6 -->

                        <div class="col-xs-12 col-sm-6">
                            <button type="submit"
                                    class="btn btn-orange btn-block block simpan-alamat" value="">Simpan
                                Perubahan
                            </button>
                        </div> <!-- /.col-sm-6 -->
                    </div> <!-- /.row -->
                </div>
            </form> <!-- /.form -->
        </div>
    </div> <!-- /.modal popup address -->

    <form action="" method="post">
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

                                            <div class="section-checkout-address-detail" id="peng">
                                                <div id="peng_al">
                                                @if(Auth::check() AND count(Auth::user()->address) > 0)
                                                    {{Auth::user()->address->first()->jalan}}<br>
                                                    {{Auth::user()->address->first()->alamat}}<br>
                                                    {{Auth::user()->address->first()->kota}}<br>
                                                    {{Auth::user()->address->first()->zip_code}}
                                                @endif
                                                </div>
                                                <br>
                                                <br>
                                                @if(Auth::check() AND count(Auth::user()->address) > 0)
                                                    <a href="#" class="btn btn-orange text-uppercase mod" data-toggle="modal"
                                                       data-target="#modal-address" data-tipe="ubah_pengiriman">Ubah</a>
                                                    @else
                                                    <a href="#" class="btn btn-orange text-uppercase mod" data-toggle="modal"
                                                       data-target="#modal-address" data-tipe="tambah_pengiriman">Tambah Alamat</a>
                                                @endif

                                                <div id="pengiriman_container">
                                                    <input type="hidden" name="pengiriman_nama_depan" id="pengiriman_nama_depan" value="{{$user->first_name}}">
                                                    <input type="hidden" name="pengiriman_nama_belakang" id="pengiriman_nama_belakang" value="{{$user->last_name}}">
                                                    <input type="hidden" name="pengiriman_kelurahan_id" id="pengiriman_kelurahan_id" value="{{$user->alamat['kelurahan']['id']}}">
                                                    <input type="hidden" name="pengiriman_alamat" id="pengiriman_alamat" value="{{$user->alamat['alamat']}}">
                                                    <input type="hidden" name="pengiriman_kode_pos" id="pengiriman_kode_pos" value="{{$user->alamat['kode_pos']}}">
                                                    <input type="hidden" name="pengiriman_no_telp" id="pengiriman_no_telp" value="{{$user->phone}}">

                                                </div>
                                            </div> <!-- /.detail -->
                                        </div> <!-- /.address item -->

                                        <div class="section-checkout-address-item">
                                            <h5 class="section-checkout-address-label text-uppercase">
                                                Alamat Penagihan
                                            </h5> <!-- /.label -->

                                            <div class="section-checkout-address-detail">
                                                <span class="block"><b>John Doe</b></span>
                                                <p>No. C, Jl. Kh. Hasyim Ashari No. 17, RT.17 / RW.3, Petojo Utara,
                                                    Gambir, DKI Jakarta, Daerah Khusus Ibukota Jakarta 10130.</p>

                                                <p>Nomor Handphone: 08137986907</p>

                                                <a href="#" class="btn btn-orange text-uppercase" data-toggle="modal"
                                                   data-target="#modal-address">Ubah</a>
                                            </div> <!-- /.detail -->
                                        </div> <!-- /.address item -->

                                        <!-- Modal address -->
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
                                                        <select name="courier" class="selectpicker form-control" data-width="100%"
                                                                data-style="btn-lg btn-orange-ghost">
                                                            <option value="JNE">JNE</option>
                                                            <option value="TIKI">TIKI</option>
                                                        </select>
                                                    </div> <!-- /.form group -->
                                                </div> <!-- /.col-sm-6 -->

                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="form-group">
                                                        <select name="courier_type" class="selectpicker form-control" data-width="100%"
                                                                data-style="btn-lg btn-orange-ghost">
                                                            <option>REGULAR</option>
                                                            <option>YES</option>
                                                        </select>
                                                    </div> <!-- /.form group -->
                                                </div> <!-- /.col-sm-6 -->

                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="form-group" style="margin-top:10px">
                                                        <input type="text" name="shipping_fee"
                                                               class="form-control form-control-custom input-lg"
                                                               value="Rp 7.000" readonly/>
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
                                        @foreach($adminSettings as $k => $v)
                                            @php
                                                $isi = json_decode($v->isi);
                                            @endphp
                                            <div class="radio">
                                                <label>
                                                    <input
                                                            type="radio"
                                                            name="payment_bank"
                                                            id="payment_bank_{{$k}}"
                                                            value="{{$isi->slug}}"
                                                            @if($k == 0) checked @endif
                                                    >
                                                    <img src="{{asset('storage/bank/' . $isi->logo)}}"
                                                         alt="{{$isi->slug}}"/>
                                                    {{title_case($isi->bank_name)}}
                                                </label>
                                            </div> <!-- /.payment item -->
                                        @endforeach
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
                                                            <img class="ratio-image"
                                                                 src="{{$variant[$k]->product->primePhoto}}"
                                                                 alt="{{$variant[$k]->product->name}}"/>
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
                                                                <span>{{$v['quantity']}}
                                                                    @ Rp {{number_format($variant[$k]->price, 0, '.', '.')}}</span>
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
                                                <input type="text" name="coupon_code" class="text-center form-control form-control-custom"
                                                       value="LIUU76"/>
                                            </div>

                                            <div class="col-xs-4">
                                                <button type="submit" class="btn btn-orange btn-block btn-coupon">
                                                    KLAIM
                                                </button>
                                            </div>
                                        </div> <!-- /.row -->
                                    </div> <!-- /.form group -->

                                    <div class="form-group">
                                        <textarea name="catatan" class="form-control" rows="5" placeholder="Catatan"></textarea>
                                    </div> <!-- /.form group -->

                                    <div class="row">
                                        <div class="hidden-xs col-sm-6"></div>

                                        <div class="col-xs-12 col-sm-6">
                                            <div class="text-right">
                                                <button class="btn btn-success btn-lg text-uppercase btn-buy btn-block">
                                                    <b>BELI</b></button>
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
    </form>
@endsection

@section('js')
    <script>
        $('#modal-address').on('show.bs.modal', function (e) {
            var $invoker = $(e.relatedTarget);
            $('.simpan-alamat').val($invoker.attr('data-tipe'));
        });

        $('.simpan-alamat').on('click', function(e){
            e.preventDefault();
            console.log($(this).val());
            if($(this).val() == 'tambah_pengiriman') {
                $('#pengiriman_container input').val('');
                $('#pengiriman_nama_depan').val($('#nama_depan').val());
                $('#pengiriman_nama_belakang').val($('#nama_belakang').val());
                $('#pengiriman_kelurahan_id').val($('#kelurahan').val());
                $('#pengiriman_alamat').val($('#alamat_lengkap').val());
                $('#pengiriman_kode_pos').val($('#kode_pos').val());
                $('#pengiriman_no_telp').val($('#no_telp').val());

                $('#peng_al').html('').html($('#nama_depan').val() + $('#nama_belakang').val() + '<br>' + $('#alamat_lengkap').val() + '<br>' + $('#kelurahan option:selected').text() + ' - ' + $('#kecamatan option:selected').text() + ' - ' + $('#kabupaten option:selected').text() + '<br>' + $('#provinsi option:selected').text() + ' ' + $('#kode_pos').val() + '<br>' + $('#no_telp').val());


            }else if($(this).val() == 'tambah-penagihan') {

            }

            $('#modal-address').modal('hide');
        });


        $('#provinsi').on('change', function(){
            $.ajax({
                url: '{{url('getProvince')}}/' + $('#provinsi option:selected').val(),
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $('#kabupaten, #kecamatan, #kelurahan').prop('disabled', true);
                },
                success: function(response) {
                    if(response.status) {
                        $('#kabupaten').html('');

                        $.each(response.data.kabupaten, function(k,v){
                            $('#kabupaten').append('<option value="' + v.id_kab + '">' + v.nama + '</option>');
                        });

                        $('#kabupaten').prop('disabled', false);
                    }else{

                    }
                },
                error: function() {

                }
            });
        });

        $('#kabupaten').on('change', function(){
            $.ajax({
                url: '{{url('getKab')}}/' + $('#kabupaten option:selected').val(),
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $('#kecamatan, #kelurahan').prop('disabled', true);
                },
                success: function(response) {
                    if(response.status) {
                        $('#kecamatan').html('');

                        $.each(response.data.kecamatan, function(k,v){
                            $('#kecamatan').append('<option value="' + v.id_kec + '">' + v.nama + '</option>');
                        });

                        $('#kecamatan').prop('disabled', false);
                    }else{

                    }
                },
                error: function() {

                }
            });
        });

        $('#kecamatan').on('change', function(){
            $.ajax({
                url: '{{url('getKec')}}/' + $('#kecamatan option:selected').val(),
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function() {
                    $('#kelurahan').prop('disabled', true);
                },
                success: function(response) {
                    if(response.status) {
                        $('#kelurahan').html('');

                        $.each(response.data.kelurahan, function(k,v){
                            $('#kelurahan').append('<option value="' + v.id_kel + '">' + v.nama + '</option>');
                        });

                        $('#kelurahan').prop('disabled', false);
                    }else{

                    }
                },
                error: function() {

                }
            });
        });
    </script>
@endsection