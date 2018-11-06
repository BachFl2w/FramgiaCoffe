@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.role.index')}}">Dashboard</a></li>
    <li class="active">List Role</li>
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
                                        <button class="btn btn-outline-primary" title="show"><i class="fa fa-edit"></i></button>
                                        <button title="Delete" class="btn btn-outline-danger"><i class="fa fa-edit"></i></button>
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
    <script src="{{ asset('js/customer.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ asset('admin_template/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins.js')}}"></script>
    <script src="{{ asset('admin_template/assets/js/main.js')}}"></script>


    <script src="{{ asset('admin_template/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/lib/data-table/datatables-init.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
@endsection
