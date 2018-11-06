@extends('layouts.app2')

@section('page-title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Quản Lý Vai Trò
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="admin_role_list">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Content</th>
                        <th>Status</th>
                    </tr>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <button class="btn btn-outline-primary" title="show"><i class="fa fa-edit"></i></button>
                                <button title="Delete" class="btn btn-outline-danger"><i class="fa fa-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
