@extends('layouts.app_client')

@section('position')
    <li><a href="#0">{{ __('message.title.home') }}</a></li>
    <li><a href="#0">{{ __('message.user') }}</a></li>
    <li>{{ __('message.profile') }}</li>
@endsection

@section('content')

<!-- Content ================================================== -->
<div class="container margin_60_35">
    <div class="row">

        {!! Form::open(['method' => 'post', 'route' => ['user.update', $user->id], 'files' => true]) !!}
        <div class="col-md-4">
            <p><a class="btn_side">{{ __('message.avatar') }}</a></p>

            <div class="box_style_2 hidden-xs" id="help">
                <label for="avatar">
                    @if ($user->image)
                        <img class="img-circle" height="200px" src="{{ asset(config('asset.image_path.avatar') . $user->image) }}" alt="Card image cap">
                    @else
                        <img class="rounded-circle" height="200px" src="{{ asset('images/default.jpeg') }}" alt="Card image cap">
                    @endif
                </label>
                <p>{!! Form::file('avatar', ['id' => 'avatar', 'class' => 'hidden']) !!}</p>
                {!! Form::submit(__('message.update'), ['class' => 'btn_1 green']) !!}
            </div>

            <div class="box_style_2 hidden-xs" id="help">
                <i class="icon_lifesaver"></i>
                <h4>{{ __('message.help') }}</span></h4>
                <a href="tel://004542344599" class="phone">+45 423 445 99</a>
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
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', __('message.email')) !!}
                        {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', __('message.address')) !!}
                        {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', __('message.address')) !!}
                        {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone', __('message.phone')) !!}
                        {!! Form::text('phone', $user->phone, ['class' => 'form-control']) !!}
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
                        {!! Form::password('new_password', ['class' => 'form-control', 'id' => 'password1']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('re_password', __('message.password.change')) !!}
                        {!! Form::password('new_password', ['class' => 'form-control', 'id' => 'password2']) !!}
                    </div>
                    {!! Form::submit(__('message.update'), ['class' => 'btn_1 green']) !!}
                </div><!-- End wrapper_indent -->
        </div>
    </div><!-- End box_style_1 -->

    </div><!-- End col-md-6 -->

    {!! Form::close() !!}
    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

@endsection
