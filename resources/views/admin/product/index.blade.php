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
            <table class="table table-condensed table-stripped table-hover" id="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
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
                        <td>{{$v->id}}</td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
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