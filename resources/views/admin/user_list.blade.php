@extends('layouts.app2')

@section('page-title')
    List User
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
                    <strong class="card-title">Quản Lý User</strong>
                    <div class="float-right">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-outline-info" title="show">Create</a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Addess</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                                <tr>
                                    <th scope="row">{{ $u->id }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->address }}</td>
                                    <td>{{ $u->phone }}</td>
                                    <td>
                                        @if ($u->image)
                                        <img src="{{ asset('images/avatar/'.$u->image) }}" height="100px">
                                        @else
                                            {{'null'}}
                                        @endif
                                    </td>
                                    <td>{{ $u->role->name }}</td>
                                    <td>
                                        <a href="{{route('admin.user.edit', $u->id)}}" class="btn btn-outline-primary" title="View"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.user.destroy', $u->id)}}" class="btn btn-outline-danger" title="Delete"><i class="fa fa-edit"></i></a>
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
