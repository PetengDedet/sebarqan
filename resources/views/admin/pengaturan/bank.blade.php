@extends('layouts.admin')
@section( 'title','Admin Bank')
@section( 'page_title','Admin Bank')

@section('content')
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

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Akun Bank</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_bank" class="control-label col-md-3">Nama Bank</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_bank" class="form-control" value="{{old('nama_bank')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nomor_rekening" class="control-label col-md-3">Nomor Rekening</label>
                            <div class="col-md-9">
                                <input type="text" name="nomor_rekening" class="form-control" value="{{old('nomor_rekening')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logo" class="control-label col-md-3">Logo</label>
                            <div class="col-md-9">
                                <input type="file" name="logo" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary pull-right">Simpan <i class="fa fa-save"></i> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Bank</div>
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Nama Bank</th>
                            <th>No. Rekening</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bank as $k => $v)
                            @php
                                $isi = json_decode($v->isi);
                            @endphp
                            <tr>
                                <td>
                                    <img src="{!! asset('storage/bank/' . $isi->logo)!!}" width="100" height="auto">
                                </td>
                                <td>
                                    {{title_case($isi->bank_name)}}
                                </td>
                                <td>{{$isi->bank_account}}</td>
                            </tr>
                            @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection