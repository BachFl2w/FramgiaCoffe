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
                            <form action="{{ route('client.list_product.filter') }}" id="form-filter" method="get">
                                {{-- @csrf --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category_id"
                                           id="filter"
                                           value="0">
                                    <label class="form-check-label" for="exampleRadios1">
                                        All {{ '(' . $total_product . ')' }}
                                    </label>
                                </div>
                                @foreach($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category_id"
                                               id="filter"
                                               value="{{ $category->id }}">
                                        <label class="form-check-label" for="exampleRadios2">
                                            {{ $category->name . ' (' . $category->products_count . ')'}}
                                        </label>
                                    </div>
                                @endforeach
                            </form>
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
                                    <div>
                                        <a href="detail_page.html" class="btn_1">{{ __('message.add_cart') }}</a>
                                    </div>
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
@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#form-filter').change(function () {
                selected_value = $("input[name='category_id']:checked").val();
                $(this).submit();
            });
        });
    </script>
@endsection
