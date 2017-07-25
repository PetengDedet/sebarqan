@extends('layouts.admin')
@section('page_title', 'Member')
@section('css')
    <link href="{{asset('assets/adminlte/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="box">
        <div class="box-body">

            @if(Session::has('msg'))
                {!! Session::get('msg') !!}
            @endif
            <a href="{{url('admin/new-member')}}" class="btn btn-primary btn-flat">Tambah Member <i class="fa fa-plus"></i></a>
            <br>
            <br>
            <table class="table table-condensed table-stripped table-hover" id="table">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($member as $k => $v)
                    <tr>
                        <td>
                            <a href="#">{{$v->name}}</a>
                        </td>
                        <td>{{$v->email}}</td>
                        <td>{{$v->phone}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-bars"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Edit</a></li>
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
            <a href="{{url('admin/new-member')}}" class="btn btn-primary btn-flat">Tambah Member <i class="fa fa-plus"></i></a>
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