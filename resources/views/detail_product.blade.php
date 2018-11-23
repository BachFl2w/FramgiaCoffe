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
                    <h2 class="inner" id="product_name">{{ $product->name }}</h2>

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
                    <form action="{{ route('demo') }}" method="post">
                        @csrf
                        <input type="text" name="product_id" style="height: 36px" value="{{ $product->id }}">
                        <input type="text" name="product_price" style="height: 36px" value="{{ $product->price }}">
                        <input type="checkbox" name="topping[]" style="height: 36px" value="1">1
                        <input type="checkbox" name="topping[]" style="height: 36px" value="2">2
                        <input type="checkbox" name="topping[]" style="height: 36px" value="3">3
                        <button id="btnBuy" class="btn btn-danger" type="submit">Buy</button>
                    </form>
                    <p>Topping</p>
                    <select name="states[]" multiple="multiple" id="topping_list" style="width: 100%">
                        @foreach($toppings as  $topping)
                            <option>{{ $topping->name }}</option>
                        @endforeach
                    </select>
                    @if(Auth::check())
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
                    @endif
                    <h3>{{ __('message.feedback') }}</h3>
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
                        <h4>No comment <span><img height="25px" width="25px"
                                                  src="{{ asset(config('asset.image_path.public') . 'icon_sad.png') }}"></span>
                        </h4>
                    @endif
                </div><!-- End box_style_1 -->
            </div>
        </div><!-- End row -->
    </div><!-- End container -->


    <div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="modal_product_name"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="#">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="modal_product_name"></h5>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="padding: 10px">
                            <div class="col-sm-4">
                                <h4 style="padding: 5px" class="text text-info"></h4>
                            </div>
                            <div class="col-sm-4">
                                <span>Size</span>
                                <select class="form-control">
                                    @foreach($sizes as  $size)
                                        <option>{{ $size->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <span>Size</span>
                                <select name="states[]" multiple="multiple" id="topping_list">
                                    @foreach($toppings as  $topping)
                                        <option>{{ $topping->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="Submit" class="btn btn-primary">Send</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
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
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            var categories = [];

            function setData(data) {
                categories = data;
            }

            $('#btnBuy').click(function (event) {
                var product_name = $('#product_name').html();
                var product_id = $('#product_id').val();
                var number_product = $('#number_product').val();
                $('#modal_product_name').html(product_name + ' (3 san pham)');
                $.ajax({
                    url: route('admin.category.json'),
                    type: 'get',
                    global: false,
                    dataType: '',
                    data: {},
                })
                    .done(function (data) {
                        setData(data)
                    })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function () {
                        console.log(categories);
                    });
            });

            $('#topping_list').select2();

        });
    </script>
@endsection
