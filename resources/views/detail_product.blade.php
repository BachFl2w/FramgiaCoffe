@extends('layouts.app_client')

@section('position')
    <li><a href="#0">Home</a></li>
    <li><a href="#0">Hot Product</a></li>
    <li>Page active</li>
@endsection

@section('content')
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-md-4">
                <div class="box_style_2">
                    <h4 class="nomargin_top">{{ __('message.opening_time') }}<i class="icon_clock_alt pull-right"></i>
                    </h4>
                    <ul class="opening_list">
                        <li>{{ __('message.monday') }}<span>{{ config('asset.constaint.time') }}</span></li>
                        <li>{{ __('message.tuesday') }}<span>{{ config('asset.constaint.time') }}</span></li>
                        <li>{{ __('message.wednesday') }} <span
                                class="label label-danger">{{ __('message.closed') }}</span></li>
                        <li>{{ __('message.thursday') }}<span>{{ config('asset.constaint.time') }}</span></li>
                        <li>{{ __('message.friday') }}<span>{{ config('asset.constaint.time') }}</span></li>
                        <li>{{ __('message.saturday') }}<span>{{ config('asset.constaint.time') }}</span></li>
                        <li>{{ __('message.sunday') }} <span
                                class="label label-danger">{{ __('message.closed') }}</span></li>
                    </ul>
                </div>
                <div class="box_style_2 hidden-xs" id="help">
                    <i class="icon_lifesaver"></i>
                    <h4>{{ __('message.need_help') }}</h4>
                    <a href="tel://004542344599" class="phone">{{ config('asset.constaint.phone') }}</a>
                    <small>{{ __('message.monday') }} {{ __('message.to') }} {{ __('message.friday') }} {{ config('asset.constaint.time_help') }}</small>
                </div>
            </div>

            <div class="col-md-8">
                <div class="box_style_2">
                    <h2 class="inner">Description</h2>

                    <div id="Img_carousel" class="slider-pro">
                        <div class="sp-slides">
                            @foreach($product->images as $image)
                                <div class="sp-slide">
                                    <img class="sp-image"
                                         src="{{ asset(config('asset.image_path.product') . $image->name ) }}"
                                         data-src="{{ asset(config('asset.image_path.product') . $image->name) }}"
                                         data-small="{{ asset(config('asset.image_path.product') . $image->name) }}"
                                         data-medium="{{ asset(config('asset.image_path.product') . $image->name) }}"
                                         data-large="{{ asset(config('asset.image_path.product') . $image->name)  }}"
                                         data-retina="{{ asset(config('asset.image_path.product') . $image->name) }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="sp-thumbnails">
                            @foreach($product->images as $image)
                                <img alt="" class="sp-thumbnail"
                                     src="{{ asset(config('asset.image_path.product') . $image->name ) }}">
                            @endforeach
                        </div>
                    </div>
                    <h3>{{ __('message.order_detai_title.description') }}</h3>
                    <p>
                        {{ $product->description }}
                    </p>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myReview">Add</a>
                    <div id="summary_review">
                        <div id="general_rating">
                            {{ __('message.feedback') }}
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" style="resize: none"
                                      placeholder="{{ __('message.enter_feedback') }}" rows="3"></textarea>
                        </div>
                        <hr class="styled">
                        <a href="#" class="btn_1 add_bottom_15">Send</a>
                    </div><!-- End summary_review -->
                    @if(count($product->feedbacks) != 0)
                        @foreach($product->feedbacks as $feedback)
                            <div class="review_strip_single">
                                @if ($feedback->image)
                                    <img alt="Avatar" class="img-circle" height="68px" width="68px"
                                         src="{{ asset(config('asset.image_path.avatar') . $feedback->image) }}">
                                @else
                                    <img alt="Avatar" class="img-circle" height="68px" width="68px"
                                         src="{{ asset('images/default.jpeg') }}">
                                @endif
                                <small>{{ $feedback->create_at }}</small>
                                <h4>{{ $feedback->name }}</h4>
                                <p>
                                    {{ $feedback->content }}
                                </p>

                            </div>
                        @endforeach
                    @else
                        <h3>No comment <span><img height="25px" width="25px"
                                                  src="{{ asset(config('asset.image_path.public') . 'icon_sad.png') }}"></span>
                        </h3>
                    @endif
                </div><!-- End box_style_1 -->
            </div>
        </div><!-- End row -->
    </div><!-- End container -->

    <div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                <form action="#" class="popup-form" id="myRegister">
                    <div class="login_icon"><i class="icon_lock_alt"></i></div>
                    <input type="text" class="form-control form-white" placeholder="Name">
                    <input type="text" class="form-control form-white" placeholder="Last Name">
                    <input type="email" class="form-control form-white" placeholder="Email">
                    <input type="text" class="form-control form-white" placeholder="Password" id="password1">
                    <input type="text" class="form-control form-white" placeholder="Confirm password" id="password2">
                    <div id="pass-info" class="clearfix"></div>
                    <div class="checkbox-holder text-left">
                        <div class="checkbox">
                            <input type="checkbox" value="accept_2" id="check_2" name="check_2"/>
                            <label
                                for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-submit">Register</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End Content =============================================== -->
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function ($) {
            $('#Img_carousel').sliderPro({
                width: 960,
                height: 500,
                fade: true,
                arrows: true,
                buttons: false,
                fullScreen: false,
                smallSize: 500,
                startSlide: 0,
                mediumSize: 1000,
                largeSize: 3000,
                thumbnailArrows: true,
                autoplay: false
            });
        });
    </script>
@endsection
