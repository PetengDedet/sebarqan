@extends('layouts.admin')
@section('page_title', 'Produk')
@section('css')
    <link href="{{asset('assets/adminlte/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="box">
        <div class="box-body">

            @if(Session::has('msg'))
                {!! Session::get('msg') !!}
            @endif
            <a href="{{url('admin/new-product')}}" class="btn btn-primary btn-flat">Tambah Produk <i class="fa fa-plus"></i></a>
                <br>
                <br>
            <table class="table table-condensed table-stripped table-hover" id="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>
                            SEO
                        </th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($product as $k => $v)
                    <tr>
                        <td>
                            <a href="#">{{$v->name}}</a>
                            <br>
                            <small>{{str_limit($v->description, 100)}}</small>
                            <br>
                            <strong>Tags:</strong> {{strlen($v->tags) > 0 ? $v->tags : '-'}}
                        </td>
                        <td>
                            @foreach($v->category as $key => $value)
                                {{$value->category->name . ', '}}
                            @endforeach
                        </td>
                        <td>
                            {{number_format($v->variant->first()->price, 0, ',', '.')}}
                        </td>
                        <td>
                            @php
                                $stok = 0;
                                foreach ($v->variant as $key => $value) {
                                    $stok += $value->qty;
                                }
                            @endphp
                            {{$stok}}
                        </td>
                        <td>
                            <strong>Page Title:</strong> {{strlen($v->page_title) > 0 ? $v->page_title : '-'}}
                            <br>
                            <strong>Meta Description:</strong> {{strlen($v->meta_description) > 0 ? $v->meta_description : '-'}}
                            <br>
                            <strong>Meta Keywords:</strong> {{strlen($v->meta_keywords) > 0 ? $v->meta_meta_keywords : '-'}}
                            <br>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-bars"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="{{url('admin/product/detail/' . $v->id)}}">Detail</a></li>
                                    <li><a href="#">Add Varian</a></li>
                                    @if($v->published != 1)
                                        <li><a href="#">Publish</a></li>
                                    @endif
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>

                <br>
            <a href="{{url('admin/new-product')}}" class="btn btn-primary btn-flat">Tambah Produk <i class="fa fa-plus"></i></a>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#table').dataTable();
        });
    </script>
@endsection