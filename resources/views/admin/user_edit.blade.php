@extends('layouts.app2')

@section('page-title')
    <li><a href="{{route('admin.index')}}">{{ __('Dashboard') }}</a></li>
    <li><a href="{{route('admin.user.index')}}">{{ __('User list') }}</a></li>
    <li class="active">{{ __('message.update') }}</li>
@endsection

@section('content')

<div class="container-fluid">
    @if (session('success'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            {{ session('success') }}
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

    {!! Form::open(['method' => 'post', 'route' => ['admin.user.update', $user->id], 'files' => true]) !!}
        <div class="card-body row">
            @csrf

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <strong class="card-title mb-3">{{ __('Profile Card') }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto d-block text-center">
                            {!! Form::file('avatar', ['class' => 'd-none', 'id' => 'avatar']) !!}
                            <label for="avatar">
                                @if ($user->image)
                                    <img class="rounded-circle mx-auto d-block" src="{{ asset(config('asset.image_path.avatar') . $user->image) }}" alt="Card image cap">
                                @else
                                    <img class="rounded-circle mx-auto d-block" src="{{ asset('images/default.jpeg') }}" alt="Card image cap">
                                @endif
                            </label>
                            <h5 class="text-sm-center mt-2 mb-1"> {{ $user->name }} </h5>
                            <div class="location text-sm-center"><i class="fa fa-map-marker"></i> {{ $user->address }}</div>
                        </div>
                        <hr>
                        <div class="card-text text-sm-center">
                            <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                            <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                            <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                            <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                        </div>
                    </div>
                    @if (Auth::id() == $user->id)
                        {!! Form::submit(__('Change Avatar'), ['class' => 'btn btn-outline-info btn-lg btn-block']) !!}
                    @endif
                </div>
            </div>

            <div class="col-sm-7">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <strong class="card-title mb-3">{{ __('Base infomation') }}</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            {!! Form::label('name', __('Name'), ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('email', __('Email'), ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::email('email', $user->email, ['readonly', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('address', __('Addess'), ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('phone', __('Phone'), ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::number('phone', $user->phone, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('permission', __('Permission'), ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-4">
                                {!! Form::text('permission', $user->role->name, ['readonly' ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    @if (Auth::id() == $user->id)
                        {!! Form::submit(__('Update Information'), ['class' => 'btn btn-outline-info btn-lg btn-block']) !!}
                    @endif
                </div>
                @if (Auth::id() == $user->id || in_array($user->role_id, [2, 3]))
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <strong class="card-title mb-3">{{ __('Change password<') }}</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                {!! Form::label('password', __('New password'), ['class' => 'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('re_password', __('Re-password'), ['class' => 'col-sm-3 col-form-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::password('re_password', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        @if (Auth::id() == $user->id)
                            <button type="submit" class="btn btn-outline-info btn-lg btn-block">{{ __('Change password') }}</button>
                            {{-- {!! Form::submit(__('Change password'), ['class' => 'btn btn-outline-info btn-lg btn-block']) !!} --}}
                        @endif
                    </div>
                @endif
            </div>
        </div>
    {{-- {!! Form::close() !!} --}}
</div>
@endsection

@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@endsection
