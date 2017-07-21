@extends('layouts.admin')
@section('page_title', 'Detail Produk')
@section('css')
@endsection

@section('content')
    <div class="box">
        <div class="box-body">
            <div class="col-md-8">
                <dl class="dl-horizontal">
                    <dt>Name</dt>
                    <dd>{{$product->name}}</dd>
                    <dt>Brand</dt>
                    <dd>{{$product->brand}}</dd>
                    <dt>SKU</dt>
                    <dd>{{$product->variant->first()->code}}</dd>
                    <dt>Deskripsi</dt>
                    <dd>{{$product->description}}</dd>
                </dl>
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

@endsection