@extends('layouts.admin')
@section('page_title', 'Tambah Produk Baru')

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

            <form method="post" action="" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_category" class="control-label">Kategori</label>
                        <select name="product_category" class="form-control" required>
                            @forelse($category as $k => $v)
                                <option value="{{$v->id}}">{{$v->name}}</option>
                                @empty

                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_name" class="control-label">Nama Produk</label>
                        <input type="text" name="product_name" value="{{old('product_name')}}" class="form-control" id="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="product_sku" class="control-label">SKU</label>
                        <input type="text" name="product_sku" value="{{old('product_sku')}}" class="form-control" id="product_sku" required>
                    </div>
                    <div class="form-group">
                        <label for="product_description" class="control-label">Deskripsi</label>
                        <textarea name="product_description" class="form-control">{{old('product_description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_price" class="control-label">Harga</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">Rp. </span>
                            <input type="number" name="product_price" value="{{old('product_price', '0')}}" class="form-control" min="0" step="1"  aria-describedby="sizing-addon2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_stock" class="control-label">Stok</label>
                        <div class="input-group">
                            <input type="number" name="product_stock" value="{{old('product_stock', '0')}}" class="form-control" min="0" step="1"  aria-describedby="sizing-addon2">
                            <span class="input-group-addon" id="sizing-addon2">Item</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_picture[]" class="control-label">Gambar</label>
                        <input type="file" name="product_picture[]" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-flat pull-right">Simpan <i class="fa fa-save"></i> </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection