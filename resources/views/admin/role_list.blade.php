@extends('layouts.app2')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Quản Lý Vai Trò</div>

            <div class="card-body">
                <table class="table table-bordered" id="admin_role_list">
                    <tr>
                        <th>ID</th>
                        <th>Vai Trò</th>
                        <th>Action</th>
                    </tr>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <button class="btn btn-outline-primary"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-outline-danger"><i class="fa fa-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
