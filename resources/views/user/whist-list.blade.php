@extends('layouts.master')
@section('title', 'Whist List | ' . config('app.name'))

@section('content')
    <section class="section-profile">
        <div class="container">
            <div class="row row-sm-height no-margin">

                @include('user.sidebar')

                <div class="col-xs-12 col-sm-8 col-md-9 col-sm-height no-padding">
                    <div class="section-profile-inner">
                        <div class="section-profile-banner ratio ratio-full">
                            <img alt="Banner" class="ratio-image" src="assets/images/banner-slider.png"/>
                        </div>
                        <!-- /.banner -->
                        <div class="section-profile-content" >
                            <div class="panel panel-default">
                                <div class="panel-heading">Whist List</div>
                                <table class="table table-stripped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($user->whistList as $k => $v)
                                        <tr>
                                            <td>{{($k+1)}}</td>
                                            <td>
                                                <img class="img-bordered-sm" src="{{$v->variant->product->primePhoto}}" alt="{{$v->variant->product->name}}" width="120" height="auto"/>
                                                <a href="{{url($v->variant->product->url)}}" class="">
                                                    {{title_case($v->variant->product->brand)}} - {{title_case($v->variant->product->name)}} {{title_case($v->variant->variant_name)}}
                                                </a> <!-- /.media -->
                                            </td>
                                            <td>
                                                <button class="btn btn-flat btn-danger"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3">
                                                <div class="alert alert-info">Anda belum memiliki whist list</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.content -->
                    </div>
                    <!-- /.inner -->
                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.profile -->

@endsection

