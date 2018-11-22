<!DOCTYPE html>
<html>

<head>
    @routes()
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="pizza, delivery food, fast food, sushi, take away, chinese, italian food">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Smart Drink</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,300,300italic' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">

    <link href="{{ asset('css/morphext.css') }}" rel="stylesheet">
    <link href="{{ asset('css/grey.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/slider-pro.min.css') }}" rel="stylesheet" >

    <style type="text/css">
        #box_search{
            display: none;
            position: absolute;
            top: 45px;
            z-index: 100;
            background-color: white;
            width: 100%;
        }
        #element-result {
            background-color: #FFFFF0;
            padding: 5px 0px;
            margin-bottom: 5px;
        }
        #element-result:hover {
            background-color: #F8F8FF;
        }
        #element-img {
            float: left;margin-left: 10px;
        }
        #element-text {
            float: left;margin-left: 30px;
        }
        #element-load {
            display: block;
            background-color: red;
            padding: 10px;
            border: 3px solid #FFF8DC;
            font-weight: 600;
            border-radius: 3px;
            margin-bottom: 5px;
        }
        #element-load:hover {
            background-color: blue;
            text-decoration: none;
        }
    </style>

</head>

<body>

	<div id="preloader">
        <div class="sk-spinner sk-spinner-wave" id="status">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>

    <header>
    <div class="container-fluid">
        <div class="row">
            <div class="col--md-4 col-sm-4 col-xs-4">
                <a href="{{ route('client.index') }}" id="logo">
                <img src="{{ asset('images/framgia-logo.png') }}" height="30" alt="" data-retina="true" class="hidden-xs">
                <img src="{{ asset('images/framgia-logo.png') }}" height="23" alt="" data-retina="true" class="hidden-lg hidden-md hidden-sm">
                </a>
            </div>
            <nav class="col--md-8 col-sm-8 col-xs-8">
            <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
            <div class="main-menu">
                <div id="header_menu">
                    <img src="{{ asset('images/framgia-logo.png') }}" height="23" alt="" data-retina="true">
                </div>
                <a href="#" class="open_close" id="close_in"><i class="icon_close"></i></a>
                 <ul>
                    <li><a href="{{ route('home') }}">{{ __('message.title.home') }}</a></li>
                    <li><a href="{{ route('user.cart') }}">{{ __('message.title.cart') }}</a></li>
                    <li class="submenu">
                    <a href="{{ route('client.list_product') }}" class="show-submenu">{{ __('message.product') }}
                        {{-- <i class="icon-down-open-mini"></i> --}}
                    </a>
                    {{-- <ul>
                        <li><a href="{{ route('client.list_product') }}">{{ __('message.hot_product') }}</a></li>
                        <li><a href="">{{ __('message.new_product') }}</a></li>
                    </ul> --}}
                    </li>
                    <li class="submenu">
                    <a href="javascript:void(0);" class="show-submenu">{{ __('message.order') }}<i class="icon-down-open-mini"></i></a>
                    <ul>
                        <li><a href="#">{{ __('message.title.paid') }}</a></li>
                        <li><a href="#">{{ __('message.title.unpaid') }}</a></li>
                    </ul>
                    <li><a href="#">{{ __('message.title.about') }}</a></li>
                    </li>
                    @if (!Auth::id())
                        <li><a href="#0" data-toggle="modal" data-target="#login_2">{{ __('message.login') }}</a></li>
                    @else
                        <li class="submenu">
                            <a href="javascript:void(0);" class="show-submenu">{{ $currentUser->name }}<i class="icon-down-open-mini"></i></a>
                            <ul>
                                <li><a href="{{ route('user.edit', $currentUser->id) }}">{{ __('message.profile') }}</a></li>
                                <li><a href="{{ route('logout') }}">{{ __('message.logout') }}</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            </nav>
        </div>
    </div>
    </header>
    <!-- End Header =============================================== -->

    <!-- SubHeader =============================================== -->
    <section class="parallax-window" id="home" data-parallax="scroll" data-image-src="{{ asset('images/image_background1.jpg') }}" data-natural-width="1400" data-natural-height="550">
    <div id="subheader">
        <div id="sub_content">
            <h1>{{ __('message.index.statistics') }}</h1>
            <h1><strong id="js-rotating">{{ __('message.index.rotating') }}</strong></h1>
            <form method="post" action="#">
                <div id="custom-search-input">
                    <div class="input-group" style="position: relative;">
                        <input type="text" class="search-query" placeholder="{{ __('message.index.search_placeholder') }}" autocomplete="off" id="keysearch">
                        <span class="input-group-btn">
                        <input type="submit" class="btn_search" value="submit">
                        </span>
                    </div>
                    <div class="container-fluid" id="box_search"></div>
                </div>
            </form>
        </div><!-- End sub_content -->
    </div><!-- End subheader -->
    <div id="count" class="hidden-xs">
        <ul>
            <li><span class="number">{{ $number_product }}</span> {{ __('message.product') }}</li>
            <li><span class="number">{{ $number_category }}</span> {{ __('message.category') }}</li>
            <li><span class="number">5</span> {{ __('message.shipper') }}</li>
        </ul>
    </div>
    </section>

    <div id="position">
        <div class="container">
            <ul>
                @yield('position')
            </ul>
            <a href="#0" class="search-overlay-menu-btn"><i class="icon-search-6"></i> {{ __('message.index.search') }}</a>
        </div>
    </div><!-- Position -->

    @yield('content')

    <!-- Footer ================================================== -->
    <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-3">
                <h3>{{ __('message.payments') }}</h3>
                <p>
                    <img src="img/cards.png" alt="" class="img-responsive">
                </p>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3>{{ __('message.title.about') }}</h3>
                <ul>
                    <li><a href="about.html">{{ __('message.about') }}</a></li>
                    <li><a href="faq.html">Faq</a></li>
                    <li><a href="contacts.html">{{ __('message.title.contact') }}</a></li>
                    <li><a href="#0" data-toggle="modal" data-target="#login_2">{{ __('message.login') }}</a></li>
                    <li><a href="#0" data-toggle="modal" data-target="#register">{{ __('message.register') }}</a></li>
                    <li><a href="#0">Terms and conditions</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3" id="newsletter">
                <h3>{{ __('message.title.news') }}</h3>
                <p>
                    Join our newsletter to keep be informed about offers and news.
                </p>
                <div id="message-newsletter_2">
                </div>
                <form method="post" action="http://www.ansonika.com/quickfood/assets/newsletter.php" name="newsletter_2" id="newsletter_2">
                    <div class="form-group">
                        <input name="email_newsletter_2" id="email_newsletter_2" type="email" value="" placeholder="Your mail" class="form-control">
                    </div>
                    <input type="submit" value="Subscribe" class="btn_1" id="submit-newsletter_2">
                </form>
            </div>
            <div class="col-md-2 col-sm-3">
                <h3>{{ __('message.title.setting') }}</h3>
                <div class="styled-select">
                    <select class="form-control" name="lang" id="lang" onchange="location = this.value;">
                        <option value="{!! route('user.change-language', ['en']) !!}" selected>English</option>
                        <option value="{!! route('user.change-language', ['vi']) !!}">Tiếng Việt</option>
                    </select>
                </div>
                <div class="styled-select">
                    <select class="form-control" name="currency" id="currency">
                        <option value="USD" selected>USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                        <option value="RUB">RUB</option>
                    </select>
                </div>
            </div>
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="#0"<i class="icon-facebook"></i></a></li>
                        <li><a href="#0"><i class="icon-twitter"></i></a></li>
                        <li><a href="#0"><i class="icon-google"></i></a></li>
                        <li><a href="#0"><i class="icon-instagram"></i></a></li>
                        <li><a href="#0"><i class="icon-pinterest"></i></a></li>
                        <li><a href="#0"><i class="icon-vimeo"></i></a></li>
                        <li><a href="#0"><i class="icon-youtube-play"></i></a></li>
                    </ul>
                    <p>
                        © Framgia Coffee 2018
                    </p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->
    </footer>
    <!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

