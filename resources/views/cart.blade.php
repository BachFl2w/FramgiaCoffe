@extends('layouts.app_client')
@section('content')
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
                <div class="cart wow bounceInUp animated">
                    <div class="page-title">
                        <h2>Shopping Cart</h2>
                    </div>
                    <div id="box-cart">
                        @if(count($carts))
                            <div class="table-responsive">
                                <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
                                <fieldset>
                                    <table class="data-table cart-table" id="shopping-cart-table">
                                        <colgroup>
                                            <col width="1">
                                            <col>
                                            <col width="1">
                                            <col width="1">
                                            <col width="1">
                                            <col width="1">
                                            <col width="1">
                                        </colgroup>
                                        <thead>
                                        <tr class="first last">
                                            <th rowspan="1">&nbsp;</th>
                                            <th rowspan="1"><span class="nobr">Product</span></th>
                                            <th rowspan="1"></th>
                                            <th class="a-center" rowspan="1">Qty</th>
                                            <th colspan="1" class="a-center">Subtotal</th>
                                            <th class="a-center" rowspan="1">&nbsp;</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr class="first last">
                                            <td class="a-right last" colspan="50">

                                                <button class="button btn-continue" type="button">
                                                    <span>Continue Shopping</span>
                                                </button>
                                                <button class="button btn-empty" id="checkout"
                                                        data-user="{{ $user }}">
                                                    <span>Check out</span>
                                                </button>
                                                <button id="empty_cart_button" class="button btn-empty">
                                                    <span>Clear Cart</span>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="first">
                                            <td>
                                                <p class="" style="font-size: 25px;display: ruby;">
                                                    Totals: <span class="price_cart" id="price_cart"
                                                                  style="color: red;font-weight: 400;"></span>
                                                    ₫</p>
                                            </td>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($carts as $cart)
                                            <tr class="first odd">
                                                <td class="image">
                                                    <a class="product-image"
                                                       href="{{ route('client.product.detail', ['id' => $cart['item']['product']->id]) }}">
                                                        <img width="75"
                                                             src="{{ asset('images/products/' . $cart['item']['product']->image) }}">
                                                    </a>
                                                </td>
                                                <td>
                                                    <h2 class="product-name">
                                                        <a style="font-size: 20px;margin-bottom: 20px"
                                                           href="{{ route('client.product.detail', ['id' => $cart['item']['product']->id]) }}">
                                                            {{ $cart['item']['product']->name }}
                                                        </a>
                                                        <p>
                                                            @foreach($cart['item']['toppings'] as $topping)
                                                                <span style="padding: 2px 15px;margin-left: 5px;border-radius: 15px;font-size: 15px;background-color: #ADFF2F
                                                            ">{{ $topping->name }}</span>
                                                            @endforeach
                                                        </p>
                                                    </h2>
                                                </td>
                                                <td class="a-center">
                                                    <a title="Edit item parameters" class="edit-bnt" href="">
                                                    </a>
                                                </td>

                                                <td class="a-center movewishlist">
                                                    <input type="text" maxlength="12" min="1" max="10"
                                                           class="input-text qty"
                                                           size="4" pattern="\d*"
                                                           value="{{ $cart['item']['quantity'] }}" id="quantity-cart"
                                                           data-id="{{ $cart['key'] }}">
                                                </td>
                                                <td class="a-right movewishlist">
                                            <span class="cart-price">
                                                <span class="price">{{ number_format($cart['item_price']) . ' ₫' }}</span>
                                            </span>
                                                </td>
                                                <td class="a-center last">
                                                    <a class="button remove-item"
                                                       data-id={{ $cart['key'] }} href="{{ route('user.cart.delete', ['key' => $cart['key']]) }}">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </fieldset>
                            </div>
                        @else
                            <h2>Nothing here</h2>
                        @endif
                    </div>
                </div>
                <div class="container-fluid" hidden id="div-check-out">
                    <div class="page-title">
                        <h2>Checkout</h2>
                    </div>
                    <div class="col-md-7">
                        <form id="form-checkout" action="{{ route('client.checkout') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="receiver">Receiver:</label>
                                <input type="text" class="form-control" id="checkout-receiver" name="receiver"
                                       placeholder="Name Receirver">
                            </div>
                            <div class="form-group">
                                <label for="place">Order Place:</label>
                                <input type="text" class="form-control" id="checkout-place" name="place"
                                       placeholder="Place Order">
                            </div>
                            <div class="form-group">
                                <label for="phone">Order Phone:</label>
                                <input type="text" class="form-control" name="phone" id="checkout-phone"
                                       placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="note">Note:</label>
                                <textarea class="form-control" name="note" id="checkout-note"
                                          placeholder="Note"></textarea>
                            </div>
                            <button type="submit" class="button btn-default" id="btn_checkout">Order</button>
                        </form>
                    </div>
                </div>
                {{-- <div class="crosssel bounceInUp animated">
                    <div class="also-like">
                        <div class="new_title">
                            <h2>you may be interested</h2>
                        </div>
                        <div class="category-products">
                            <ul class="products-grid">
                                <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <div class="item-inner">
                                        <div class="item-img">
                                            <div class="item-img-info">
                                                <figure class="img-responsive">
                                                    <a class="product-image" title="Retis lapen casen" href="">
                                                        <img alt="Retis lapen casen"
                                                             src="http://htmldemo.themessoft.com/freshia/version3/product-images/product10.jpg">
                                                    </a>
                                                </figure>
                                                <div class="box-hover">
                                                    <ul class="add-to-links">
                                                        <li>
                                                            <a class="detail-bnt yith-wcqv-button link-quickview">
                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a title="favorite" href="#"
                                                               class="add_to_wishlist link-wishlist"></a>
                                                        </li>
                                                        <li>
                                                            <a title="like" href="#"
                                                               class="link-compare add_to_compare compare"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-info">
                                            <div class="info-inner">
                                                <div class="item-title">
                                                    <a href="">Retis lapen casen </a>
                                                </div>
                                                <div class="item-content">
                                                    <div class="rating">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div style="width:80%" class="rating"></div>
                                                            </div>
                                                            <p class="rating-links">
                                                                <a href="#">1 Review(s)</a>
                                                                <span class="separator">|</span>
                                                                <a href="#">Add Review</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="item-price">
                                                        <div class="price-box">
                                                            <span class="regular-price">
                                                                <span class="price">$155.00</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="action">
                                                        <a href="#" class="button product_type_grouped btn-cart ">
                                                            <span>View products</span>
                                                        </a>
                                                        <a href="#" class="button yith-wcqv-button"
                                                           data-product_id="99">Quick View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
