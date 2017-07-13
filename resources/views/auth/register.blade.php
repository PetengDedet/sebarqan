@extends('layouts.master')

@section('content')

    <section class="section-reglog">
        <div class="container">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs visible-xs" role="tablist">
                <li role="presentation" class="active"><a href="#tab-login" data-toggle="tab">Login</a></li>
                <li role="presentation"><a href="#tab-register" data-toggle="tab">Register</a></li>
            </ul>

            <div class="row row-sm-height width-auto tab-content">
                <div id="tab-login" class="colxs-12 col-sm-5 col-sm-height col-sm-top tab-pane active">
                    <div class="section-reglog-login">
                        <form action="{{url('login-check')}}" method="post" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <h3 class="section-reglog-title">
                                        Sudah Bergabung, SiQers?
                                    </h3>
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
                                </div>
                            </div> <!-- /.row -->

                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-4 control-label">Email</label>

                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control form-control-custom" id="inputEmail" value="{{old('email')}}" placeholder="Email">
                                </div>
                            </div> <!-- /.form group -->

                            <div class="form-group">
                                <label for="inputPass" class="col-sm-4 control-label">Password</label>

                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control form-control-custom" id="inputPass" placeholder="Password">
                                </div>
                            </div> <!-- /.form group -->

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <div class="checkbox">
                                        <label class="text-orange">
                                            <input type="checkbox" checked> Remember me
                                        </label>
                                    </div>

                                    <a href="#" class="text-muted">Lupa Password?</a>
                                </div>
                            </div> <!-- /.form group -->

                            <div class="text-right">
                                <button type="submit" class="btn btn-orange text-uppercase">Masuk</button>
                            </div>
                        </form> <!-- /.form -->
                    </div> <!-- /.login -->
                </div> <!-- /.col-sm-6 -->

                <div id="tab-register" class="colxs-12 col-sm-7 col-sm-height col-sm-top tab-pane">
                    <div class="section-reglog-register">
                        <form action="{{url('register')}}" method="post" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <h3 class="section-reglog-title">
                                        Baru di SilahQan? AYO Daftar Sekarang...
                                    </h3>
                                    @if (Session::has('err'))
                                        <br>
                                        <div class="alert alert-danger">
                                            <ul>
                                                {{-- {{dd(Session::get('err') )}} --}}
                                                @foreach (Session::get('err') as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div> <!-- /.row -->

                            <div class="form-group">
                                <label for="inputName" class="col-sm-4 control-label">Nama*</label>

                                <div class="col-sm-8">
                                    <div class="row row-small">
                                        <div class="col-xs-6">
                                            <input type="text" name="first_name" value="{{old('first_name')}}" required class="form-control form-control-custom" placeholder="Nama Depan" />
                                        </div> <!-- /.col-xs-6 -->

                                        <div class="col-xs-6">
                                            <input type="text" name="last_name" value="{{old('last_name')}}" required class="form-control form-control-custom" placeholder="Nama Belakang" />
                                        </div> <!-- /.col-xs-6 -->
                                    </div> <!-- /.row -->
                                </div>
                            </div> <!-- /.form group -->

                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-4 control-label">Email*</label>

                                <div class="col-sm-8">
                                    <input type="email" name="email" value="{{old('email')}}" required class="form-control form-control-custom" id="inputEmail" placeholder="Email">
                                </div>
                            </div> <!-- /.form group -->

                            <div class="form-group">
                                <label for="inputPass" class="col-sm-4 control-label">Password*</label>

                                <div class="col-sm-8">
                                    <input type="password" name="password" required class="form-control form-control-custom" id="inputPass" placeholder="Password">
                                </div>
                            </div> <!-- /.form group -->

                            <div class="form-group">
                                <label for="inputPass" class="col-sm-4 control-label">Ulangi Password*</label>

                                <div class="col-sm-8">
                                    <input type="password" name="password_confirmation" required class="form-control form-control-custom" id="inputPass" placeholder="Ulangi Password">
                                </div>
                            </div> <!-- /.form group -->

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <div class="checkbox">
                                        <label class="text-orange">
                                            <input type="checkbox" name="subscribe" checked> Berlangganan Newsletter
                                        </label>
                                    </div>
                                </div>
                            </div> <!-- /.form group -->

                            <div class="text-right">
                                <button type="submit" class="btn btn-orange text-uppercase">Daftar</button>
                            </div>
                        </form> <!-- /.form -->
                    </div> <!-- /.register -->
                </div> <!-- /.col-sm-6 -->
            </div> <!-- /.row -->

            <a href="#" class="text-orange">Masuk Sebagai Tamu</a>
        </div> <!-- /.container -->
    </section>
    
@endsection
