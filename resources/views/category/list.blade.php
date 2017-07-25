@extends('layouts.master')


@section('content')

    <main class="section-main">
        <section class="section-detail">
            <div class="container">
                <div class="row">
                    <div class="">
                        {{--{{dd($category->productCat)}}--}}
                        @forelse($category->productCat as $k => $v)
                            @if($v->product->published == 1)
                                <a href="{{url($v->product->slug)}}" class="product-item">
                                    @if($v->product->is_featured == 1)
                                        <div class="featured text-center">
                                            <div class="inner">
                                                <span class="block">Pilihan</span>
                                                <span class="block">Editor</span>
                                            </div>
                                        </div> <!-- /.featured label -->
                                    @endif

                                    <div class="images">
                                        <img src="{{$v->product->primePhoto}}" alt="{{$v->product->meta_title}}" />
                                    </div> <!-- /.images -->

                                    <div class="meta">
                                        <div class="category">
                                            {{$v->product->brand}}
                                        </div> <!-- /.category -->

                                        <h2 class="name">
                                            {{$v->product->name}}
                                        </h2> <!-- /.name -->

                                        <div class="rating">
                                            @for($i = 1; $i<=5;$i++)
                                                @if($v->product->rate >= $i)
                                                    <i class="ion-android-star"></i>
                                                @else
                                                    <i class="ion-android-star-outline"></i>
                                                @endif
                                            @endfor

                                            <span class="count">{{$v->product->rating->count()}}</span>                                        </div> <!-- /.rating -->

                                        <div class="price">
                                            @if($v->product->variant->first()->sale_price > 0 AND \Carbon\Carbon::now()->between(\Carbon\Carbon::parse($v->product->variant->first()->sale_price_start), \Carbon\Carbon::parse($v->product->variant->first()->sale_price_end)))
                                                <div class="discount">
                                                    {{number_format($v->product->variant->first()->discount, 0, '.', '.')}}%
                                                </div> <!-- /.discount -->
                                            @endif

                                            <div class="nominal">
                                                {{--//DISCOUNT--}}
                                                @if($v->product->variant->first()->sale_price > 0 AND \Carbon\Carbon::now()->between(\Carbon\Carbon::parse($v->product->variant->first()->sale_price_start), \Carbon\Carbon::parse($v->product->variant->first()->sale_price_end)))
                                                    <div class="nominal-discount">
                                                        Rp {{number_format($v->product->variant->first()->sale_price, 0, ',', '.')}}
                                                    </div>
                                                @endif

                                                <div class="nominal-normal">
                                                    Rp {{number_format($v->product->variant->first()->price, 0, ',', '.')}}
                                                </div>
                                            </div> <!-- /.nominal -->
                                        </div> <!-- /.price -->
                                    </div> <!-- /.meta -->
                                </a> <!-- /.product item -->

                                @else

                            @endif
                        @empty
                            <br>
                            <br>
                            <br>
                            <em>Belum ada produk pada kategori ini</em>
                        @endforelse

                    </div> <!-- /.list similar -->

                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section> <!-- /.detail -->
    </main> <!-- /.main -->

@endsection