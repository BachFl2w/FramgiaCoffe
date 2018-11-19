@extends('layouts.app_client')

@section('content')
    <!-- Content ================================================== -->
    <div class="container margin_60">

        <div class="main_title">
            <h2 class="nomargin_top">{{ __('message.index.method') }}</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box_home" id="one">
                    <span>1</span>
                    <h3>{{ __('message.index.search') }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="two">
                    <span>2</span>
                    <h3>{{ __('message.index.feedback') }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="three">
                    <span>3</span>
                    <h3>{{ __('message.index.pay') }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="four">
                    <span>4</span>
                    <h3>{{ __('message.index.delivery') }}</h3>
                </div>
            </div>
        </div><!-- End row -->

        <div id="delivery_time" class="hidden-xs">
            <strong><span>1</span> <span>5 '</span></strong>
            <h4>{{ __('message.index.delivery_time') }}</h4>
        </div>
    </div><!-- End container -->

    <div class="white_bg">
        <div class="container margin_60">

            <div class="main_title">
                <h2 class="nomargin_top">{{ __('message.index.best') }}</h2>
            </div>

            <div class="row">
                @foreach($data as $product)
                    <div class="col-md-6">
                        <a href="detail_page.html" class="strip_list">
                            <div class="ribbon_1">{{ __('message.index.popular') }}</div>
                            <div class="desc">
                                <div class="thumb_strip">
                                    <img src="{{ asset(config('asset.image_path.product') . $product->image->name) }}"
                                         alt="">
                                </div>
                                <div class="rating">
                                    <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                        class="icon_star voted"></i><i class="icon_star voted"></i><i
                                        class="icon_star"></i>
                                </div>
                                <h3>{{ $product->name }}</h3>
                                <div class="type">
                                    {{ $product->category }}
                                </div>
                                <div class="location">
                                    {{ __('message.price') }}: <span
                                        class="opening">{{ number_format($product->price) . ' ₫'}}</span>
                                </div>
                                <ul>
                                    <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                    <li>Delivery<i class="icon_close_alt2 no"></i></li>
                                </ul>
                            </div><!-- End desc-->
                        </a>
                    </div>
                @endforeach
            </div><!-- End row -->

        </div><!-- End container -->
    </div><!-- End white_bg -->

    <div class="high_light">
        <div class="container">
            <h3>{{ __('message.index.count', ['number' => 200]) }}</h3>
            <a href="list_page.html">{{ __('message.title.feedback') }}</a>
        </div><!-- End container -->
    </div><!-- End hight_light -->

    <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/image_background2.jpg') }}"
             data-natural-width="1200" data-natural-height="600">
        <div class="parallax-content">
            <div class="sub_content">
                <i class="icon_mug"></i>
                <h3>{{ __('message.index.office') }}</h3>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->
    <!-- End Content =============================================== -->

    <div class="container margin_60">
        <div class="main_title margin_mobile">
            <h2 class="nomargin_top">{{ __('message.index.work') }}</h2>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <a class="box_work" href="submit_restaurant.html">
                    <img src="img/submit_restaurant.jpg" width="848" height="480" alt="" class="img-responsive">
                    <h3>{{ __('message.index.restaurant') }}</h3>
                    <p>Lorem ipsum dolor sit amet, ut virtute fabellas vix, no pri falli eloquentiam adversarium. Ea
                        legere labore eam. Et eum sumo ocurreret, eos ei saepe oratio omittantur, legere eligendi
                        partiendo pro te.</p>
                    <div class="btn_1">Read more</div>
                </a>
            </div>
            <div class="col-md-4">
                <a class="box_work" href="submit_driver.html">
                    <img src="img/delivery.jpg" width="848" height="480" alt="" class="img-responsive">
                    <h3>{{ __('message.index.driver') }}</h3>
                    <p>Lorem ipsum dolor sit amet, ut virtute fabellas vix, no pri falli eloquentiam adversarium. Ea
                        legere labore eam. Et eum sumo ocurreret, eos ei saepe oratio omittantur, legere eligendi
                        partiendo pro te.</p>
                    <div class="btn_1">Read more</div>
                </a>
            </div>
        </div>
    </div>
@endsection
