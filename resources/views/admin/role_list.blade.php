@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.role.index')}}">Dashboard</a></li>
    <li class="active">List Role</li>
@endsection

@section('content')
    {{--<div class="container-fluid">--}}
        {{--<div class="card">--}}
            {{--<div class="card-header">--}}
                {{--{{__('Quản Lý Vai Trò')}}--}}

                {{--<button class="float-right btn btn-outline-primary" data-toggle="modal"--}}
                 {{--data-target="#RoleModal" id="btnCreateRole">Create</button>--}}
            {{--</div>--}}

            {{--<div class="card-body">--}}
                {{--<table class="table table-bordered" id="admin_role_list">--}}
                    {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>ID</th>--}}
                            {{--<th>Role</th>--}}
                            {{--<th>Action</th>--}}
                        {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                        {{-- @foreach($roles as $role)--}}
                            {{--<tr>--}}
                                {{--<td>{{ $role->id }}</td>--}}
                                {{--<td>{{ $role->name }}</td>--}}
                                {{--<td>--}}
                                    {{--<button class="btn btn-outline-primary" title="show"><i class="fa fa-edit"></i></button>--}}
                                    {{--<button title="Delete" class="btn btn-outline-danger"><i class="fa fa-edit"></i></button>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach --}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="modal fade" id="RoleModal" role="dialog" aria-labelledby="RoleModalTitle" aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-dialog-centered" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="exampleModalLongTitle">Thêm mới vai tro</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="form-group" id="role_group_id">--}}
                        {{--<label for="id" class="px-1 form-control-label">ID</label>--}}
                        {{--<input type="text" id="role_id" required class="form-control">--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label for="name" class="px-1 form-control-label">Vai Tro</label>--}}
                        {{--<input type="text" id="role_name" required class="form-control">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-primary" id="btnSubmitRole">Xác Nhận</button>--}}
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@if (session('success'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif

<div class="animated fadeIn">
    <div class="rows">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Quản Lý Vai Trò</strong>
                    <div class="float-right">
                        <button class="btn btn-outline-info" title="show">Create</button>
                    </div>
                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td scope="row">{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <button title="edit" class="btn btn-outline-danger"><i class="fa fa-edit"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

@endsection
