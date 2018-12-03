<!-- header -->
<div class="header-container">
    <div class="header-top">
        <div class="container">
            <div clashref="#" s="row">
                <!-- Header Language -->
                <div class="col-xs-12 col-sm-6">
                    <div class="dropdown block-language-wrapper">
                        <a role="button" data-toggle="dropdown" data-target="#"
                           class="block-language dropdown-toggle"
                           href="#">
                            <img src="{{ asset('images/vn_flat.png') }}" alt="language">
                            Tiếng Việt
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
                                <a href="#">
                                    <img src="{{ asset('images/en_flat.png') }}" alt="language">
                                    English
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Header Language -->
                </div>
                <div class="col-sm-6 col-xs-12">
                    <!-- Header Top Links -->
                    <div class="toplinks">
                        <div class="links">
                            <div class="demo">
                                <a title="Blog"
                                   href="http://htmldemo.themessoft.com/freshia/version3/blog.html">
                                    <span class="">Blog</span>
                                </a>
                            </div>
                            <div class="check">
                                <a title="Checkout"
                                   href="http://htmldemo.themessoft.com/freshia/version3/checkout.html">
                                    <span class="">Checkout</span>
                                </a>
                            </div>
                            <div class="myaccount">
                                <a title="My Account"
                                   href="http://htmldemo.themessoft.com/freshia/version3/login.html">
                                    <span class="">My Account</span>
                                </a>
                            </div>
                            <div class="login">
                                <a href="http://htmldemo.themessoft.com/freshia/version3/login.html">
                                    <span class="">Log In</span>
                                </a>
                            </div>
                            <div class="login">
                                <a href="http://htmldemo.themessoft.com/freshia/version3/register.html">
                                    <span class="">Register</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Header Top Links -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 logo-block">
                <!-- Header Logo -->
                <div class="logo">
                    <a title="Freshia Basket" href="{{ route('client.index') }}">
                        <img alt="Freshia" src="{{ asset('images/framgia-logo.png') }}">
                    </a>
                </div>
                <!-- End Header Logo -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="search-box">
                    <form name="myform" method="GET" action="#">
                        <input class="thmsearch" type="text" value="" placeholder="Search product here" name="s"
                               maxlength="70">
                        <input type="hidden" value="product" name="post_type">
                        <button class="search-btn-bg" type="submit"><span
                                class="glyphicon glyphicon-search"></span>&nbsp;
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="hotline hidden-xs">
                    <span class="content">
                        <span class="text">Support +0123 456 789</span>
                        <span class="text info2">Email: info@freshia.com</span
                    </span>
                </div>
                <div class="top-cart-contain pull-right">
                    <div class="mini-cart">
                        <div data-hover="dropdown" class="basket dropdown-toggle">
                            <a href="#">
                                <span class="count" id="count_cart">0</span>
                                <span class="woocs_special_price_code">
                                    <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol" id="price_cart">0</span> ₫</span>
                                </span>
                            </a>
                        </div>
                        <div>
                            <div class="top-cart-content" id="cart_box">
                                <!--block-subtitle-->
                                <ul class="mini-products-list" id="cart-sidebar">
                                    
                                </ul>
                                <!--actions-->
                                <div class="actions" id="action_order">
                                    <button class="btn-checkout" title="Checkout" type="button">
                                        <span>Checkout</span>
                                    </button>
                                    <a href="{{ route('client.cart') }}" class="view-cart">
                                        <span>View Cart</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