<!-- Login modal -->
<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                {!! Form::open(['route' => 'postLogin', 'class' => 'popup-form', 'id' => 'myLogin']) !!}
                	<div class="login_icon"><i class="icon_lock_alt"></i></div>
                    {!! Form::text('email', '', ['class' => 'form-control form-white', 'placeholder' => 'Username']) !!}
                    {!! Form::password('password', ['class' => 'form-control form-white', 'placeholder' => 'Password']) !!}
					<div class="text-left">
						<a href="#">{{ __('message.password.forgot') }}</a>
					</div>
                    {!! Form::submit(__('message.login'), ['class' => 'btn btn-submit']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div><!-- End modal -->

<!-- Register modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                {!! Form::open(['method' => 'post', 'route' => 'register', 'class' => 'popup-form', 'id' => 'myRegister']) !!}
                	<div class="login_icon"><i class="icon_lock_alt"></i></div>
                    {!! Form::text('name', '', ['class' => 'form-control form-white', 'placeholder' => __('message.name')]) !!}
                    {!! Form::hidden('role', 3, ['class' => 'd-none']) !!}
                    {!! Form::text('email', '', ['class' => 'form-control form-white', 'placeholder' => __('message.email')]) !!}
                    {!! Form::password('password', ['class' => 'form-control form-white', 'placeholder' => __('message.password.password')]) !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control form-white', 'placeholder' => __('message.password.confirm')]) !!}
                    {!! Form::text('address', '', ['class' => 'form-control form-white', 'placeholder' => __('message.address')]) !!}
                    {!! Form::number('phone', '', ['class' => 'form-control form-white', 'placeholder' => __('message.phone')]) !!}
                    <div id="pass-info" class="clearfix"></div>
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="accept_2" id="check_2" name="check_2" />
							<label for="check_2"><span>{{ __('message.agree') }}</label>
						</div>
					</div>
                    {!! Form::submit(__('message.register'), ['class' => 'btn btn-submit']) !!}
                {!! Form::close() !!}
			</div>
		</div>
	</div>

<!-- COMMON SCRIPTS -->
<script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('js/common_scripts_min.js') }}"></script>
<script src="{{ asset('js/functions.js') }}"></script>
<script src="{{ asset('js/validate.js') }}"></script>
<script src="{{ asset('js/infobox.js') }}"></script>
<script src="{{ asset('js/jquery.sliderPro.min.js') }}"></script>


<!-- SPECIFIC SCRIPTS -->
<script src="{{ asset('js/morphext.min.js') }}"></script>
<script>
$("#js-rotating").Morphext({
    animation: "fadeIn", // Overrides default "bounceIn"
    separator: ",", // Overrides default ","
    speed: 2300, // Overrides default 2000
    complete: function () {
        // Overrides default empty function
    }
});
jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#keysearch').val('');
    $('#keysearch').on('keyup change', function(event) {
        var request_value = '';
        if ($('#keysearch').val() != '') {
            request_value = $('#keysearch').val();
        }
        $.ajax({
            url: route('client.live_search'),
            type: 'post',
            dataType: '',
            data: { keyword: request_value },
        })
        .done(function(res) {
            if (request_value == '') {
                $('#box_search').hide();
            }
            var url = 'http://127.0.0.1:8000/images/products/';
            $('#box_search').show();
            $('#box_search').empty();
            var result = '';
            if(!res.length) {
                result =  $('#box_search').hide();;
            }
            else {
                res.forEach( function(element, index) {
                    result += '<a href="">' +
                            '<div class="row" id="element-result">' +
                            '<img id="element-img" height="30px" width="100px" class="img-thumbnail" id="img-element-result" src="'+ url + element.images[0].name +'">' +
                            '<h4 id="element-text">' + element.name + '</h4>' +
                            '</div>' +
                        '</a>';
                });
                result += '<a href="#" id="element-load">Load more...</a>';
            }
            $('#box_search').html(result);
        })
    });
});
</script>

@yield('js')

</body>

</html>
