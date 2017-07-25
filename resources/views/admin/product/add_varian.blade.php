@extends('layouts.admin')
@section('title', 'Tambah Varian - ' . title_case($product->name))
@section('page_title', 'Tambah Varian - ' . title_case($product->name))
@section('css')
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

            <div class="col-md-8">
                <dl class="dl-horizontal">
                    <dt>Product Name</dt>
                    <dd>{{$product->name}}</dd>
                    <dt>Brand</dt>
                    <dd>{{$product->brand}}</dd>
                    <dt>SKU</dt>
                    <dd>{{$product->variant->first()->code}}</dd>
                </dl>
                <fieldset>
                    <legend>Varian:</legend>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        @forelse($product->variant as $k => $v)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading_{{$k}}">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$k}}" aria-expanded="true" aria-controls="collapse_{{$k}}">
                                            {{$v->variant_name}} @if($k == 0) (Default) @endif
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_{{$k}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{$k}}">
                                    <div class="panel-body">
                                        <dl class="dl-horizontal">
                                            <dt>Variant Name:</dt>
                                            <dd>{{$v->variant_name}}</dd>
                                            <dt>Code:</dt>
                                            <dd>{{$v->code}}</dd>
                                            <dt>Price</dt>
                                            <dd>{{number_format($v->price, 0, '.', '.')}}</dd>
                                            <dt>Sale Price</dt>
                                            <dd>
                                                {{number_format($v->sale_price, 0, '.', '.')}}
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            @empty
                        @endforelse
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Tambah Varian Baru</legend>
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label for="variant_name" class="control-label col-md-4">Variant Name</label>
                            <div class="col-md-8">
                                <input type="text" name="variant_name" value="{{old('variant_name')}}" class="form-control" id="variant_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="variant_code" class="control-label col-md-4">Code</label>
                            <div class="col-md-8">
                                <input type="text" name="variant_code" value="{{old('variant_code')}}" class="form-control" id="variant_code" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="variant_color" class="control-label col-md-4">Color</label>
                            <div class="col-md-8">
                                <input type="text" name="variant_color" value="{{old('variant_color')}}" class="form-control" id="variant_color">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="variant_price" class="control-label col-md-4">Price</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp. </span>
                                    <input type="number" min="0" step="1" name="variant_price" value="{{old('variant_price', '0')}}" class="form-control" id="variant_price" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="variant_sale_price" class="control-label col-md-4">Sale Price</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp. </span>
                                    <input type="number" min="0" step="1" name="variant_sale_price" value="{{old('variant_sale_price', '0')}}" class="form-control" id="variant_sale_price">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="variant_sale_period" class="control-label col-md-4">Sale Price Datetime</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" name="product_sale_period" value="{{old('variant_sale_period')}}" class="form-control date" id="variant_sale_period">
                                    <span type="button" class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="variant_stock" class="control-label col-md-4">Stock</label>
                            <div class="col-md-8">
                                <input type="number" step="1" min="0" name="variant_stock" value="{{old('variant_stock', '0')}}" class="form-control" id="variant_stock" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_weight" class="control-label col-md-4">Weight (in gram(s))</label>
                            <div class="col-md-8">
                                <input type="number" name="variant_weight" value="{{old('variant_weight', '0')}}" class="form-control" min="0" step="0.1" id="variant_weight">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_length" class="control-label col-md-4">Length (in cm)</label>
                            <div class="col-md-8">
                                <input type="number" name="variant_length" value="{{old('variant_length', '0')}}" class="form-control" min="0" step="0.1" id="variant_length">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_width" class="control-label col-md-4">Width (in cm)</label>
                            <div class="col-md-8">
                                <input type="number" name="variant_width" value="{{old('variant_width', '0')}}" class="form-control" min="0" step="0.1" id="variant_width">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_height" class="control-label col-md-4">Height (in cm)</label>
                            <div class="col-md-8">
                                <input type="number" name="variant_height" value="{{old('variant_height', '0')}}" class="form-control" min="0" step="0.1" id="product_height">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="id" value="{{$product->id}}">
                            </div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-flat btn-primary pull-right">Simpan <i class="fa fa-save"></i> </button>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
            <div class="col-md-2">
                @if(count($product->photo) > 0)
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">

                            @foreach($product->photo as $k => $v)
                                <li data-target="#carousel-example-generic" data-slide-to="{{$k}}" class="@if($k == 0) active @endif"></li>
                            @endforeach

                        </ol>

                    @foreach($product->photo as $k => $v)
                        @if(Storage::disk('public')->exists('product_photo/' . $v->path))

                            <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item @if($k == 0) active @endif">
                                        <img src="{{asset('storage/product_photo/' . $v->path)}}" alt="{{$v->alt}}">
                                        <div class="carousel-caption">
                                            {{$v->alt}}
                                        </div>
                                    </div>
                                </div>

                        @endif
                    @endforeach

                    <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                @else
                    <em>Produk tidak memiliki gambar</em>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/adminlte/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#variant_sale_period').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                format: 'MM/DD/YYYY h:mm A'
            });
        });
    </script>
@endsection