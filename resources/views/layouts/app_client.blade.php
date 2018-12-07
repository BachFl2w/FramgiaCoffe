<!DOCTYPE html>
<html lang="en">
<head>
    @routes()
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicons Icon -->
    <link rel="shortcut icon" href="http://htmldemo.themessoft.com/freshia/version3/favicon1.ico" type="image/x-icon">
    <link rel="icon" href="http://htmldemo.themessoft.com/freshia/version3/favicon1.ico" type="image/x-icon">
    <title>Smart Drink</title>
    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app_client.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    @yield('css')
</head>

<body class="home cms-index-index cms-home-page">
<div id="page">
    <!-- Header -->
    <header>
        @include('layouts.header_client')
        @include('layouts.search_and_menu_client')
    </header>
    @yield('content')
    @include('layouts.footer_client')
</div>
<!-- JavaScript -->
<script src="http://htmldemo.themessoft.com/freshia/version3/js/jquery.min.js"></script>
<script src="http://htmldemo.themessoft.com/freshia/version3/js/bootstrap.min.js"></script>
<script src="http://htmldemo.themessoft.com/freshia/version3/js/revslider.js"></script>
<script src="http://htmldemo.themessoft.com/freshia/version3/js/common.js"></script>
<script src="http://htmldemo.themessoft.com/freshia/version3/js/owl.carousel.min.js"></script>
<script src="http://htmldemo.themessoft.com/freshia/version3/js/jquery.mobile-menu.min.js"></script>
<script src="http://htmldemo.themessoft.com/freshia/version3/js/countdown.js"></script>


<!-- <script src="js/thm_menu.js.download.js"></script>
<script src="js/jquery.bxslider.js"></script>  -->
<script src="{{ asset('js/js_cloud-zoom.js') }}"></script>

