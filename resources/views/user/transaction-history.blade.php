@extends('layouts.master')
@section('title', 'Transaction History | ' . config('app.name'))


@section('css')
    <style>
        .projects-box {
            padding-top: 10px;
            padding-bottom: 30px;
        }
        .projects-box h2 {
            margin-left: auto;
            margin-right: auto;
        }
        .projects-box .home-projects {
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .projects-box .home-project-content {
            display: block;
            position: relative;
        }
        .projects-box .home-project-image {
            display: block;
        }

        .projects-box .home-project-info {
            background-color: rgba(0,0,0,0.7);
            color: rgba(255,255,255,1);
            position: absolute;
            top: 0;
            left: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            text-align: center;
            display: inline-block;
        }
    </style>
@endsection

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
                                @forelse($orders as $k => $v)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <small>No. Tagihan</small><br>
                                                    {{$v->hashid}}
                                                </div>
                                                <div class="col-md-3">
                                                    <small>Total Pembayaran</small><br>
                                                    Rp. {{number_format($v->grand_total, 0, '.', '.')}}
                                                </div>
                                                <div class="col-md-3">
                                                    <small>Status Tagihan</small><br>
                                                    @if($v->status == 0)
                                                        <label class="label label-warning">Pending</label>
                                                    @elseif($v->status == 1)
                                                        <label class="label label-success">Success</label>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="{{url('payment/invoice/' . $v->hashid)}}" class="btn btn-default  btn-sm btn-block btn-flat">Lihat Detail</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <small>BARANG</small><br>
                                                    <a href="{{url('payment/invoice/' . $v->hashid)}}">
                                                        <img src="{{$v->item->first()->variant->product->primePhoto}}" width="30" class="pull-left" style="margin-right: 5px;" height="auto" title="{{title_case($v->item->first()->variant->product->brand . ' - ' . $v->item->first()->variant->product->name . ' - ' . $v->item->first()->variant->variant_name)}}">
                                                        @if(count($v->item) > 1)
                                                            <strong>
                                                                <small style="text-decoration: underline">
                                                                    +{{(count($v->item) - 1)}} lagi
                                                                </small>
                                                            </strong>
                                                        @endif
                                                        {{--<strong>{{title_case($v->item->first()->variant->product->brand . ' - ' . $v->item->first()->variant->product->name . ' - ' . $v->item->first()->variant->variant_name)}}</strong>--}}
                                                    </a>
                                                </div>
                                                <div class="col-md-3">
                                                    <small>Status Order</small>
                                                </div>
                                                <div class="col-md-3">

                                                </div>
                                                <div class="col-md-3">
                                                    @if($v->status == 0)
                                                        <a href="{{url('payment/konfirmasi/' . $v->hashid)}}" class="btn btn-danger btn-sm btn-block btn-flat">Konfirmasi Pembayaran</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @empty
                                            <em>Belum ada order</em>
                                @endforelse
                            <div class="text-center">{{$orders->links()}}</div>
                        </div>
                    <!-- /.inner -->
                    </div>
                <!-- /.col-md-9 -->
                </div>
            <!-- /.row -->
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /.profile -->

@endsection