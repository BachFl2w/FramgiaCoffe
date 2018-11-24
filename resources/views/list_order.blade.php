@extends('layouts.app_client')

@section('position')
    <li><a href="#0">{{ __('message.title.home') }}</a></li>
    <li class="active"><a>{{ __('message.order') }}</a></li>
@endsection

@section('content')
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-md-3">

                <div class="box_style_2 hidden-xs info">
                    <h4 class="nomargin_top">Delivery time <i class="icon_clock_alt pull-right"></i></h4>
                    <p>
                        Delivery only in 30'
                    </p>
                    <hr>
                    <h4>Secure payment <i class="icon_creditcard pull-right"></i></h4>
                    <p>
                        Payment method is diverse
                    </p>
                </div><!-- End box_style_1 -->

                <div class="box_style_2 hidden-xs" id="help">
                    <i class="icon_lifesaver"></i>
                    <h4>{{ __('message.need_help') }}</h4>
                    <a href="tel://004542344599" class="phone">{{ config('asset.constaint.phone') }}</a>
                    <small>{{ __('message.monday') }} {{ __('message.to') }} {{ __('message.friday') }} {{ config('asset.constaint.time_help') }}</small>
                </div>

            </div><!-- End col-md-3 -->

            <div class="col-md-9">
                <div class="box_style_2" id="order_process">
                    <h2 class="inner">Your Orders</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Receiver</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->receiver }}</td>
                                <td>{{ $order->order_place }}</td>
                                <td>{{ $order->order_phone }}</td>
                                <td>{{ date('d/m/Y h:m:s',strtotime($order->order_time)) }}</td>
                                <td width="8%">
                                    @switch ($order->status) 
                                       @case(-1)
                                            <p style="background-color: red;border-radius: 10px">{{ 'Canceled' }}</p>
                                            @break
                                        @case(1)
                                            <p style="background-color: green;border-radius: 10px">{{ 'Success' }}</p>
                                            @break
                                        @default
                                            <p style="background-color: #FFA500;border-radius: 10px;padding-inline-start: 5px;padding-inline-end: 5px;padding-top: 2px;padding-bottom: 2px">{{ 'UnProcess' }}</p>
                                            @break
                                    @endswitch
                                </td>
                                <td width="17%">
                                    <button class="btn btn-outline-warning">edit</button>
                                    <button class="btn btn-outline-danger">trash</button>
                                </td>
                            <tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- End box_style_1 -->
            </div><!-- End col-md-6 -->

        </div><!-- End row -->
    </div><!-- End container -->
    <!-- End Content =============================================== -->
@endsection
