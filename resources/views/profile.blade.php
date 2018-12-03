@extends('layouts.app_client')

@section('position')
    <li><a href="{{ route('client.index') }}">{{ __('message.title.home') }}</a></li>
    <li><a href="#0">{{ __('message.user') }}</a></li>
    <li>{{ __('message.profile') }}</li>
@endsection

@section('content')

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">

        {!! Form::open(['method' => 'post', 'route' => ['user.update', $user->id], 'files' => true]) !!}
        <div class="col-md-4">
            <a class="btn_side">{{ __('message.avatar') }}</a>
            <div class="box_style_2 hidden-xs" id="help">
                <label for="avatar">
                    @if ($user->image)
                        <img class="img-circle" height="200px" src="{{ asset(config('asset.image_path.avatar') . $user->image) }}">
                    @else
                        <img class="img-circle" height="200px" src="{{ asset('images/default.jpeg') }}">
                    @endif
                </label>
                <p>{!! Form::file('avatar', ['id' => 'avatar', 'class' => 'hidden']) !!}</p>
                {!! Form::submit(__('message.update'), ['class' => 'btn_1 green']) !!}
            </div>

            <div class="box_style_2 hidden-xs" id="help">
                <i class="icon_lifesaver"></i>
                <h4>{{ __('message.help') }}</span></h4>
                <a href="tel://004542344599" class="phone">{{ config('asset.constaint.phone') }}</a>
            </div>

        </div><!-- End col-md-3 -->
        <div class="col-md-8 col-sm-8 add_bottom_15 box_style_2">
            <div class="indent_title_in">
                <h3><i class="icon-user"></i> {{ __('message.info') }}</h3>
            </div>
            <div class="wrapper_indent">
                <div class="form-group">
                    {!! Form::label('name', __('message.name')) !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                    @if ($errors->has('name'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('email', __('message.email')) !!}
                    {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                    @if ($errors->has('email'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('address', __('message.address')) !!}
                    {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
                    @if ($errors->has('address'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('phone', __('message.phone')) !!}
                    {!! Form::text('phone', $user->phone, ['class' => 'form-control']) !!}
                    @if ($errors->has('phone'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
                {!! Form::submit(__('message.update'), ['class' => 'btn_1 green']) !!}
            </div><!-- End wrapper_indent -->
            <hr>
            <div class="indent_title_in">
                <h3><i class="icon_lock_alt"></i> {{ __('message.password.change') }}</h3>
            </div>
            <div class="wrapper_indent">
                <div class="form-group">
                    {!! Form::label('password', __('message.password.change')) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'id' => 'password1']) !!}
                    @if ($errors->has('password'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('re_password', __('message.password.change')) !!}
                    {!! Form::password('re_password', ['class' => 'form-control', 'id' => 'password2']) !!}
                     @if ($errors->has('re_password'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('re_password') }}</strong>
                        </span>
                    @endif
                </div>
                {!! Form::submit(__('message.update'), ['class' => 'btn_1 green']) !!}
            </div><!-- End wrapper_indent -->
        </div>
    {!! Form::close() !!}
    </div><!-- End box_style_1 -->

</div><!-- End container -->
<!-- End Content =============================================== -->

@endsection
