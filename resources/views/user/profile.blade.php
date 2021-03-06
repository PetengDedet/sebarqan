@extends('layouts.master')

@section('title', 'Profile | ' . config('app.name'))

@section('content')
    {{--{{dd($user->alamat)}}--}}
    <section class="section-profile">
        <div class="container">
            <div class="row row-sm-height no-margin">

                @include('user.sidebar')

                <div class="col-xs-12 col-sm-8 col-md-9 col-sm-height no-padding">
                    <div class="section-profile-inner">
                        <div class="section-profile-banner ratio ratio-full">
                            <img alt="Banner" class="ratio-image" src="assets/images/banner-slider.png"/>
                        </div>
                        <!-- /.banner -->
                        <div class="section-profile-content">
                            <div class="section-profile-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active" role="presentation">
                                        <a data-toggle="tab" href="#profile">
                                            Profil Saya
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a data-toggle="tab" href="#address">
                                            Pengaturan Alamat
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a data-toggle="tab" href="#account">
                                            Pengaturan Akun
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                        <div class="tab-pane @if(isEmptyOrNullString(session('address')) OR isEmptyOrNullString(session('akun'))) active @endif" id="profile" role="tabpanel">
                                            <form class="form-horizontal" method="post" action="{{url('profile')}}">

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-9">
                                                    @if ($errors->any())
                                                        <br>
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    @if(Session::has('msg'))
                                                        {!! Session::get('msg') !!}
                                                    @endif
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">
                                                            Nama Depan
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control form-control-custom"
                                                                   name="first_name" value="{{$user->first_name}}"
                                                                   required placeholder="Nama Depan" type="text">
                                                        </div>
                                                    </div>
                                                    <!-- /.form group -->
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">
                                                            Nama Belakang
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control form-control-custom"
                                                                   name="last_name" value="{{$user->last_name}}"
                                                                   required placeholder="Nama Belakang" type="text">
                                                            </input>
                                                        </div>
                                                    </div>
                                                    <!-- /.form group -->
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">
                                                            Tanggal Lahir
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <div class="row row-small">
                                                                <div class="col-xs-4">
                                                                    <select class="selectpicker" name="tgl" required
                                                                            data-style="btn-orange-ghost"
                                                                            data-width="100%">
                                                                        <option>Tanggal</option>
                                                                        @for($i = 1; $i<= 31; $i++)
                                                                            <option value="{{$i}}"
                                                                                    @if($i == substr($user->dateofbirth, 8)) selected @endif>{{$i}}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                                <!-- /.col-xs-4 -->
                                                                <div class="col-xs-4">
                                                                    <select class="selectpicker" name="bln" required
                                                                            data-style="btn-orange-ghost"
                                                                            data-width="100%">
                                                                        <option>
                                                                            Bulan
                                                                        </option>
                                                                        @for($i = 1; $i<= 12; $i++)
                                                                            <option value="{{$i}}"
                                                                                    @if($i == substr($user->dateofbirth, 5)) selected @endif>{{$i}}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                                <!-- /.col-xs-4 -->
                                                                <div class="col-xs-4">
                                                                    <select class="selectpicker" name="thn" required
                                                                            data-style="btn-orange-ghost"
                                                                            data-width="100%">
                                                                        <option>
                                                                            Tahun
                                                                        </option>
                                                                        @for($i = date('Y'); $i >= date('Y') - 70; $i--)
                                                                            <option value="{{$i}}"
                                                                                    @if($i == substr($user->dateofbirth, 0)) selected @endif>{{$i}}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                                <!-- /.col-xs-4 -->
                                                            </div>
                                                            <!-- /.row -->
                                                        </div>
                                                    </div>
                                                    <!-- /.form group -->
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">
                                                            Nomor Telepon
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control form-control-custom"
                                                                   placeholder="Nomor Telepon" type="text"
                                                                   value="{{$user->phone}}" name="phone">
                                                        </div>
                                                    </div>
                                                    <!-- /.form group -->
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label">
                                                            Jenis Kelamin
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <div class="radio">
                                                                <label>
                                                                    <input @if($user->gender == 'male') checked
                                                                           @endif required id="gender_male"
                                                                           name="gender" type="radio" value="male">Pria
                                                                </label>
                                                            </div>
                                                            <!-- /.gender item -->
                                                            <div class="radio">
                                                                <label>
                                                                    <input @if($user->gender == 'female') checked
                                                                           @endif required id="gender_female"
                                                                           name="gender" type="radio" value="female">wanita
                                                                </label>
                                                            </div>
                                                            <!-- /.gender item -->
                                                        </div>
                                                    </div>
                                                    <!-- /.form group -->

                                                </div>
                                                <!-- /.col-md-8 -->
                                            </div>
                                            <!-- /.row -->
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <label class="block text-uppercase text-center">
                                                            Jenis Kulit
                                                        </label>
                                                        <select name="jenis_kulit" class="selectpicker"
                                                                data-style="btn-orange-ghost" data-width="100%">
                                                            <option>-</option>
                                                            @foreach($personalisasi->where('jenis', 'Jenis Kulit') as $k => $v)
                                                                <option value="{{$v->id}}"
                                                                        @if($user->jenis_kulit == $v->id) selected @endif>{{title_case($v->name)}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!-- /.form group -->
                                                </div>
                                                <!-- /.col-sm-3 -->
                                                <div class="col-xs-12 col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <label class="block text-uppercase text-center">
                                                            Jenis Rambut
                                                        </label>
                                                        <select name="jenis_rambut" class="selectpicker"
                                                                data-style="btn-orange-ghost" data-width="100%">
                                                            <option>-</option>
                                                            @foreach($personalisasi->where('jenis', 'Jenis Rambut') as $k => $v)
                                                                <option value="{{$v->id}}"
                                                                        @if($user->jenis_rambut == $v->id) selected @endif>{{title_case($v->name)}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!-- /.form group -->
                                                </div>
                                                <!-- /.col-sm-3 -->
                                                <div class="col-xs-12 col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <label class="block text-uppercase text-center">
                                                            Kebutuhan Kulit
                                                        </label>
                                                        <select name="kebutuhan_kulit" class="selectpicker"
                                                                data-style="btn-orange-ghost" data-width="100%">
                                                            <option>-</option>
                                                            @foreach($personalisasi->where('jenis', 'Kebutuhan Kulit') as $k => $v)
                                                                <option value="{{$v->id}}"
                                                                        @if($user->kebutuhan_kulit == $v->id) selected @endif>{{title_case($v->name)}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!-- /.form group -->
                                                </div>
                                                <!-- /.col-sm-3 -->
                                                <div class="col-xs-12 col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <label class="block text-uppercase text-center">
                                                            Kebutuhan Rambut
                                                        </label>
                                                        <select name="kebutuhan_rambut" class="selectpicker"
                                                                data-style="btn-orange-ghost" data-width="100%">
                                                            <option>-</option>
                                                            @foreach($personalisasi->where('jenis', 'Kebutuhan Rambut') as $k => $v)
                                                                <option value="{{$v->id}}"
                                                                        @if($user->kebutuhan_rambut == $v->id) selected @endif>{{title_case($v->name)}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!-- /.form group -->
                                                </div>
                                                <!-- /.col-sm-3 -->
                                            </div>
                                            <!-- /.row -->
                                            <div class="row">
                                                <div class="hidden-xs col-sm-7 col-md-8">
                                                </div>
                                                <!-- /.col-sm-8 -->
                                                <div class="col-xs-12 col-sm-5 col-md-4">
                                                    <br/>
                                                    <button class="btn btn-orange btn-block btn-lg text-uppercase"
                                                            type="submit">
                                                        Simpan Perubahan
                                                    </button>
                                                </div>
                                                <!-- /.col-sm-4 -->
                                            </div>
                                            </form>
                                        </div><!-- /.row -->

                                    <!-- /.Profil -->
                                    <div class="tab-pane @if(! isEmptyOrNullString(session('address'))) active @endif" id="address" role="tabpanel">
                                        <form class="form-horizontal" method="post" action="{{url('alamat')}}">
                                            <div class="form-group">
                                                <label for="nama_depan" class="control-label col-md-3">Nama Depan</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="nama_depan" value="{{$user->first_name}}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_belakang" class="control-label col-md-3">Nama Belakang</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="nama_belakang" value="{{$user->last_name}}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="provinsi" class="control-label col-md-3">Provinsi</label>
                                                <div class="col-md-9">
                                                    <select name="provinsi" class="form-control" id="provinsi" required>
                                                        @foreach($provinsi as $k => $v)
                                                            <option value="{{$v->id_prov}}" @if($user->alamat['provinsi']['id'] == $v->id_prov) selected @endif>{{title_case($v->nama)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kota" class="control-label col-md-3">Kota</label>
                                                <div class="col-md-9">
                                                    <select name="kabupaten" class="form-control" id="kabupaten" required>
                                                        @if(strlen($user->alamat['kelurahan']['id']) > 0)
                                                            @foreach(\App\Kabupaten::where('id_kab', $user->alamat['kabupaten']['id'])->get() as $k => $v)
                                                                <option value="{{$v->id_kab}}" @if($user->alamat['kabupaten']['id'] == $v->id_kab) selected @endif>{{title_case($v->nama)}}</option>
                                                            @endforeach

                                                        @else

                                                            @foreach(\App\Kabupaten::where('id_prov', $provinsi->first()->id_prov)->get() as $k => $v)
                                                                <option value="{{$v->id_kab}}" @if($user->alamat['kabupaten']['id'] == $v->id_kab) selected @endif>{{title_case($v->nama)}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kota" class="control-label col-md-3">Kecamatan</label>
                                                <div class="col-md-9">
                                                    {{--{{dd($provinsi->first()->kabupaten->first()->id_kab)}}--}}
                                                    <select name="kecamatan" class="form-control" id="kecamatan" required>
                                                        @if(strlen($user->alamat['kelurahan']['id']) > 0)
                                                            @foreach(\App\Kecamatan::where('id_kab', $user->alamat['kabupaten']['id'])->get() as $k => $v)
                                                                <option value="{{$v->id_kec}}" @if($user->alamat['kecamatan']['id'] == $v->id_kec) selected @endif>{{title_case($v->nama)}}</option>
                                                            @endforeach
                                                        @else


                                                            @foreach(\App\Kecamatan::where('id_kab', $provinsi->first()->kabupaten->first()->id_kab)->get() as $k => $v)
                                                                <option value="{{$v->id_kec}}" @if($user->alamat['kecamatan']['id'] == $v->id_kec) selected @endif>{{title_case($v->nama)}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kota" class="control-label col-md-3">Desa/Kelurahan</label>
                                                <div class="col-md-9">
                                                    <select name="kelurahan" class="form-control" id="kelurahan" required>
                                                        @if(strlen($user->alamat['kelurahan']['id']) > 0)
                                                            @foreach(\App\Kelurahan::where('id_kec', $user->alamat['kecamatan']['id'])->get() as $k => $v)
                                                                <option value="{{$v->id_kel}}" @if($user->alamat['kelurahan']['id'] == $v->id_kel) selected @endif>{{title_case($v->nama)}}</option>
                                                            @endforeach

                                                        @else

                                                            @foreach(\App\Kelurahan::where('id_kec', $provinsi->first()->kabupaten->first()->kecamatan->first()->id_kec)->get() as $k => $v)
                                                                <option value="{{$v->id_kel}}" @if($user->alamat['kelurahan']['id'] == $v->id_kel) selected @endif>{{title_case($v->nama)}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            {{--<div class="form-group">--}}
                                                {{--<label for="jalan" class="control-label col-md-3">Jalan</label>--}}
                                                {{--<div class="col-md-9">--}}
                                                    {{--<input type="text" name="jalan" class="form-control" value="{{old('jalan')}}">--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="form-group">
                                                <label for="alamat" class="control-label col-md-3">Alamat</label>
                                                <div class="col-md-9">
                                                    <textarea name="alamat" class="form-control" value="{{old('alamat')}}" required></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="kode_pos" class="control-label col-md-3">Kode Pos</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="kode_pos" class="form-control" value="{{old('kode_pos')}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_hp" class="control-label col-md-3">No HP</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="no_hp" value="{{$user->phone}}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn btn-flat btn-warning pull-right">Simpan <i class="fa fa-save"></i> </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="account" role="tabpanel">
                                        ...
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab -->
                        </div>
                        <!-- /.content -->
                    </div>
                    <!-- /.inner -->
                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.profile -->

@endsection

@section('js')
    <script>
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

