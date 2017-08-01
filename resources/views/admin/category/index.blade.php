@extends('layouts.admin')
@section('page_title', 'Kategori Produk')
@section('css')
    {{--<link href="{{asset('assets/adminlte/plugins/datatables/jquery.dataTables.min.css')}}" rel="stylesheet">--}}
    <link href="{{asset('assets/adminlte/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">

@endsection

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
    <form method="post" action="">
        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="category_name" class="control-label">Nama Kategori</label>
                            <input type="text" name="category_name" value="{{old('category_name')}}"
                                   class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="category_parent" class="control-label">Parent</label>
                            <select name="category_parent" class="form-control">
                                <option>-</option>
                                @forelse($category as $k => $v)
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_description" class="control-label">Deskripsi</label>
                            <textarea name="category_description"
                                      class="form-control">{{old('category_description')}}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-flat pull-right">Simpan <i
                                        class="fa fa-save"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="box">
        <div class="box-body">
            <table class="table table-condensed table-stripped table-hover" id="table">
                <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Slug</th>
                    <th>Deskripsi</th>
                    <th>Parent Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($category as $k => $v)
                    <tr>
                        <td>{{$v->name}}</td>
                        <td>{{$v->slug}}</td>
                        <td>{{$v->description}}</td>
                        <td>
                            @if($v->parent_id != null)
                                {{$v->parent->name}}
                            @endif
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
            $('#table').dataTable({
                "bSort" : false
            });
        });
    </script>
@endsection