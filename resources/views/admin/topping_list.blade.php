@extends('layouts.app2')

@section('page-title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{__('Quản Lý Topping')}}

                <button class="float-right btn btn-outline-primary" data-toggle="modal"
                        data-target="#ToppingModal" id="btnCreateTopping">Create</button>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="admin_topping_list">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Topping</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Chức Năng</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ToppingModal" tabindex="-1" role="dialog"  aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới topping</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="topping_group_id">
                        <label for="id" class="px-1 form-control-label">ID</label>
                        <input type="text" id="topping_id" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name" class="px-1 form-control-label">Topping</label>
                        <input type="text" id="topping_name" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name" class="px-1 form-control-label">Price</label>
                        <input type="number" id="topping_price" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name" class="px-1 form-control-label">Quantity</label>
                        <input type="number" id="topping_quantity" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnSubmitTopping">Xác Nhận</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                </div>
            </div>
        </div>
    </div>
@endsection
