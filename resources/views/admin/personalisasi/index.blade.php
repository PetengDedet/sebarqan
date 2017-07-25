@extends('layouts.admin')
@section('title', 'Personalisasi')
@section('page_title', 'Personalisasi')
@section('css')
    <link href="{{asset('assets/adminlte/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">
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

            <br>
            <br>

            <form method="post" action="" class="form-horizontal">
                <div class="form-group">
                    <label for="jenis" class="control-label col-md-2">Jenis</label>
                    <div class="col-md-4">
                        <select name="jenis" class="form-control" id="jenis">
                            <option value="Jenis Kulit">Jenis Kulit</option>
                            <option value="Jenis Rambut">Jenis Rambut</option>
                            <option value="Kebutuhan Kulit">Kebutuhan Kulit</option>
                            <option value="Kebutuhan Rambut">Kebutuhan Rambut</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-md-2">Nama</label>
                    <div class="col-md-4">
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="control-label col-md-2">Description <small><em>(Optional)</em></small></label>
                    <div class="col-md-4">
                        <textarea name="textarea" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary btn-flat pull-right">Simpan <i class="fa fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <table class="table table-condensed table-stripped table-hover" id="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Jenis</th>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($personalisasi as $k => $v)
                    <tr>
                        <td>{{title_case($v->id)}}</td>
                        <td>{{title_case($v->jenis)}}</td>
                        <td>{{title_case($v->name)}}</td>
                        <td>{{$v->slug}}</td>
                        <td>{{str_limit($v->description, 100)}}</td>
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