<script>
    jQuery(document).ready(function () {
        jQuery('#rev_slider_4').show().revolution({
            dottedOverlay: 'none',
            delay: 5000,
            startwidth: 915,
            startheight: 440,
            hideThumbs: 200,
            thumbWidth: 200,
            thumbHeight: 50,
            thumbAmount: 2,
            navigationType: 'thumb',
            navigationArrows: 'solo',
            navigationStyle: 'round',
            touchenabled: 'on',
            onHoverStop: 'on',
            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,
            spinner: 'spinner0',
            keyboardNavigation: 'off',
            navigationHAlign: 'center',
            navigationVAlign: 'bottom',
            navigationHOffset: 0,
            navigationVOffset: 20,
            soloArrowLeftHalign: 'left',
            soloArrowLeftValign: 'center',
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,
            soloArrowRightHalign: 'right',
            soloArrowRightValign: 'center',
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,
            shadow: 0,
            fullWidth: 'on',
            fullScreen: 'off',
            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,
            shuffle: 'off',
            autoHeight: 'off',
            forceFullWidth: 'on',
            fullScreenAlignForce: 'off',
            minFullScreenHeight: 0,
            hideNavDelayOnMobile: 1500,
            hideThumbsOnMobile: 'off',
            hideBulletsOnMobile: 'off',
            hideArrowsOnMobile: 'off',
            hideThumbsUnderResolution: 0,
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            fullScreenOffsetContainer: ''
        });
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var nf = new Intl.NumberFormat();

        function loadCart() {
            var htmlCart = '' +
                '<ul class="mini-products-list" id="cart-sidebar">';
            $.ajax({
                url: route('client.cart'),
                type: 'get',
                dataType: '',
                data: {},
            })
            .done(function (res) {
                var empty_cart = '<h4 style="margin: 10px auto;padding: 10px 20px ;width: 100%">' +
                    'Bạn chưa mua sản phẩm nào ! </h4>';
                if (res.length !== 0) {
                    $total_price = 0;
                    $count_product = 0;
                    res.forEach(function (element) {
                        $total_price += element.item_price;
                        $count_product += element.item.quantity;
                    });
                    $('#count_cart').html($count_product);
                    $('#price_cart').html(nf.format($total_price));
                    var count_cart = res.length < 3 ? res.length : 3;
                    for (var i = 0; i < count_cart; i++) {
                        var url_image = 'http://127.0.0.1:8000/images/products/';
                        var item = '' +
                            '<li class="item first">' +
                            '<div class="item-inner">' +
                            '<a class="product-image" title="Retis lapen casen" href="#l">' +
                            '<img src="' + url_image + res[i].item.product.image + '">' +
                            '</a>' +
                            '<div class="product-details">' +
                            '<div class="access">' +
                            '<a class="btn-remove1 btnRemove" href="#" data-id="' + res[i].key + '" >' +
                            '</a>' +
                            '</div>' +
                            '<strong>' + res[i].item.quantity + '</strong> x <span' +
                            'class="price">' + nf.format(res[i].item.product_price) + ' ₫' + '</span>' +
                            '<p class="product-name"><a href="#">' + res[i].item.product.name + '</a></p>';
                        res[i].item.toppings.forEach(function (element, index) {
                            item += '<span class="product-name" style="padding: 5px 10px 0px 2px;display: inline-block">' + element.name + '</span>';
                        });
                        item += '</div></div></li>';
                        htmlCart += item;
                    }
                    htmlCart += '</ul>';
                    if (res.length >= 3) {
                        htmlCart += '<h3 class="text text-center">...Load more...</h3>';
                    }
                    $('#car_list').html(htmlCart);
                    $('#action_order').show();
                } else {
                    $('#car_list').html(empty_cart);
                    $('#action_order').hide();
                }
            })
        };

        loadCart();

        $('.btnBuy').click(function (event) {
            var id_sp = $(this).attr("data-id");
            $.ajax({
                url: route('client.product.detail.json', {id: id_sp}),
                type: 'get',
                dataType: '',
                data: {},
            })
            .done(function (res) {
                $('.modal-title').html(res.name);
                $('#product_id').val(res.id);
            })
            .fail(function () {
                console.log("error");
            })
        });

        $('#btnSubmitOrder').click(function (event) {
            event.preventDefault();
            $.ajax({
                url: route('user.cart.add'),
                type: 'post',
                dataType: '',
                data: $('#form_order').serialize(),
            })
            .done(function () {
                loadCart();

            })
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                $('#form_order')[0].reset();
                $('#order').modal('hide');
            });
        });

        $('#empty_cart_button').click(function (event) {
            if (confirm('Are you sure ?')) {
                $.ajax({
                    url: route('user.cart.remove'),
                    type: 'get',
                    dataType: '',
                    data: {},
                })
                .done(function () {
                    console.log("success");
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
            }
        });

        //search index client
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
                var url_image = 'http://127.0.0.1:8000/images/products/';
                $('#box_search').show();
                $('#box_search').empty();
                var result = '';
                if(!res.length) {
                    result =  $('#box_search').hide();;
                }
                else {
                    var url = route('client.search', { keyword: request_value })
                    res.forEach( function(element, index) {
                        var url_product = route("client.product.detail", {id: element.id})
                        result += '<a href="">' +
                        '<div class="element_search">' +
                            '<div class="image">' +
                                '<img class="img-thumbnail" src="{{ asset('images/products/1.jpg') }}">' +
                            '</div>' +
                            '<div class="info">' +
                                '<p class="product-title">' + element.name + '</p>';
                                if(element.discount)
                                {
                                    result += '<p class="product-price">' +
                                    '<span class="product-old-price">' + nf.format(element.price) + ' ₫</span>' +
                                    '<span class="product-discount"> ('+ element.discount +'%)</span>' +
                                    '</p>';
                                }
                                result += '<p class="product-new-price">' + nf.format(element.price * (1 - element.discount)) + '  ₫</p>' +
                            '</div>' +
                        '</div>' +
                    '</a>';
                    });
                    result += '<div class="load-more">' +
                                    '<a href="' + url + '">' +
                                        '<div>Load More</div>' +
                                    '</a>' +
                                '</div>' 
                }
                $('#box_search').html(result);
            })
        });
    });
</script>

@yield('js')
</body>
</html>
