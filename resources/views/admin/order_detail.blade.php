@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.index')}}">{{ __('message.title.dashboard') }}</a></li>
    <li><a href="{{route('admin.order.index')}}">{{ __('message.order') }}</a></li>
    <li class="active">{{ __('message.order_title.detail') }}</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{ __('Đơn Hàng Chi Tiết' ) }}
            </div>

            <div class="card-body card-block">
                {!! Form::open(['route' => ['admin.order.update', $order->id], 'method' => 'post']) !!}
                <div class="row">
                    <div class="col-7">
                        <div class="row">
                            <div class="form-group col-6">
                                {!! Form::label('name', __('message.order_title.receiver'), ['class' => 'row col-12']) !!}
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    {!! Form::text('receiver', $order->receiver, ['id' => 'name', 'class' => 'form-control', 'placeholder' => __('message.order_title.receiver')]) !!}
                                    {!! Form::text('id', $order->id, ['hidden', 'id' => 'order_id']) !!}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                {!! Form::label('phone', __('message.order_title.phone_order'), ['class' => 'row col-12']) !!}
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    {!! Form::text('order_phone', $order->order_phone, ['id' => 'phone', 'class' => 'form-control', 'placeholder' => __('message.order_title.phone_order')]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                {!! Form::label('time', __('message.order_title.time_order'), ['class' => 'row col-12']) !!}
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    {!! Form::text('order_time', $order->order_time, ['id' => 'time', 'class' => 'form-control', 'placeholder' => __('message.order_title.time_order')]) !!}
                                </div>
                            </div>
                            <div class="form-group col-6">
                                {!! Form::label('address', __('message.order_title.address_order'), ['class' => 'row col-12']) !!}
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    {!! Form::text('order_place', $order->order_place, ['id' => 'address', 'class' => 'form-control', 'placeholder' => __('message.order_title.address_order')]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="form-group col-12">
                            {!! Form::label('note', __('message.order_title.note'), ['class' => 'row col-12']) !!}
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                {!! Form::textarea('note', $order->note, ['class' => 'form-control', 'rows' => 4, 'id' => 'note']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group  col-12">
                        {!! Form::label('note', __('message.order_title.status'), ['class' => 'row col-12']) !!}
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            {!! Form::radio('status', 1, ($order->status == 1), ['class' => 'form-check-input']) !!}{{ __('message.order_title.processed') }}
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            {!! Form::radio('status', 0, ($order->status == 0), ['class' => 'form-check-input']) !!}{{ __('message.order_title.unprocessed') }}
                            </label>
                        </div>
                        <div class="form-check-inline disabled">
                            <label class="form-check-label">
                            {!! Form::radio('status', -1, ($order->status == -1), ['class' => 'form-check-input']) !!}{{ __('message.order_title.canceled') }}
                            </label>
                        </div> 
                    </div>
                </div>
                <div class="row col-12">
                    {!! Form::submit(__('message.update'), ['class' => 'form-control col-1 btn btn-outline-info offset-11']) !!}
                </div>
                {!! Form::close() !!}
                <div class="card-block">
                    <div class="card-text">
                        {{ __('message.order_title.detail') }}
                    </div>
                    <br>
                    <table class="table table-bordered" id="detail_order_list" >
                        <tr>
                            <td>{{ __('message.order_detai_title.product') }}</td>
                            <td>{{ __('message.order_detai_title.size') }}</td>
                            <td>{{ __('message.order_detai_title.quantity') }}</td>
                            <td>{{ __('message.order_detai_title.topping') }}</td>
                            <td>{{ __('message.order_detai_title.price') }}</td>
                        </tr>
                        @foreach ($orderDetails as $detail)
                            <tr>
                                <td>
                                    <h3>{{ $detail->product->name }}</h3>
                                    <h4>{{ __('message.order_detai_title.price') . ': ' . number_format($detail->product->price) . ' vnđ' }}</h4>
                                </td>
                                <td>{{ $detail->size->name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>
                                    @foreach ($detail->toppings as $topping)
                                        <p>{{ $topping->name }}</p>
                                    @endforeach
                                </td>
                                <td id="price">{{ number_format($detail->price) . ' vnđ' }}</td>
                            </tr>
                        @endforeach 
                    </table>
                </div>
            </div>

            <div class="card-footer">
                <h3 class="offset-8 col-4">{{ __('message.order_detai_title.total') }}: <strong class="text text-danger" id="total"></strong></h3>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        var nf = new Intl.NumberFormat();
        $.ajax({
            url: route('admin.order.detail.json', {id: $('#order_id').val()}),
            type: 'get',
            dataType: '',
            data: '',
        })
        .done(function(res) {
            var total = 0;
            res.forEach( function(element, index) {
                total += element.price;
            });
            $('#total').html(nf.format(total) + ' vnđ');
        })
        .fail(function() {
            console.log("error");
        })
    </script>
@endsection
