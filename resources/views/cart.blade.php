@extends('layouts.app_client')

@section('position')
    <li><a href="#0">{{ __('message.title.home') }}</a></li>
    <li class="active"><a>{{ __('message.hot_product') }}</a></li>
@endsection

@section('content')
<div class="container margin_60_35">
    <div class="row">
        <div class="col-md-8 col-sm-8 add_bottom_15 box_style_2">
            <div class="indent_title_in">
                <h3><i class="icon-user"></i> {{ __('message.info') }}</h3>
            </div>
            <div class="wrapper_indent">
                {!! Form::open(['method' => 'post', 'route' => 'user.checkout']) !!}
                    @if (!Auth::user())
                        {!! Form::hidden('user_id', '', ['class' => 'hidden']) !!}
                    @else
                        {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'hidden']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('name', __('message.name')) !!}
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', __('message.address')) !!}
                        {!! Form::text('address', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', __('message.address')) !!}
                        {!! Form::text('address', '', ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone', __('message.phone')) !!}
                        {!! Form::text('phone', '', ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit(__('message.update'), ['class' => 'btn_1 green']) !!}
                {!! Form::close() !!}
            </div><!-- End wrapper_indent -->
        </div>
        <div class="col-md-4" id="sidebar">
            <div class="theiaStickySidebar">
                <div id="cart_box" >
                    <h3>Your order <i class="icon_cart_alt pull-right"></i></h3>
                    <table class="table table_summary">
                    <tbody>
                    @for ($i = 0; $i < 8; $i++)
                        <tr>
                            <td>
                                <a href="#0" class="icon_plus_alt2"> <a href="#0" class="remove_item">
                                <i class="icon_minus_alt"></i></a>
                                <strong>{{ $i }}x</strong> {{ str_random(10) }}
                            </td>
                            <td>
                                <strong class="pull-right">150,000₫</strong>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                    </table>
                    <hr>
                    <table class="table table_summary">
                    <tbody>
                    <tr>
                        <td>
                            Subtotal <span class="pull-right">150,000₫</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Delivery fee <span class="pull-right">150,000₫</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="total">
                            TOTAL <span class="pull-right">150,000₫</span>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                    <hr>
                    <a class="btn_full" href="cart.html">Order now</a>
                </div><!-- End cart_box -->
                </div><!-- End theiaStickySidebar -->
            </div><!-- End col-md-3 --></div>
    </div>
</div>
@endsection
