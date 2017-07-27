@extends('layouts.admin')
@section('page_title', 'Tambah Kupon Per Produk')
@section('title', 'Tambah Kupon Per Produk')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/select2/select2.css')}}">
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/adminlte/plugins/datepicker/datepicker3.css')}}">

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

            <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">
                <fieldset>
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
                        <label for="gambar" class="control-label col-md-3">Gambar</label>
                        <div class="col-md-8">
                            <input type="file" name="gambar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label col-md-3">Description</label>
                        <div class="col-md-8">
                            <textarea name="description" class="form-control">{{old('description')}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tipe_kupon" class="control-label col-md-3">Tipe Kupon</label>
                        <div class="col-md-8">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="tipe_kupon" value="discount" id="discount" checked> Potongan Harga
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="tipe_kupon" value="persen" id="persen"> Persen
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="periode" class="control-label col-md-3">Periode</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="text" name="periode" value="{{old('period')}}" class="form-control date" id="periode" required>
                                <span type="button" class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Produk</legend>

                    <div class="form-group">
                        <label for="produk" class="control-label col-md-3">Pilih Produk</label>
                        <div class="col-md-8">
                            <select name="produk[]" class="form-control" id="produk" required>
                                @forelse($produk as $k => $v)
                                    <option value="{{$v->id}}">{{title_case($v->name)}}</option>
                                    @empty
                                    <option>Belum ada Produk</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-flat btn-primary pull-right">Simpan <i
                                        class="fa fa-save"></i></button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection

@section('js')
    {{--    <script src="{{asset('assets/adminlte/plugins/ckeditor/ckeditor.js')}}"></script>--}}
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/select2/select2.full.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#produk').select2();
            $('#periode').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' });
        });
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
//            CKEDITOR.replace('description');
            //bootstrap WYSIHTML5 - text editor
            $('textarea').wysihtml5({
                "image": false
            });
        })
    </script>
@endsection