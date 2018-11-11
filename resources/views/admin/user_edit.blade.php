@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.user.index')}}">Dashboard</a></li>
    <li><a href="{{route('admin.user.index')}}">User</a></li>
    <li class="active">Edit</li>
@endsection

@section('content')

<div class="container-fluid">
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

    @if (count($errors) > 0)
        @foreach ($errors->all() as $e)
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                {{ $e }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endforeach
    @endif

    <div class="card">

        <div class="card-header">
            @if (Auth::id() == $user->id)
                Your infomation
            @else
                User infomation
            @endif
        </div>

        <form action="{{ route('admin.user.update', $user->id) }}" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="col-sm-4">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            @if ($user->image)
                                <p><img src="{{ asset('images/avatar/'.$user->image) }}" class="shadow bg-white user-avatar rounded-circle" width="95%"></p>
                            @else
                                <p><img src="{{ asset('images/default.jpeg') }}" alt="User Avatar" class="shadow bg-white" width="95%"></p>
                            @endif
                            @if (Auth::id() == $user->id)
                                <p><input type="file" id="avatar" name="avatar"></p>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Change Avatar</button>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="card">
                        <div class="card-header">
                            Base infomation
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label ">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label ">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" id="email" readonly name="email" class="form-control" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-3 col-form-label ">Addess</label>
                                <div class="col-sm-9">
                                    <input type="text" id="address" name="address"  class="form-control" value="{{$user->address}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 col-form-label ">Phone</label>
                                <div class="col-sm-9">
                                    <input type="number" id="phone" name="phone" class="form-control" value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role" class="col-sm-3 col-form-label ">Permission</label>
                                <div class="col-sm-2">
                                    <input type="email" id="email" readonly name="email" class="form-control" value="{{$user->role->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">

                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-info">Update Information</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Auth::id() == $user->id || in_array($user->role_id, [2, 3]))
                        <div class="card">
                            <div class="card-header">
                                Change password
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label ">New password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="password" name="password" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="re_password" class="col-sm-3 col-form-label ">Re-password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="re_password" name="re_password" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">

                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-info">Change password</button>
                                            <button type="reset" class="btn btn-warning">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
