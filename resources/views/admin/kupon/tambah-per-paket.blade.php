@extends('layouts.admin')
@section('page_title', 'Tambah Kupon Per Produk')
@section('title', 'Tambah Kupon Per Produk')
@section('css')

@endsection

@section('content')
    <div class="box">
        <div class="box-body">
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

                <fieldset>
                    <legend>Tambah Kupon Per Produk</legend>
                    <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="tipe" class="control-label col-md-3">Tipe</label>
                            <div class="col-md-8">
                                <input type="text" name="tipe" value="Per Produk" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="code" class="control-label col-md-3">Kode</label>
                            <div class="col-md-8">
                                <input type="text" name="code" value="{{old('code')}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label col-md-3">Description</label>
                            <div class="col-md-8">
                                <textarea name="description" class="form-control">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="control-label col-md-3">Gambar</label>
                            <div class="col-md-8">
                                <input type="file" name="gambar">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-flat btn-primary pull-right">Simpan <i class="fa fa-save"></i> </button>
                            </div>
                        </div>
                    </form>
                </fieldset>
                Per Produk
        </div>
    </div>
@endsection