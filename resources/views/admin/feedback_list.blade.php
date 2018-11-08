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
                <table class="table table-bordered" id="bootstrap-data-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Người dùng</th>
                            <th scope="col">Sản phẩm </th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Trang thái</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td scope="row">{{ $feedback->id }}</td>
                                <td>{{ $feedback->user->name }}</td>
                                <td>{{ $feedback->product->name }}</td>
                                <td>{{ $feedback->content }}</td>
                                <td>{{ $feedback->status }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary" title="Respone"><i class="fa fa-edit"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();
        } );
    </script>
@endsection
