@extends('layouts.app_client')

@section('position')
    <li><a href="{{ route('client.index') }}">{{ __('message.title.home') }}</a></li>
    <li class="active"><a>{{ __('message.product') }}</a></li>
@endsection

@section('content')
    <!-- Content ================================================== -->
    <div class="container margin_60_35">
        <div class="row">
            <div class=" col-md-12">
                {{-- <div id="tools">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="styled-select">
                                <select name="sort_rating" id="sort_rating">
                                    <option value="" selected>Sort by ranking</option>
                                    <option value="lower">Lowest ranking</option>
                                    <option value="higher">Highest ranking</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div><!--End tools --> --}}
                @foreach($products as $product)
                    <div class="strip_list wow fadeIn" data-wow-delay="0.1s">
                        {{-- <div class="ribbon_1">
                            Popular
                        </div> --}}
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <a href="{{ route('client.product.detail', ['id' => $product->id]) }}">
                                <div class="desc row">
                                    <div class="col-md-4">
                                        <div class="thumb_strip">
                                            <img src="{{ asset(config('asset.image_path.product') . $product->images[0]->name) }}"
                                                    alt="Image product">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="rating">
                                            <i class="icon_star voted"></i>
                                            <i class="icon_star voted"></i>
                                            <i class="icon_star voted"></i>
                                            <i class="icon_star voted"></i>
                                            <i class="icon_star"></i> (
                                            <small>98 reviews</small>
                                            )
                                        </div>
                                            <h3>{{ $product->name }}</h3>
                                        <div class="type" style="font-size: 15px">
                                            {{ $product->category->name }}
                                        </div>
                                        <div class="location">
                                            <strong class="opening" style="font-size: 25px">{{ number_format($product->price) . ' ₫' }}</strong>
                                        </div>
                                        <ul>
                                            <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                            <li>Delivery<i class="icon_check_alt2 no"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                </a>
                            </div>
                            
                            <div class="col-md-3 col-sm-3">
                                <div class="go_to">
                                    {{-- <div id="div_buy">
                                        <input type="text" name="id" id="product_id" value="{{ $product->id }}">
                                        <button type="submit" data-toggle="modal" data-target="#order" class="btn_1" id="btnAddCart">{{ __('message.add_cart') }}</button>
                                    </div> --}}
                                </div>
                            </div>
                        </div><!-- End row-->
                    </div>
                @endforeach
                {!! $products->appends(request()->input())->links() !!}

                {{-- <a href="#0" class="load_more_bt wow fadeIn" data-wow-delay="0.2s"></a> --}}
            </div><!-- End col-md-9-->

        </div><!-- End row -->
    </div><!-- End container -->

@endsection
