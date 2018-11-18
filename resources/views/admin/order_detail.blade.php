@extends('layouts.app2')

@section('content')
        <div class="card">
            <div class="card-header bg-info text-light">
                {{ __('Đơn Hàng Chi Tiết' ) }}
            </div>

            <div class="card-body card-block">
                <div class="row">
                    <div class="col-7">
                        <div class="row">
                            <div class="form-group col-6">
                                <input type="text" id="order_id" hidden value="{{ $order->id }}">
                                <label class="row col-12">Tên Người Nhận</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" name="name" value="{{ $order->receiver }}" class="form-control" placeholder="Người Nhận Hàng">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label class="row col-12">Số Điện Thoại</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" name="name" value="{{ $order->order_phone }}" class="form-control" placeholder="Số người nhận">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="row col-12">Thời Gian Nhận Hàng</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="datetime" name="name" value="{{ $order->order_time }}" class="form-control" placeholder="Người Nhận Hàng">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label class="row col-12">Địa Điểm Nhận Hàng</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="datetime" name="name" value="{{ $order->order_place }}" class="form-control" placeholder="Người Nhận Hàng">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="form-group col-12">
                            <label class="row col-12">Ghi chú</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <textarea type="text" name="message" rows="4" class="form-control" placeholder="Message">{{ $order->note }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                </div>
                @if($order->note)
                <div class="row">
                    <div class="col-9">
                        <label class="col-form-label">Trạng Thái Đơn Hàng:</label>
                        <div class="form-check-inline">
                             <label class="form-check-label">
                                <input type="radio" name="status" class="form-check-input" value="1" @if ($order->status == 1) {{ 'checked' }}@endif >Đã Giao Hàng
                            </label>
                        </div>
                        <div class="form-check-inline">
                             <label class="form-check-label">
                                <input type="radio" name="status" class="form-check-input" value="0" @if ($order->status == 0) {{ 'checked' }}@endif>Chưa Xác Nhận
                            </label>
                        </div>
                        <div class="form-check-inline">
                             <label class="form-check-label">
                                <input type="radio" name="status" class="form-check-input" value="-1" @if ($order->status == -1) {{ 'checked' }}@endif>Bị Hủy
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-success">Cập Nhập Thông Tin</button>
                    </div>
                </div> 
                @endif
                <br>

                <div class="card-block">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text text-center text-info">Chi Tiết Hóa Đơn</h3>
                        </div>
                    </div>
                    <br>
                    
                    <table class="table table-bordered" id="detail_order">
                        @foreach ($orderDetails as $orderDetail)
                        <tr>
                            <td>
                                {{ $orderDetail->id}}
                            </td>
                            <td width="27%">
                                <a href="">
                                    <img src="{{ asset(config('asset.image_path.product'). $orderDetail->image) }}" class="img-thumbnail">
                                </a>
                            </td>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-9">
                                        <a href="" class="text-dark detail-element-product_name" >{{ $orderDetail->product->name }}</a>
                                        <p>{{ number_format($orderDetail->product->price) }} ₫</p>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group bootstrap-touchspin input-group">
                                            <h6 class="detail-element-label_quantity col-form-label">Số lượng: </h6>
                                            <div class="input-group">
                                                @if($order->status)
                                                <input type="text" id="quantity" class="form-control text-center detail-element-input_quantity" name="quantity" value="{{ $orderDetail->quantity }}" readonly>
                                                @else
                                                <span class="input-group-btn">
                                                    <button type="buttons" id="quantity-down" class="form-control quantity-down btn-outline-primary">-</button>
                                                </span>
                                                <input type="text" id="quantity" class="form-control text-center detail-element-input_quantity" name="quantity" value="{{ $orderDetail->quantity }}">
                                                <span class="input-group-btn">
                                                    <button type="buttons" id="quantity-up" class="form-control quantity-up btn-outline-primary">+</button>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div>
                                    <h4 class="text-dark detail-element-label_topping">Topping</h4>
                                    <div class="row">
                                    @if (count($orderDetail->toppings) <=0)
                                        <div class="col-4 detail-element-topping-element">
                                            <p class="text text-gray-dark col-form-label">Không có topping</p>
                                        </div>
                                    @else
                                        @foreach($orderDetail->toppings as $topping)
                                            <div class="col-4 detail-element-topping-element">
                                                <h6 class="text-center detail-element-topping_name">{{ $topping->name }}</h6>
                                            </div>
                                        @endforeach
                                    @endif
                                    </div>
                                </div>
                            </td>
                            <td width="15%">
                                <div class="text-info">
                                    <p class="text-primary detail-element-label_total">Thành tiền: </p>
                                    <strong class="detail-element-total" id="price">{{ number_format($orderDetail->price) }} ₫</strong>
                                </div>
                            </td>
                            <td width="10%">
                                <button class="btn btn-success form-group"><i class="fa fa-edit" style=""></i></button>

                                <button class="btn btn-danger form-group" onclick="confirm('Xóa?')"><i class="fa fa-trash fa-2" style=""></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <div class="card-footer">
                <div class="offset-7">
                    <div class="row col-12">
                        <h3 class="text-info col-5">Tổng Tiền:</h3>
                        <h3 class="col-7 detail-element-total" id="total"></h3>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('script')
    <script type="text/javascript">

        jQuery(document).ready(function($) {

            var nf = new Intl.NumberFormat();

            toastr.options.timeOut = 4000;
            toastr.extendedTimeOut = 500;

            var order_id = $('#order_id').val();

            total();

            function total()
            {
                $.ajax({
                    url: route('admin.order.detail.json', { id: order_id }),
                    type: 'get',
                    dataType: '',
                     data: {},
                })
                .done(function(res) {
                    var arr = Object.entries(res);

                    var total = 0;

                    arr.forEach( function(element, index) {
                        total += element[1].price;
                    });

                    $('#total').html(nf.format(total) + ' ₫');;
                })
            }

            var order_id = $('#order_id').val();

            $('#detail_order tbody').on('click', '#quantity-down', function(event) {

                event.preventDefault();

                var row = $(this).closest('tr');

                var detail_id = row.find('td:eq(0)').text();

                var quantity = row.find('#quantity').val();

                if(quantity == 1) {

                    alert('Giam cc');
                }
                else {

                    var quantity_new = quantity -1;

                    $.ajax({
                        url: route('admin.order.detail.update_quantity'),
                        type: 'get',
                        dataType: '',
                        data: { id: detail_id, quantity: quantity_new },
                    })
                    .done(function(res) {
                        $.ajax({
                            url: route('admin.order.detail.show'),
                            type: 'get',
                            dataType: '',
                            data: { order_id: order_id, detail_id: detail_id },
                        })
                        .done(function(data) {
                            row.find('#quantity').val(data.quantity);
                            row.find('#price').html(nf.format(data.price) + ' ₫');
                            total();
                            toastr.success('Sửa Thành Công !');
                        })
                        .fail(function() {
                            toastr.error('Có Lỗi Xảy Ra !');
                        })
                    })
                    .fail(function() {
                        toastr.error('Có Lỗi Xảy Ra !');
                    })
                }
            });

            $('#detail_order tbody').on('click', '#quantity-up', function(event) {

                event.preventDefault();

                var row = $(this).closest('tr');

                var id = row.find('td:eq(0)').text();

                var quantity = row.find('#quantity').val();

                var quantity_new = quantity + 1;

                $.ajax({
                    url: route('admin.order_detail.update_quantity', { id: id }),
                    type: 'post',
                    dataType: '',
                    data: { quantity: quantity_new },
                })
                .done(function() {
                    $.ajax({
                        url: route('admin.order.detail.json', { id: order_id, detail_id: id }),
                        type: 'get',
                        dataType: '',
                        data: {},
                    })
                    .done(function(data) {
                        
                        row.find('#quantity').val(data.quantity);
                        row.find('#price').html(nf.format(data.price) + ' ₫');
                        total();
                        toảt.success('Sửa Thành Công !');
                    })
                    .fail(function() {
                        toastr.success('Có Lỗi Xảy Ra !');
                    })
                })
                .fail(function() {
                    toastr.error('Có Lỗi Xảy Ra !');
                })
            });
        });
        
    </script>
@endsection
