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

        <div class="card-header">User infomation</div>

        <div class="card-body">
            <form action="{{ route('admin.user.update', $user->id) }}" method="post" class="form" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="name" class="pr-1  form-control-label">Name</label>
                    <input type="text" id="name" name="name"  class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email" class="px-1  form-control-label">Email</label>
                    <input type="email" id="email" readonly name="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="new_password" class="px-1  form-control-label">New password</label>
                    <input type="password" id="new_password" name="new_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="re_password" class="px-1 form-control-label">Re-password</label>
                    <input type="password" id="re_password" name="re_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address" class="px-1 form-control-label">Addess</label>
                    <input type="text" id="address" name="address"  class="form-control" value="{{$user->address}}">
                </div>
                <div class="form-group">
                    <label for="phone" class="px-1 form-control-label">Phone</label>
                    <input type="number" id="phone" name="phone" class="form-control" value="{{$user->phone}}">
                </div>
                <div class="form-group">
                    <label for="avatar" class="px-1 form-control-label">Avatar</label>
                    <input type="file" id="avatar" name="avatar">
                    @if ($user->image)
                        <p><img src="{{ asset('images/avatar/'.$user->image) }}" height="100px"></p>
                    @else
                        <p>User hasn't avatar !</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="role" class="px-1 form-control-label">Permission</label>
                    <select name="role" id="role" class="form-control">
                        @foreach ($roles as $r)
                            <option
                                value="{{$r->id}}"
                                @if ($r->id == $user->role_id)
                                    {{'checked'}}
                                @endif
                            >
                                {{ $r->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group float-right">
                    <button type="submit" class="btn btn-outline-success">Update</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
