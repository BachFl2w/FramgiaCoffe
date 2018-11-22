@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.role.index')}}">Dashboard</a></li>
    <li class="active">{{ __('message.role') }}</li>
@endsection

@section('content')
    @if (session('success'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Quản Lý Vai Trò</strong>
            </div>

            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td scope="row">{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
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
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

@endsection
