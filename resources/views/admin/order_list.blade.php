@extends('layouts.app2')

@section('content')
<div class="animated">
    <div class="rows">
        <div class="card">
            <div class="card-header">
                {{ __('Quản Lý Đơn Hàng ') }}

            </div>

            <div class="card-body">
                <table class="table table-bordered" id="admin_order_list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mã Khách Hàng</th>
                            <th>Tên Người nhận</th>
                            <th>Thời Gian Đặt Hàng</th>
                            <th>Địa Điểm Đặt Hàng</th>
                            <th>Điện Thoại Đặt Hàng</th>
                            <th>Trạng Thái</th>
                            <th>Ghi Chú</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
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
@section('script')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });

            var order_table = $('#admin_order_list').DataTable({
                ajax: {
                    url: route('admin.order.list.json'),
                    dataSrc: '',
                    type: 'get',
                },
                columns: [
                    { data: 'id' },
                    { data: 'user_id' },
                    { data: 'receiver' },
                    {
                        data: 'order_time',
                        render: function(data, type, row){
                        if(type === "sort" || type === "type"){
                            return data;
                        }
                        return moment(data).format("DD-MM-YYYY HH:mm");
                    }
                    },
                    { data: 'order_place' },
                    { data: 'order_phone' },
                    {
                        data: 'status',
                        render: function(data, type, row){
                            if(data == 0)
                                return 'Chưa xử lý';
                            else
                                return 'Đã xử lý';
                        }
                    },
                    { data: 'note' },
                    {
                        data: 'id',
                        render: function(data)
                        {
                            var url = route('admin.order.detail', {id: data});
                            return '<a class="btn btn-outline-primary" href="'+ url +'"><i class="fa fa-info fa-4"></i></a> ' +
                            '<button class="btn btn-outline-danger" title="Delete" id="btnOrderorder"><i class="fa fa-trash-o"></i></button> '
                        }
                    },
                ],
            });


        });
    </script>
@endsection
