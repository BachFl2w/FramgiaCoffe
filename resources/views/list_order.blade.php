@extends('layouts.app_client')

@section('position')
    <li><a href="{{ route('client.index') }}">{{ __('message.title.home') }}</a></li>
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
                    <table class="table table-bordered" id="order_list">
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
                                <td id="order_id">{{ $order->id }}</td>
                                <td>{{ $order->receiver }}</td>
                                <td>{{ $order->order_place }}</td>
                                <td>{{ $order->order_phone }}</td>
                                <td>{{ date('d/m/Y h:m:s', strtotime($order->order_time)) }}</td>
                                <td width="8%">
                                    @switch ($order->status)
                                        @case(-1)
                                        {{ 'Canceled' }}
                                        @break
                                        @case(1)
                                        {{ 'Success' }}
                                        @break
                                        @default
                                        {{ 'UnProcess' }}
                                        @break
                                    @endswitch
                                    <input type="text" id="status_order" hidden value="{{ $order->status }}">
                                </td>
                                <td width="20%">
                                    <a id="detail_order" class="btn btn-outline-warning" href="">Detail</a>
                                    @if($order->status == 0)
                                        <a id="cancel_order" class="btn btn-outline-warning" href="">Cancel</a>
                                    @endif
                                </td>
                            <tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <div class="modal fade" id="myModal">
        <div class="modal-dialog" style="max-width: 700px;margin-top: 100px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title">Detail Order <span id="order_status"></span></h4>
                </div>
                <div class="modal-body">
                    <table class="table" id="order_detail">
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <h4><span style="float: left;" id="totals"></span></h4>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            
            $('#order_list tbody').on('click', '#edit_order', function (event) {
                event.preventDefault();
                var row = $(this).closest('tr');
                var td = row.find('#status_order').val();
                if (td == 1) {
                    alert("Order in process. Can't not update");
                }
            });

            $('#order_list tbody').on('click', '#detail_order', function (event) {
                var nf = new Intl.NumberFormat();
                event.preventDefault();
                var row = $(this).closest('tr');
                id = row.find('td:eq(0)').text();
                $.ajax({
                    url: route('client.order.order_detail', {order_id: id}),
                    type: 'get',
                    dataType: '',
                    data: {},
                })
                    .done(function (res) {
                        var html = '';
                        var totals = 0;
                        res.forEach(function (element) {
                            html += '<tr>' +
                                '<td width="20%">' +
                                '<img class="img-thumbnail" src="{{ asset('images/products/2.jpg') }}">' +
                                '</td>' +
                                '<td>' + element.product.name + '</td>' +
                                '<td width="46%">';
                            var price = element.product_price;
                            element.toppings.forEach(function (element) {
                                html += '<span style="padding:5px;display: inline-block;background-color: #F0F8FF;border-radius: 10px;margin-left: 5px;margin-bottom: 5px">' +
                                    element.name +
                                    '</span>';
                                price += element.pivot.topping_price;
                            });
                            html += '</td>' +
                                '<td width="13%">' + nf.format(price) + ' ₫' + '</td>' +
                                '</tr>';
                            $('#order_detail tbody').empty();
                            $('#order_detail tbody').html(html);
                            totals += price;
                        });
                        $('#totals').empty();
                        $('#totals').append('<span style="color: red";font-weight: bold>Totals: </span>' + nf.format(totals) + ' ₫');

                    })
                    .fail(function () {
                        console.log("error");
                    })

                $("#myModal").modal("show");
            });

            $('#order_list tbody').on('click', '#cancel_order',function (event) {
                event.preventDefault();
                var row = $(this).closest('tr');
                var order_id = row.find('td:eq(0)').text();
                $.ajax({
                    url: route('client.order.cancel_order', { order_id: order_id }),
                    type: 'get',
                    dataType: '',
                    data: {},
                })
                .done(function() {
                    alert('Order is cancel');
                    row.find('td:eq(5)').text('Canceled ');
                })
                .fail(function() {
                    alert('Error when process');
                })
            });
        });
    </script>
@endsection
