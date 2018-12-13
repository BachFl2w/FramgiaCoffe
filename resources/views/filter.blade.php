@extends('layouts.app_client')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home">
                            <a href="" title="Go to Home Page">{{ __('message.title.home') }}</a>
                            <span>/</span>
                        </li>
                        <li class="category1599">
                            <a>{{ __('message.product') }}</a>
                            <span>/ </span>
                        </li>
                        <li class="category1601">
                            <strong>Filter</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="main-container col2-left-layout bounceInUp animated">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-sm-push-3">
                    <div class="category-description std">
                        <div class="slider-items-products">
                            <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col1 owl-carousel owl-theme">
                                    <div class="item">
                                        <a href="#">
                                            <img alt="" src="{{ asset('images/image_background2.jpg') }}">
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#">
                                            <img alt="" src="{{ asset('images/image_background1.jpg') }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <article class="col-main">
                        <h2 class="page-heading">
                            <span class="page-heading-title">{{ __('message.product') }}</span>
                            @if($category != null)
                            <span class="page-heading-title" style="float: right;">{{  $category->name }}</span>
                            @endif
                            @if($keyword != null)
                            <span class="page-heading-title" style="float: right;">Key Word: '{{ $keyword }}'</span>
                            @endif
                        </h2>
                        <div class="category-products">
                            @if(count($products))
                            <ul class="products-grid">
                                @foreach($products as $product)
                                    <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="item-inner">
                                            <div class="item-img">
                                                <div class="item-img-info">
                                                    <a href="{{ route('client.product.detail', ['id' => $product->id]) }}" class="product-image" title="{{ $product->name }}">
                                                        <img src="{{ asset(config('asset.image_path.product') . $product->images[0]->name) }}"
                                                             alt="Retis lapen casen" width="234" height="234">
                                                    </a>
                                                    {{-- <div class="new-label new-top-left">New</div> --}}
                                                    <div class="box-hover">
                                                        <ul class="add-to-links">
                                                            <li>
                                                                <a class="link-quickview" href="">Quick View</a>
                                                            </li>
                                                            <li>
                                                                <a class="link-wishlist favorite" data-id="{{ $product->id }}" href="">Wishlist</a>
                                                            </li>
                                                            <li>
                                                                <a class="link-compare" href="">Compare</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title">
                                                        <a href="{{ route('client.product.detail', ['id' => $product->id]) }}">
                                                            {{ $product->name }}
                                                        </a>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="rating">
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    <div style="width:80%" class="rating"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                @if($product->discount)
                                                                <p class="old-price">
                                                                    <span class="price">
                                                                        {{ number_format($product->price) .' ₫'}}
                                                                    </span>
                                                                </p>
                                                                @endif
                                                                <p class="special-price">
                                                                    <span class="price-label">Special Price</span>
                                                                    <span class="price">{{ number_format($product->price * (1 - $product->discount/100)) .' ₫'}}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach()
                            </ul>
                            @else
                                <h3 class="text text-center">No product is related with keyword</h3>
                            @endif
                        </div>
                        <div class="toolbar">
                            <div class="row">
                                <div class="col-lg-10 col-sm-7 col-md-5">
                                    <div class="pager">
                                        <div class="pages">
                                            {{-- <label>Page:</label> --}}
                                            {!! $products->appends(request()->input())->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                    <aside class="col-left sidebar">
                        <div class="side-nav-categories">
                            <div class="block-title">{{ __('message.category') }}</div>
                            <div class="box-content box-category">
                                <ul class="product-categories">
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('client.filter', ['category_id' => $category->id]) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                        {{-- <div class="custom-slider">
                            <div>
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li class="active" data-target="#carousel-example-generic"
                                            data-slide-to="0"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active"><img
                                                    src="http://htmldemo.themessoft.com/freshia/version3/images/slide3.jpg"
                                                    alt="slide3">
                                            <div class="carousel-caption">
                                                <h3><a title=" Sample Product" href="#">25% OFF</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <a class="link" href="#">Buy Now</a></div>
                                        </div>
                                        <div class="item"><img
                                                    src="http://htmldemo.themessoft.com/freshia/version3/images/slide1.jpg"
                                                    alt="slide1">
                                            <div class="carousel-caption">
                                                <h3><a title=" Sample Product" href="#">Hot Deal</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                        </div>
                                        <div class="item"><img
                                                    src="http://htmldemo.themessoft.com/freshia/version3/images/slide2.jpg"
                                                    alt="slide2">
                                            <div class="carousel-caption">
                                                <h3><a title=" Sample Product" href="#">Season Sale</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="left carousel-control" href="#" data-slide="prev"> <span class="sr-only">Previous</span>
                                    </a> <a class="right carousel-control" href="#" data-slide="next"> <span
                                                class="sr-only">Next</span> </a></div>
                            </div>
                        </div> --}}
                        <div class="block block-cart">
                            <div class="block-title ">My Cart</div>
                            <div class="block-content">
                                <div class="summary">
                                    <p class="amount">There are <span class="count_cart">0</span> product in your cart.</p>
                                    <p class="subtotal">
                                        <span class="label">Cart Subtotal:</span>
                                        <span class="price price_cart">0</span>
                                        <strong class=""> ₫</strong>
                                    </p>
                                </div>
                                <div class="ajax-checkout">
                                    <button class="button button-checkout" title="Submit" type="submit">
                                        <span>Checkout</span></button>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Container End -->
@endsection

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.button-checkout').click(function(event) {
               event.preventDefault();
               window.location.href = route('client.showCart');
            });
        });
    </script>
@endsection