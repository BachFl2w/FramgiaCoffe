@extends('layouts.app_client')

@section('position')
    <li><a href="#0">{{ __('message.title.home') }}</a></li>
    <li class="active"><a>{{ __('message.hot_product') }}</a></li>
@endsection

@section('content')
<div class="container margin_60_35">
    <div class="row">
        <div class="col-md-3">
            <div class="box_style_2 hidden-xs info">
                <h4 class="nomargin_top">{{ __('message.index.delivery_time') }}<i class="icon_clock_alt pull-right"></i></h4>
                <p>
                    {{ __('message.lorem') }}
                </p>
                <hr>
                <h4>{{ __('message.secure') }} <i class="icon_creditcard pull-right"></i></h4>
                <p>
                    {{ __('message.lorem') }}
                </p>
            </div><!-- End box_style_2 -->

            <div class="box_style_2 hidden-xs" id="help">
                <i class="icon_lifesaver"></i>
                <h4>{{ __('message.help') }}</span></h4>
                <a href="tel://004542344599" class="phone">+45 423 445 99</a>
            </div>
        </div><!-- End col-md-3 -->
        {!! Form::open(['method' => 'post', 'route' => 'user.checkout']) !!}
        <div class="col-md-5 col-sm-5 add_bottom_15 box_style_2">
            <div class="indent_title_in">
                <h3><i class="icon-user"></i> {{ __('message.info') }}</h3>
            </div>
            <div class="wrapper_indent">
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
            </div><!-- End wrapper_indent -->
        </div>
        <div class="col-md-4" id="sidebar">
            <div class="theiaStickySidebar">
                <div id="cart_box" >
                    <h3>Your order
                        <div class="pull-right">
                            <a href="{{ route('user.cart.destroy') }}" title="delete">
                                <i class="icon_cart_alt"></i>
                                Unset
                            </a>
                        </div>
                    </h3>
                    <table class="table table_summary table-hover">
                        <tbody>
                            {{-- @foreach (Session('cart') as $cart) --}}
                                <tr>
                                    <td>
                                        {{-- <a href="{{ route('user.cart.minus', [, ]) }}" class="icon-minus-circled"></a> --}}
                                        {{-- <a href="{{ route('user.cart.add', [, ]) }}" class="icon-plus-circled"></a> --}}
                                        {{ str_random(8) . ' ' . str_random(8) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('user.cart.delete', 1) }}" class="icon-cancel-circled-2 pull-right"></a>
                                        <strong class="pull-right">150,000₫</strong>
                                    </td>
                                </tr>
                            {{-- @endforeach --}}
                        @if (session('cart'))
                            {{-- @foreach (session('cart') as $e)
                                <strong>{{ $e->items->product }}</strong>
                            @endforeach --}}
                        @else
                            <strong>Empty !</strong>
                        @endif

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
                    {!! Form::submit(__('message.order'), ['class' => 'btn_full']) !!}
                </div><!-- End cart_box -->
                </div><!-- End theiaStickySidebar -->
            </div><!-- End col-md-3 -->
        </div>
        {!! Form::close() !!}
        <form action="{{ route('user.cart.add') }}" method="post">
        @csrf
            <input type="text" name="product" value="1">
            <input type="checkbox" name="topping[]" value="1">1
            <input type="checkbox" name="topping[]" value="2">2
            <input type="checkbox" name="topping[]" value="3">3
            <button id="btnBuy" class="btn btn-danger" type="submit">Buy</button>
        </form>
    </div>
</div>
@endsection


@section('js')

@endsection
