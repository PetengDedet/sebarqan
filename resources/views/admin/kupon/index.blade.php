@extends('layouts.admin')
@section('page_title', 'Kupon')
@section('title', 'Kupon')
@section('css')
    <link href="{{asset('assets/adminlte/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection

@section('content')
    <!-- Large modal -->

    <div class="modal fade op" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <a href="{{url('admin/kupon/tambah-per-produk')}}" class="btn btn-primary btn-flat btn-block">Per Produk</a>
                    <a href="{{url('admin/kupon/tambah-per-paket')}}" class="btn btn-warning btn-flat btn-block">Per Paket</a>
                    <a href="{{url('admin/kupon/tambah-per-kategori')}}" class="btn btn-success btn-flat btn-block">Per Kategori</a>
                    <a href="{{url('admin/kupon/tambah-per-user')}}" class="btn btn-danger btn-flat btn-block">Per User</a>
                    <a href="{{url('admin/kupon/tambah-ongkir')}}" class="btn btn-default btn-flat btn-block">Diskon Ongkir</a>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-body">
            @if(Session::has('msg'))
                {!! Session::get('msg') !!}
            @endif
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".op">Tambah Kupon <i class="fa fa-plus"></i></button>
{{--            <a href="{{url('admin/kupon/tambah')}}" class="btn btn-primary btn-flat">Tambah Kupon <i class="fa fa-plus"></i></a>--}}
            <br>
            <br>
            <table class="table table-condensed table-stripped table-hover" id="table">
                <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Kode</th>
                    <th>Status</th>
                    <th>Tipe</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($kupon as $k => $v)
                    <tr @if($v->published != 1) class="warning" @endif>
                        <td>
                            <img src="{{$v->gambar}}" width="100" class="img-bordered-sm">
                        </td>
                        <td>{{$v->kode}}</td>
                        <td>{{$v->status}}</td>
                        <td>{{$v->type}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-bars"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="{{url('admin/kupon/detail/' . $v->id)}}"><i class="fa fa-list-alt"></i> Detail</a></li>
                                    <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
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
            <a href="{{url('admin/kupon/tambag')}}" class="btn btn-primary btn-flat">Tambah Kupon <i class="fa fa-plus"></i></a>
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