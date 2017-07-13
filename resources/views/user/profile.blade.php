@extends('layouts.master')

@section('content')
<section class="section-profile">
    <div class="container">
        <div class="row row-sm-height no-margin">
            <div class="col-xs-12 col-sm-4 col-md-3 col-sm-height no-padding section-profile-sidebar">
                <div class="block">
                    <div class="section-profile-sidebar-detail">
                        <div class="section-profile-avatar text-center">
                            <img alt="Avatar" class="img-circle" src="assets/images/default-avatar.jpg"/>
                        </div>
                        <!-- /.avatar -->
                        <h3 class="section-profile-name text-center">
                            {{$user->fullName()}}
                        </h3>
                        <div class="section-profile-regdate text-center">
                            Bergabung sejak {{\Carbon\Carbon::parse($user->created_at)->format('j  F Y')}}
                        </div>
                        <div class="section-profile-meta">
                            <div class="section-profile-meta-item">
                                <span>
                                    Tanggal lahir
                                </span>
                                <span>
                                    {{\Carbon\Carbon::parse($user->dateofbirth)->format('j  F Y')}}
                                </span>
                            </div>
                            <div class="section-profile-meta-item">
                                <span>
                                    Email
                                </span>
                                <span>
                                    {{$user->email}}
                                </span>
                            </div>
                        </div>
                        <!-- /.meta -->
                    </div>
                    <!-- /.detail -->
                    <ul class="section-profile-menu">
                        <li class="active">
                            <a href="#">
                                <i class="icon fa fa-user">
                                </i>
                                Profil
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon fa fa-heart">
                                </i>
                                Whislist
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon fa fa-shopping-cart">
                                </i>
                                Riwayat Pemesanan
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon fa fa-check">
                                </i>
                                Konfirmasi Pembayaran
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar -->
            </div>
            <!-- /.col-md-3 -->
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
                                <div class="tab-pane active" id="profile" role="tabpanel">
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
                                            <form class="form-horizontal" method="post" action="{{url('profile')}}">
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">
                                                        Nama Depan
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control form-control-custom" name="first_name" value="{{$user->first_name}}" required placeholder="Nama Depan" type="text">
                                                    </div>
                                                </div>
                                                <!-- /.form group -->
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">
                                                        Nama Belakang
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control form-control-custom" name="last_name" value="{{$user->last_name}}" required placeholder="Nama Belakang" type="text">
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
                                                                <select class="selectpicker" name="tgl" required data-style="btn-orange-ghost" data-width="100%">
                                                                    <option>Tanggal</option>
                                                                    @for($i = 1; $i<= 31; $i++)
                                                                        <option value="{{$i}}" @if($i == substr($user->dateofbirth, 8)) selected @endif>{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <!-- /.col-xs-4 -->
                                                            <div class="col-xs-4">
                                                                <select class="selectpicker" name="bln" required data-style="btn-orange-ghost" data-width="100%">
                                                                    <option>
                                                                        Bulan
                                                                    </option>
                                                                    @for($i = 1; $i<= 12; $i++)
                                                                        <option value="{{$i}}" @if($i == substr($user->dateofbirth, 5)) selected @endif>{{$i}}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <!-- /.col-xs-4 -->
                                                            <div class="col-xs-4">
                                                                <select class="selectpicker" name="thn" required data-style="btn-orange-ghost" data-width="100%">
                                                                    <option>
                                                                        Tahun
                                                                    </option>
                                                                    @for($i = date('Y'); $i >= date('Y') - 70; $i--)
                                                                        <option value="{{$i}}" @if($i == substr($user->dateofbirth, 0)) selected @endif>{{$i}}</option>
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
                                                        <input class="form-control form-control-custom" placeholder="Nomor Telepon" type="text" value="{{$user->phone}}" name="phone">
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
                                                                <input @if($user->gender == 'male') checked @endif required id="gender_male" name="gender" type="radio" value="male">Pria
                                                            </label>
                                                        </div>
                                                        <!-- /.gender item -->
                                                        <div class="radio">
                                                            <label>
                                                                <input @if($user->gender == 'female') checked @endif required id="gender_female" name="gender" type="radio" value="female">wanita
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
                                                <select class="selectpicker" data-style="btn-orange-ghost" data-width="100%">
                                                    <option>
                                                        Pilihan 1
                                                    </option>
                                                    <option>
                                                        Pilihan 2
                                                    </option>
                                                    <option>
                                                        dst...
                                                    </option>
                                                </select>
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                        <!-- /.col-sm-3 -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label class="block text-uppercase text-center">
                                                    Warna Kulit
                                                </label>
                                                <select class="selectpicker" data-style="btn-orange-ghost" data-width="100%">
                                                    <option>
                                                        Pilihan 1
                                                    </option>
                                                    <option>
                                                        Pilihan 2
                                                    </option>
                                                    <option>
                                                        dst...
                                                    </option>
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
                                                <select class="selectpicker" data-style="btn-orange-ghost" data-width="100%">
                                                    <option>
                                                        Pilihan 1
                                                    </option>
                                                    <option>
                                                        Pilihan 2
                                                    </option>
                                                    <option>
                                                        dst...
                                                    </option>
                                                </select>
                                            </div>
                                            <!-- /.form group -->
                                        </div>
                                        <!-- /.col-sm-3 -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label class="block text-uppercase text-center">
                                                    Tipe Rambut
                                                </label>
                                                <select class="selectpicker" data-style="btn-orange-ghost" data-width="100%">
                                                    <option>
                                                        Pilihan 1
                                                    </option>
                                                    <option>
                                                        Pilihan 2
                                                    </option>
                                                    <option>
                                                        dst...
                                                    </option>
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
                                            <button class="btn btn-orange btn-block btn-lg text-uppercase" type="submit">
                                                Simpan Perubahan
                                            </button>
                                        </div>
                                        <!-- /.col-sm-4 -->
                                    </div>
                                    <!-- /.row -->
                                    </form>
                                </div>
                                <!-- /.Profil -->
                                <div class="tab-pane" id="address" role="tabpanel">
                                    ...
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

