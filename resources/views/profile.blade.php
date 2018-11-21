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

        <div class="col-md-3">
            <p><a href="list_page.html" class="btn_side">{{ __('message.product') }}</a></p>
            <div class="box_style_1">
                <ul id="cat_nav">
                    <li><a href="#starters" class="active">Starters <span>(141)</span></a></li>
                    <li><a href="#main_courses">Main Courses <span>(20)</span></a></li>
                    <li><a href="#beef">Beef <span>(12)</span></a></li>
                    <li><a href="#desserts">Desserts <span>(11)</span></a></li>
                    <li><a href="#drinks">Drinks <span>(20)</span></a></li>
                </ul>
            </div><!-- End box_style_1 -->

            <div class="box_style_2 hidden-xs" id="help">
                <i class="icon_lifesaver"></i>
                <h4>Need <span>Help?</span></h4>
                <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                <small>Monday to Friday 9.00am - 7.30pm</small>
            </div>
        </div><!-- End col-md-3 -->

        <div class="col-md-6">
            <div class="box_style_2" id="main_menu">
                <h2 class="inner">{{ __('message.info') }}</h2>
                {!! Form::open(['method' => 'post', 'route' => ['user.update', $user->id]]) !!}
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                {!! Form::label('name', __('message.name')) !!}
                                {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                {!! Form::label('email', __('message.email')) !!}
                                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                {!! Form::label('address', __('message.address')) !!}
                                {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                {!! Form::label('phone', __('message.phone')) !!}
                                {!! Form::text('phone', $user->phone, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('password', __('message.password.change')) !!}
                                {!! Form::password('new_password', ['class' => 'form-control', 'id' => 'password1']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('re_password', __('message.password.change')) !!}
                                {!! Form::password('new_password', ['class' => 'form-control', 'id' => 'password2']) !!}
                            </div>
                        </div>
                    </div><!-- End row  -->
                    <div id="pass-info" class="clearfix"></div>
                    <hr>
                    <div class="text-center">
                        {!! Form::submit(__('message.submit'), ['class' => 'btn_full_outline']) !!}
                    </div>
                {!! Form::close() !!}
{{--                 <hr>
                {!! Form::open() !!}
                <h2>{{ __('message.feedback') }}</h2>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                {!! Form::label('name', __('message.content')) !!}
                                {!! Form::textarea('name', '', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        {!! Form::submit(__('message.send'), ['class' => 'btn_full_outline']) !!}
                    </div>
                {!! Form::close() !!} --}}
            </div><!-- End box_style_1 -->

            @if (session('success'))
                <div class="alert alert-success">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

        </div><!-- End col-md-6 -->

        <div class="col-md-3" id="sidebar">
            <div class="theiaStickySidebar">
                <div id="cart_box" >
                    <h3>{{ __('message.orderList') }}</h3>
                    <table class="table table-hover table_summary">
                        <tbody>
                            <tr>
                                <td>
                                    <a href="#0" class="btn-link">2018-11-02 09:39:12</a>
                                </td>
                                <td>
                                    <strong class="pull-right">125.000 ₫</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#0" class="btn-link">2018-11-02 09:39:12</a>
                                </td>
                                <td>
                                    <strong class="pull-right">125.000 ₫</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div><!-- End cart_box -->
            </div><!-- End theiaStickySidebar -->
        </div><!-- End col-md-3 -->


    </div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->

@endsection
