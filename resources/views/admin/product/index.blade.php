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
                        <th>Gambar</th>
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
                    <tr @if($v->published != 1) class="warning" @endif>
                        <td>
                            <img src="{{$v->primePhoto}}" width="100" class="img-bordered-sm">
                        </td>
                        <td>
                            <a href="{{url('/' . $v->url )}}" target="_blank">{{title_case($v->name)}}</a>
                            <br>
                            <small>{!!str_limit($v->description, 50)!!}</small>
                            <br>
                            @if($v->new == 1)
                                <span class="label label-success"><i class="fa fa-check-square"></i> New</span>&nbsp;
                            @endif
                            @if($v->featured == 1)
                                <span class="label label-success"><i class="fa fa-check-square"></i> Featured</span>&nbsp;
                            @endif
                            @if($v->recommended == 1)
                                <span class="label label-success"><i class="fa fa-check-square"></i> Recommended</span>&nbsp;
                            @endif
                            @if($v->hot_deal == 1)
                                <span class="label label-success"><i class="fa fa-check-square"></i> Hot Deal</span>&nbsp;
                            @endif
                        </td>
                        <td>
                            <strong>Kategori: </strong>
                            @foreach($v->category as $key => $value)
                                {{$value->category->name . ', '}}
                            @endforeach
                            <br>
                            <strong>Tags:</strong> {{strlen($v->tags) > 0 ? $v->tags : '-'}}
                            <br>
                            <strong>Varian:</strong>

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
                            <br>
                            <br>
                            @if($v->allow_pre_order == 1)
                                <span class="label label-warning"><i class="fa fa-check-square"></i> Pre Order</span>&nbsp;
                            @endif
                            @if($v->ignore_stock == 1)
                                <span class="label label-warning"><i class="fa fa-check-square"></i> Ignored Stock</span>&nbsp;
                            @endif
                        </td>
                        <td>
                            <strong>Page Title:</strong> {{strlen($v->page_title) > 0 ? $v->page_title : '-'}}
                            <br>
                            <strong>Meta Description:</strong> {{strlen($v->meta_description) > 0 ? str_limit($v->meta_description, 50) : '-'}}
                            <br>
                            <strong>Meta Keywords:</strong> {{strlen($v->meta_keywords) > 0 ? str_limit($v->meta_keywords,50) : '-'}}
                            <br>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-bars"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="{{url('admin/product/detail/' . $v->id)}}"><i class="fa fa-list-alt"></i> Detail</a></li>
                                    <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                                    <li><a href="{{url('admin/product/add-varian/' . $v->id)}}"><i class="fa fa-copy"></i> Add Varian</a></li>
                                    @if($v->published != 1)
                                        <li>
                                            <form method="post" action="{{url('admin/publish-product')}}">
                                                <input type="hidden" name="id" value="{{$v->id}}">
                                            </form>
                                            <a href="#" class="publish"><i class="fa fa-eye"></i> Publish</a>
                                        </li>
                                        @else
                                        <li>
                                            <form method="post" action="{{url('admin/unpublish-product')}}">
                                                <input type="hidden" name="id" value="{{$v->id}}">
                                            </form>
                                            <a href="#" class="unpublish"><i class="fa fa-eye-slash"></i> Unpublish</a>
                                        </li>
                                    @endif
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>
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

        $('.publish, .unpublish').on('click', function(){
            $(this).parent().find('form').submit();
        });
    </script>
@endsection