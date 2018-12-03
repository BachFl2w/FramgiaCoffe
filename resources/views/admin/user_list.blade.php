@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.index')}}">{{ __('message.title.dashboard') }}</a></li>
    <li class="active">{{ __('message.user') }}</li>
@endsection

@section('content')
<div class="animated fadeIn">
    <div class="rows">
        <div class="col-md-12">
            @if (session('success'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            @if (session('fail'))
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    {{session('fail')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">{{ __('message.user') }}</strong>
                    <div class="float-right">
                        <button data-toggle="modal" data-target="#myModal" class="btn btn-outline-info" title="show">{{ __('message.create') }}</button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="user_list" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">{{ __('message.name') }}</th>
                                <th scope="col">{{ __('message.email') }}</th>
                                <th scope="col">{{ __('message.address') }}</th>
                                <th scope="col">{{ __('message.phone') }}</th>
                                <th scope="col">{{ __('message.avatar') }}</th>
                                <th scope="col">{{ __('message.role') }}</th>
                                <th scope="col">{{ __('message.active') }}</th>
                                <th scope="col">{{ __('message.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                                <tr>
                                    <td scope="row">{{ $u->id }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->address }}</td>
                                    <td>{{ $u->phone }}</td>
                                    <td>
                                        @if ($u->image)
                                            <img src="{{ asset(config('asset.image_path.avatar') . $u->image) }}" height="80px">
                                        @else
                                            <img src="{{ asset(config('asset.image_path.default')) }}" height="80px">
                                        @endif
                                    </td>
                                    <td>{{ $u->role->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.active', $u->id) }}" id="active_user{{ $u->id }}">
                                            <label class="switch switch-3d switch-primary mr-3" for="active_user{{ $u->id }}">
                                                <input type="checkbox" class="switch-input" @if ($u->active == 1) {{ 'checked' }} @endif>
                                                <span class="switch-label"></span> <span class="switch-handle"></span>
                                            </label>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.user.edit', $u->id)}}" class="btn btn-outline-primary" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a data-id="{{ $u->id }}" class="btn btn-outline-danger destroy" id="destroy{{ $u->id }}" title="Remove"><i class="fa fa-remove"></i></a>
                                        {{-- <button data-id="{{ $u->id }}" class="btn btn-outline-danger destroy" title="Delete">
                                            <i class="fa fa-trash-o"></i>
                                        </button> --}}
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

<div id="myModal"class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('message.create') }}</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'admin.user.store' ,'method' => 'POST', 'class' => 'form', 'files' => true, 'id' => 'form_create_user']) !!}
                    <div class="form-group">
                        {!! Form::hidden('_token', csrf_token(), ['id' => '_token']) !!}
                        {!! Form::label('name', __('Name'), ['class' => 'pr-1 form-control-label']) !!}
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', __('Email'), ['class' => 'pr-1 form-control-label']) !!}
                        {!! Form::text('email', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', __('Password'), ['class' => 'pr-1 form-control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('re_password', __('Re-Password'), ['class' => 'pr-1 form-control-label']) !!}
                        {!! Form::password('re_password', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', __('Addess'), ['class' => 'pr-1 form-control-label']) !!}
                        {!! Form::text('address', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone', __('Phone'), ['class' => 'pr-1 form-control-label']) !!}
                        {!! Form::number('phone', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('avatar', __('Avatar'), ['class' => 'pr-1 form-control-label']) !!}
                        {!! Form::file('avatar', ['id' => 'avatar', 'name' => 'avatar']) !!}
                    </div>
                    <div class="form-group">
                        <label for="role" class="px-1 form-control-label">{{ __('message.permission') }}</label>
                        {!! Form::label('role', __('Permission'), ['class' => 'pr-1 form-control-label']) !!}
                        <select name="role" id="role" class="form-control">
                            @foreach ($roles as $r)
                                <option value="{{$r->id}}">{{ $r->name }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                {!! Form::button(__('message.close'), ['class' => 'btn btn-warning', 'data-dismiss' => 'modal']) !!}
                {!! Form::submit(__('message.create'), ['class' => 'btn btn-outline-success', 'id' => 'create_user']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    var table = $('#bootstrap-data-table').DataTable();

    $(document).ready(function() {
        table;
    } );

    // ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    $('#create_user').click(function (event) {
        event.preventDefault();
        $.ajax({
            url: route('admin.user.store'),
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            // data: $('#form_create_user').serialize(),
            data: new FormData($('form#form_create_user')[0]),
        })
        .done(function(data) {
            console.log(data.image);
            var image = data.image ? `<img src="http://127.0.0.1:8000/images/avatars/${data.image}" height="80px">` : `<img src="http://127.0.0.1:8000/images/default.jpeg" height="80px">`;
            var checked = (data.active == 1) ? "checked" : "";
            table.row.add([
                `<td scope="row">${data.id}</td>`,
                `<td>${data.name}</td>`,
                `<td>${data.email}</td>`,
                `<td>${data.address}</td>`,
                `<td>${data.phone}</td>`,
                `<td>${image}</td>`,
                `<td>${data.role.name}</td>`,
                `<td>
                    <form method="post" action="${route('admin.user.active', data.id)}" id="active_user">
                    <label class="switch switch-3d switch-primary mr-3" for="active_user${data.id}">
                        <input type="checkbox" class="switch-input" ${checked}>
                        <span class="switch-label"></span> <span class="switch-handle"></span>
                    </label>
                    <button id="active_user${data.id}" class="d-none"></button>
                    </form>
                </td>`,
                `<td>
                    <a href="${route('admin.user.edit', data.id)}" class="btn btn-outline-primary" title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="${route('admin.user.destroy', data.id)}" onclick="return confirm('Delete ?');" class="btn btn-outline-danger" title="Delete">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>`
            ]).draw( false );
            $('#myModal').modal('hide');
            swal({icon: 'success'});
            console.log("success");
        })
        .fail(function() {
            swal({icon: 'warning'});
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    });

    // $('.destroy').on('click', 'tbody tr', function(event) {
    $('.destroy').click(function (event) {
        console.log($(this).attr('data-id'));
        event.preventDefault();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: route('admin.user.destroy', $(this).attr("data-id")),
                    type: 'get',
                })
                .done(function(data) {
                    if (data == 'success') {
                        table.row( this ).delete();
                        swal("Poof! user has been deleted!", {
                            icon: "success",
                        });
                        console.log("success");
                    } else {
                        swal("Fail", {
                            icon: "error",
                        });
                        console.log("fail");
                    }
                })
                .fail(function() {
                    swal("Uppsss...!", {
                        icon: "error",
                    });
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    });
    // $('#myTable').on( 'click', 'tbody tr', function () {
    //     table.row( this ).delete();
    // } );
</script>
@endsection
