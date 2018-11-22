@extends('layouts.app_client')

@section('position')
    <li><a href="#0">{{ __('message.title.home') }}</a></li>
    <li class="active"><a>{{ __('message.hot_product') }}</a></li>
@endsection

@section('content')
    <!-- Content ================================================== -->
    <div class="container margin_60_35">
        <div class="row">

            <div class="col-md-3">

                <div id="filters_col">
                    <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false"
                       aria-controls="collapseFilters" id="filters_col_bt">Filters <i
                            class="icon-plus-1 pull-right"></i></a>
                    <div class="collapse" id="collapseFilters">
                        <div class="filter_type">{{--
                    	<h6>Distance</h6>
                        <input type="text" id="range" value="" name="range"> --}}
                            <h6>Type</h6>
                            <ul>
                                <li><label><input type="radio" name="filter" checked
                                                  class="icheck">{{ __('message.all') }}
                                        <small>{{ '(' . $total_product . ')' }}</small>
                                    </label></li>
                                @foreach($categories as $category)
                                    <li>
                                        <label>
                                            <input type="radio" name="filter" checked
                                                   class="icheck">{{ $category->name }}
                                            <small>{{ '(' . $category->products_count . ')' }}</small>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--End collapse -->
                </div><!--End filters col-->
            </div><!--End col-md -->

            <div class="col-md-9">

                <div id="tools">
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
                </div><!--End tools -->
                @foreach($products as $product)
                    <div class="strip_list wow fadeIn" data-wow-delay="0.1s">
                        {{-- <div class="ribbon_1">
                            Popular
                        </div> --}}
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <div class="desc">
                                    <div class="thumb_strip">
                                        <a href="detail_page.html"><img
                                                src="{{ asset(config('asset.image_path.product') . $product->images[0]->name) }}"
                                                alt=""></a>
                                    </div>
                                    <div class="rating">
                                        <i class="icon_star voted"></i>
                                        <i class="icon_star voted"></i>
                                        <i class="icon_star voted"></i>
                                        <i class="icon_star voted"></i>
                                        <i class="icon_star"></i> (
                                        <small><a href="#0">98 reviews</a></small>
                                        )
                                    </div>
                                    <h3>{{ $product->name }}</h3>
                                    <div class="type">
                                        {{ $product->category->name }}
                                    </div>
                                    <div class="location">
                                        {{ $product->description }}
                                        <span class="opening">Opens at 17:00.</span>
                                    </div>
                                    <ul>
                                        <li>Take away<i class="icon_check_alt2 ok"></i></li>
                                        <li>Delivery<i class="icon_check_alt2 no"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="go_to">
                                    <div>
                                        <a href="detail_page.html" class="btn_1">{{ __('message.add_cart') }}</a>i
                                    </div>
                                </div>
                            </div>
                        </div><!-- End row-->
                    </div>
                @endforeach
                {!! $products->links() !!}

                {{-- <a href="#0" class="load_more_bt wow fadeIn" data-wow-delay="0.2s"></a> --}}
            </div><!-- End col-md-9-->

        </div><!-- End row -->
    </div><!-- End container -->

@endsection
