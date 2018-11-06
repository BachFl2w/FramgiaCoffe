@extends('layouts.app2')

@section('page-title')
    List User
@endsection

@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">User infomation</div>

        <div class="card-body">
            <form action="{{ route('admin.user.update', $user->id) }}" method="post" class="form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="name" class="pr-1  form-control-label">Name</label>
                    <input type="text" id="name" name="name" required="" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="" class="px-1  form-control-label">Email</label>
                    <input type="email" id="" required="" class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="new_password" class="px-1  form-control-label">New password</label>
                    <input type="email" id="new_password" name="new_password" required="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="re_" class="px-1 form-control-label">Re-password</label>
                    <input type="email" id="" required="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="" class="px-1  form-control-label">Addess</label>
                    <input type="email" id="" required="" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="" class="px-1  form-control-label">Phone</label>
                    <input type="number" id="" required="" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="" class="px-1  form-control-label">Permission</label>
                    <select name="select" id="select" class="form-control">
                        @foreach ($roles as $r)
                            <option
                                value="{{$r->id}}"


                            >
                                {{ $r->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group float-right">
                    <button type="submit" class="btn btn-outline-success" title="show">Update</button>
                    <button type="reset" class="btn btn-warning" title="show">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
