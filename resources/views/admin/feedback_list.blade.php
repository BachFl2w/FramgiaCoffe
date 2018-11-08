@extends('layouts.app2')

@section('page-title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Quản Lý Phản Hồi
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="admin_role_list">
                    <tr>
                        <th>ID</th>
                        <th>Người dùng</th>
                        <th>Sản phẩm </th>
                        <th>Nội dung</th>
                        <th>Trang thái</th>
                    </tr>
                    @foreach($feedbacks as $feedback)
                        <tr>
                            <td>{{ $feedback->id }}</td>
                            <td>{{ $feedback->user->name }}</td>
                            <td>{{ $feedback->product->name }}</td>
                            <td>{{ $feedback->content }}</td>
                            <td>{{ $feedback->status }}</td>
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
