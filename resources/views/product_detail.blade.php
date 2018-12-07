@extends('layouts.app_client')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home">
                            <a href="#" title="Go to Home Page">Home</a><span>/</span>
                        </li>
                        <li class="category1599">
                            <a href="#" title="">Product</a> <span>/</span>
                        </li>
                        <li class="category1600">
                            <a href="#" title="">Category</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="main-container col1-layout">
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-main">
                        <div class="product-view">
                            <div class="product-essential">
                                <form action="#" method="post" id="product_addtocart_form">
                                    <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                                    <div class="product-img-box col-lg-4 col-sm-5 col-xs-12">
                                        <!-- <div class="new-label new-top-left"> New </div> -->
                                        <div class="product-image">
                                            <div class="product-full">
                                                <img id="product-zoom"
                                                     src="{{ asset('images/products/' . $product->images[0]->name) }}"/></div>
                                            <div class="more-views">
                                                <div class="slider-items-products">
                                                    <div id="gallery_01"
                                                         class="product-flexslider hidden-buttons product-img-thumb">
                                                        <div class="slider-items slider-width-col4 block-content">
                                                            @foreach($product->images as $image)
                                                                <div class="more-views-items">
                                                                    <a href="#">
                                                                        <img id="product-zoom"
                                                                             src="{{ asset('images/products/' . $image->name)  }}"/>
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end: more-images -->
                                    </div>
                                    <div class="product-shop col-lg-8 col-sm-7 col-xs-12">
                                        <div class="product-next-prev">
                                            <a class="product-next"
                                               href="#"><span></span>
                                            </a>
                                            <a class="product-prev" href="#"><span></span>
                                            </a>
                                        </div>
                                        <div class="product-name">
                                            <h1>{{ $product->name }}</h1>
                                        </div>
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div style="width:60%" class="rating"></div>
                                            </div>
                                            <p class="rating-links">
                                                <a href="#">{{ count($product->feedbacks)}} Review(s)</a>
                                            </p>
                                        </div>
                                        <div class="price-block">
                                            <div class="price-box">
                                                @if($product->discount)
                                                    <p class="special-price">
                                                        <span id="product-price-48" class="price">
                                                            {{ number_format($product->price * (1- $product->discount /100)) . ' ₫' }}
                                                        </span>
                                                    </p>
                                                    <p class="old-price">
                                                        <span class="price">
                                                            {{ number_format($product->price) . ' ₫' }}
                                                        </span>
                                                    </p>
                                                @else
                                                    <p class="special-price">
                                                        <span id="product-price-48"
                                                              class="price">{{ number_format($product->price) . ' ₫' }}</span>
                                                    </p>
                                                @endif
                                                <p class="availability in-stock pull-right"><span>New</span></p>
                                            </div>
                                        </div>
                                        <div class="short-description">
                                            <h2> Quick Overview</h2>
                                            <p>{{ $product->brief }}</p>
                                        </div>
                                        <div class="add-to-box">
                                            <div class="add-to-cart">
                                                <div class="pull-left">
                                                    <div class="custom pull-left">
                                                        <button
                                                            onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;"
                                                            class="reduced items-count" type="button"><i
                                                                class="fa fa-minus">&nbsp;</i></button>
                                                        <input type="text" class="input-text qty" title="Qty" value="1"
                                                               maxlength="12" id="qty" name="qty">
                                                        <button
                                                            onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                                                            class="increase items-count" type="button"><i
                                                                class="fa fa-plus">&nbsp;</i></button>
                                                    </div>
                                                </div>
                                                <button onClick="productAddToCartForm.submit(this)"
                                                        class="button btn-cart"
                                                        title="Add to Cart" type="button">
                                                    <span>Add to Cart</span>
                                                </button>
                                            </div>
                                            <div class="email-addto-box">
                                                <ul class="add-to-links">
                                                    <li><a class="link-wishlist"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/wishlist.html"><span>Add to Wishlist</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
                        <div class="add_info">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                <li class="active">
                                    <a href="#product_tabs_description" data-toggle="tab"> Product
                                        Description </a>
                                </li>
                                <li><a href="#reviews_tabs" data-toggle="tab">Reviews</a></li>
                            </ul>
                            <div id="productTabContent" class="tab-content">
                                <div class="tab-pane in active" id="product_tabs_description">
                                    <div class="std">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane " id="reviews_tabs">
                                    <div class="box-collateral box-reviews" id="customer-reviews">
                                        <div class="box-reviews1">
                                            <div class="form-add">
                                                <form id="review-form" method="post"
                                                      action="http://www.magikcommerce.com/review/product/post/id/176/">
                                                    <h3>Write Your Own Review</h3>
                                                    <fieldset>
                                                        <h4>How do you rate this product? <em class="required">*</em>
                                                        </h4>
                                                        <span id="input-message-box"></span>
                                                        <table id="product-review-table" class="data-table">
                                                            <colgroup>
                                                                <col>
                                                                <col width="1">
                                                                <col width="1">
                                                                <col width="1">
                                                                <col width="1">
                                                                <col width="1">
                                                            </colgroup>
                                                            <thead>
                                                            <tr class="first last">
                                                                <th>&nbsp;</th>
                                                                <th><span class="nobr">1 *</span></th>
                                                                <th><span class="nobr">2 *</span></th>
                                                                <th><span class="nobr">3 *</span></th>
                                                                <th><span class="nobr">4 *</span></th>
                                                                <th><span class="nobr">5 *</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            
                                                            <tr class="first odd">
                                                                <th>Rate</th>
                                                                <td class="value">
                                                                    <input type="radio" class="radio"
                                                                           value="1" id="Quality_1"
                                                                           name="ratings[1]">
                                                                </td>
                                                                <td class="value">
                                                                    <input type="radio" class="radio"
                                                                           value="2" id="Quality_2"
                                                                           name="ratings[1]">
                                                                </td>
                                                                <td class="value">
                                                                    <input type="radio" class="radio"
                                                                           value="3" id="Quality_3"
                                                                           name="ratings[1]">
                                                                </td>
                                                                <td class="value">
                                                                    <input type="radio" class="radio"
                                                                           value="4" id="Quality_4"
                                                                           name="ratings[1]">
                                                                </td>
                                                                <td class="value last">
                                                                    <input type="radio" class="radio"
                                                                           value="5" id="Quality_5"
                                                                           name="ratings[1]">
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <input type="hidden" value="" class="validate-rating"
                                                               name="validate_rating">
                                                        <div class="review1">
                                                            <ul class="form-list">
                                                                <li>
                                                                    <label class="required"
                                                                           for="nickname_field">Nickname<em>*</em></label>
                                                                    <div class="input-box">
                                                                        <input type="text" class="input-text"
                                                                               id="nickname_field" name="nickname">
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <label class="required"
                                                                           for="summary_field">Summary<em>*</em></label>
                                                                    <div class="input-box">
                                                                        <input type="text" class="input-text"
                                                                               id="summary_field" name="title">
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="review2">
                                                            <ul>
                                                                <li>
                                                                    <label class="required "
                                                                           for="review_field">Review<em>*</em></label>
                                                                    <div class="input-box">
                                                                    <textarea rows="3" cols="5" id="review_field" name="detail"></textarea>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <div class="buttons-set">
                                                                <button class="button submit" title="Submit Review"
                                                                        type="submit"><span>Submit Review</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="box-reviews2">
                                            <h3>Reviews</h3>
                                            <div class="box visible">
                                                <ul>
                                                    <li>
                                                        <table class="ratings-table">
                                                            <colgroup>
                                                                <col width="1">
                                                                <col>
                                                            </colgroup>
                                                            <tbody>
                                                            <tr>
                                                                <th>Value</th>
                                                                <td>
                                                                    <div class="rating-box">
                                                                        <div class="rating" style="width:100%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            
                                                            </tbody>
                                                        </table>
                                                        <div class="review">
                                                            <h6><a href="#">Excellent</a></h6>
                                                            <small>Review by <span>Leslie Prichard </span>on 1/3/2014
                                                            </small>
                                                            <div class="review-txt"> I have purchased shirts from
                                                                Minimalism
                                                                a few times and am never disappointed. The quality is
                                                                excellent and the shipping is amazing. It seems like
                                                                it's at
                                                                your front door the minute you get off your pc. I have
                                                                received my purchases within two days - amazing.
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="actions"><a class="button view-all" id="revies-button"
                                                                    href="#"><span><span>View all</span></span></a>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Container End -->

    <!-- Related Products Slider -->

    <div class="container">

        <!-- Related Slider -->
        <div class="related-pro">

            <div class="slider-items-products">
                <div class="related-block">
                    <div id="related-products-slider" class="product-flexslider hidden-buttons">
                        <div class="home-block-inner">
                            <div class="block-title">
                                <h2>RELATED PRODUCTS</h2>
                            </div>
                            <img alt="Retis lapen casen"
                                 src="http://htmldemo.themessoft.com/freshia/version3/images/banner-img.jpg">
                            <!--  <div class="pretext"><a title="Retis lapen casen" href="#"> <img alt="Retis lapen casen" src="images/banner-img.jpg"> </a>
                             <div class="offer-text">Save upto 25% Today!</div>
                             </div>
                             <a href="grid.html" class="view_more_bnt">View All</a>   -->

                        </div>
                        <div class="slider-items slider-width-col4 products-grid block-content">
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <figure class="img-responsive">
                                                <a class="product-image" title="Retis lapen casen"
                                                   href="product_detail.html"> <img alt="Retis lapen casen"
                                                                                    src="http://htmldemo.themessoft.com/freshia/version3/product-images/product11 (3).jpg">
                                                </a>
                                            </figure>
                                            <!-- <div class="new-label new-top-right">new</div> -->
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/quick_view.html">Quick
                                                            View</a>
                                                    </li>
                                                    <li><a class="link-wishlist"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a title="Retis lapen casen"
                                                                       href="product_detail.html">
                                                    Retis lapen casen </a></div>
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"><a href="#">1 Review(s)</a> <span
                                                            class="separator">|</span> <a href="#">Add Review</a></p>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"> <span
                                                                class="price">$125.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="99"
                                                       data-product_sku=""
                                                       class="button product_type_grouped btn-cart "><span>View products</span></a><a
                                                        href="#" class="button yith-wcqv-button" data-product_id="99">Quick
                                                        View</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <figure class="img-responsive">
                                                <a class="product-image" title="Retis lapen casen"
                                                   href="product_detail.html">
                                                    <img alt="Retis lapen casen"
                                                         src="http://htmldemo.themessoft.com/freshia/version3/product-images/product2.jpg">
                                                </a>
                                            </figure>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/quick_view.html">Quick
                                                            View</a>
                                                    </li>
                                                    <li><a class="link-wishlist"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a title="Retis lapen casen"
                                                                       href="product_detail.html">
                                                    Retis lapen casen </a></div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"><a href="#">1 Review(s)</a> <span
                                                                class="separator">|</span> <a href="#">Add Review</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"> <span
                                                                class="price">$235.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="99"
                                                       data-product_sku=""
                                                       class="button product_type_grouped btn-cart "><span>View products</span></a><a
                                                        href="#" class="button yith-wcqv-button" data-product_id="99">Quick
                                                        View</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->

                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <figure class="img-responsive">
                                                <a class="product-image" title="Retis lapen casen"
                                                   href="product_detail.html"> <img alt="Retis lapen casen"
                                                                                    src="http://htmldemo.themessoft.com/freshia/version3/product-images/product13.jpg">
                                                </a>
                                            </figure>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/quick_view.html">Quick
                                                            View</a>
                                                    </li>
                                                    <li><a class="link-wishlist"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a title="Retis lapen casen"
                                                                       href="product_detail.html">
                                                    Retis lapen casen </a></div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"><a href="#">1 Review(s)</a> <span
                                                                class="separator">|</span> <a href="#">Add Review</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"> <span
                                                                class="price">$325.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="99"
                                                       data-product_sku=""
                                                       class="button product_type_grouped btn-cart "><span>View products</span></a><a
                                                        href="#" class="button yith-wcqv-button" data-product_id="99">Quick
                                                        View</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->

                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <figure class="img-responsive">
                                                <a class="product-image" title="Retis lapen casen"
                                                   href="product_detail.html"> <img alt="Retis lapen casen"
                                                                                    src="http://htmldemo.themessoft.com/freshia/version3/product-images/product4.jpg">
                                                </a>
                                            </figure>
                                            <!-- <div class="new-label new-top-left">new</div> -->
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/quick_view.html">Quick
                                                            View</a>
                                                    </li>
                                                    <li><a class="link-wishlist"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a title="Retis lapen casen"
                                                                       href="product_detail.html">
                                                    Retis lapen casen </a></div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"><a href="#">1 Review(s)</a> <span
                                                                class="separator">|</span> <a href="#">Add Review</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"> <span
                                                                class="price">$425.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="99"
                                                       data-product_sku=""
                                                       class="button product_type_grouped btn-cart "><span>View products</span></a><a
                                                        href="#" class="button yith-wcqv-button" data-product_id="99">Quick
                                                        View</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <figure class="img-responsive">
                                                <a class="product-image" title="Retis lapen casen"
                                                   href="product_detail.html"> <img alt="Retis lapen casen"
                                                                                    src="http://htmldemo.themessoft.com/freshia/version3/product-images/product5.jpg">
                                                </a>
                                            </figure>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/quick_view.html">Quick
                                                            View</a>
                                                    </li>
                                                    <li><a class="link-wishlist"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a title="Retis lapen casen"
                                                                       href="product_detail.html">
                                                    Retis lapen casen </a></div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"><a href="#">1 Review(s)</a> <span
                                                                class="separator">|</span> <a href="#">Add Review</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"> <span
                                                                class="price">$525.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="99"
                                                       data-product_sku=""
                                                       class="button product_type_grouped btn-cart "><span>View products</span></a><a
                                                        href="#" class="button yith-wcqv-button" data-product_id="99">Quick
                                                        View</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">

                                            <figure class="img-responsive">
                                                <a class="product-image" title="Retis lapen casen"
                                                   href="product_detail.html"> <img alt="Retis lapen casen"
                                                                                    src="http://htmldemo.themessoft.com/freshia/version3/product-images/product6.jpg">
                                                </a>
                                            </figure>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/quick_view.html">Quick
                                                            View</a>
                                                    </li>
                                                    <li><a class="link-wishlist"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a title="Retis lapen casen"
                                                                       href="product_detail.html">
                                                    Retis lapen casen </a></div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"><a href="#">1 Review(s)</a> <span
                                                                class="separator">|</span> <a href="#">Add Review</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"> <span
                                                                class="price">$225.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="99"
                                                       data-product_sku=""
                                                       class="button product_type_grouped btn-cart "><span>View products</span></a><a
                                                        href="#" class="button yith-wcqv-button" data-product_id="99">Quick
                                                        View</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item -->
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">

                                            <figure class="img-responsive">
                                                <a class="product-image" title="Retis lapen casen"
                                                   href="product_detail.html"> <img alt="Retis lapen casen"
                                                                                    src="http://htmldemo.themessoft.com/freshia/version3/product-images/product7.jpg">
                                                </a>

                                            </figure>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/quick_view.html">Quick
                                                            View</a>
                                                    </li>
                                                    <li><a class="link-wishlist"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a class="link-compare"
                                                           href="http://htmldemo.themessoft.com/freshia/version3/compare.html">Compare</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a title="Retis lapen casen"
                                                                       href="product_detail.html">
                                                    Retis lapen casen </a></div>
                                            <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div style="width:80%" class="rating"></div>
                                                        </div>
                                                        <p class="rating-links"><a href="#">1 Review(s)</a> <span
                                                                class="separator">|</span> <a href="#">Add Review</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="item-price">
                                                    <div class="price-box"><span class="regular-price"> <span
                                                                class="price">$185.00</span> </span>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="99"
                                                       data-product_sku=""
                                                       class="button product_type_grouped btn-cart "><span>View products</span></a><a
                                                        href="#" class="button yith-wcqv-button" data-product_id="99">Quick
                                                        View</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Item -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End related products Slider -->


    </div>

    <!-- Brand Logo -->
    <div class="brand-logo">
        <div class="container">
            <div class="slider-items-products">
                <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col6">
                        <!-- Item -->
                        <div class="item">
                            <a href="#">
                                <img src="http://htmldemo.themessoft.com/freshia/version3/images/b-logo3.png"
                                     alt="Image">
                            </a></div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item">
                            <a href="#">
                                <img src="http://htmldemo.themessoft.com/freshia/version3/images/b-logo1.png"
                                     alt="Image">
                            </a></div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item">
                            <a href="#">
                                <img src="http://htmldemo.themessoft.com/freshia/version3/images/b-logo2.png"
                                     alt="Image">
                            </a></div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item">
                            <a href="#">
                                <img src="http://htmldemo.themessoft.com/freshia/version3/images/b-logo4.png"
                                     alt="Image">
                            </a></div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item">
                            <a href="#">
                                <img src="http://htmldemo.themessoft.com/freshia/version3/images/b-logo5.png"
                                     alt="Image">
                            </a></div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item">
                            <a href="#">
                                <img
                                    src="http://htmldemo.themessoft.com/freshia/version3/images/b-logo6.png"
                                    alt="Image">
                            </a></div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item">
                            <a href="#">
                                <img src="http://htmldemo.themessoft.com/freshia/version3/images/b-logo2.png"
                                     alt="Image">
                            </a>
                        </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item">
                            <a href="#">
                                <img src="http://htmldemo.themessoft.com/freshia/version3/images/b-logo4.png"
                                     alt="Image">
                            </a>
                        </div>
                        <!-- End Item -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
