@extends('layouts.app2')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{ __('Quản Lý Thể loại')}}

                <button class="float-right btn btn-outline-primary" data-toggle="modal"
                 data-target="#CategoryModal" id="btnCreateCategory">Create</button>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="admin_category_list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thể loại</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="CategoryModal" role="dialog" aria-labelledby="CategoryModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới thể loại</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="category_group_id">
                        <label for="id" class="px-1 form-control-label">ID</label>
                        <input type="text" id="category_id" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name" class="px-1  form-control-label">Thể loại</label>
                        <input type="text" id="category_name" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnSubmitCategory">Xác Nhận</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                </div>
            </div>
        </div>
    </div>
@endsection
