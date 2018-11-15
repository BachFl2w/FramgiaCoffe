@extends('layouts.app2')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{ __('Đơn Hàng Chi Tiết' ) }}
            </div>

            <div class="card-body card-block">
                <div class="row">
                    <div class="form-group col-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Người Nhận Hàng">
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Số người nhận">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Người Nhận Hàng">
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Người Nhận Hàng">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
            </div>
        </div>
    </div>

    <div class="modal fade" id="OrderModal" data-backdrop="false" role="dialog" aria-labelledby="OrderModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalTitle">Hóa đơn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="order_group_id">
                        <label for="id" class="px-1 form-control-label">ID</label>
                        <input type="text" id="order_id" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name" class="px-1 form-control-label">Thể loại</label>
                        <input type="text" id="order_name" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnSubmitorder">Xác Nhận</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                </div>
            </div>
        </div>
    </div>
@endsection
