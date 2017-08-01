@extends('layouts.admin')
@section( 'title','Orders')
@section( 'page_title','Orders')

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

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Tgl</th>
                            <th>Item</th>
                            <th>Member</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $k => $v)
                            <tr>
                                <td>
                                    <code>{{date_format($v->updated_at, 'd F Y')}}  {{date_format($v->updated_at, 'H:i:s')}}</code>
                                </td>
                                <td>
                                    @foreach($v->item as $key => $value)
                                        <a href="{{url($value->variant->product->url)}}">
                                            <img src="{{$value->variant->product->primePhoto}}" width="50" class="pull-left" style="margin-right: 15px;" height="auto"> <strong>{{title_case($value->variant->product->brand . ' - ' . $value->variant->product->name . ' - ' . $value->variant->variant_name)}}</strong>
                                            <br>
                                            <strong>Qty:</strong> {{$value->qty}}<br>
                                            <strong>Price:</strong> {{number_format($value->variant->sale_price, 0, '.', '.')}}<br>
                                        </a>
                                    @endforeach
                                </td>
                                <td>{{$v->user->full_name}}</td>
                                <td>
                                    <strong>Pengiriman:</strong>
                                    <br>
                                    {!! $v->alamat_pengiriman !!}
                                    <br>
                                    {{--<strong>Penagihan:</strong>--}}
                                    {{--<br>--}}
                                    {{--{!! $v->alamat_penagihan !!}--}}
                                {{--</td>--}}
                                <td>
                                    @if($v->status == 0)
                                        <label class="label label-warning">Pending</label>
                                    @elseif($v->status == 1)
                                        <label class="label label-success">Success</label>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i class="fa fa-bars"></i>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="{{url('admin/order/detail/' . $v->hashid)}}"><i class="fa fa-list-alt"></i> Detail</a></li>
                                            <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#"><i class="fa fa-trash"></i> Delete</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
