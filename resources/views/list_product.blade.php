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
                                        <a data-id="{{ $product->id }}" data-toggle="modal" data-target="#order" class="btn_1" id="btnAddCart">{{ __('message.add_cart') }}</a>
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

    <div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="modal_product_name"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 20px">
                <form id="form_order">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <input type="text" name="product" id="product_id" value="">
                        <h4 class="modal-title">{{ $product->name }}</h4>
                    </div>
                    <div class="modal-body">
                        <h3>Size</h3>
                        @foreach($sizes as $size)
                            <label class="radio-inline">
                                <input type="radio" name="size" value="{{ $size->id }}">
                                {{ $size->name }}
                            </label>
                        @endforeach
                        <h3>Topping</h3>
                        @foreach($toppings as $topping)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="topping[]" id="topping" value="{{ $topping->id }}">
                                {{ $topping->name }}
                            </label>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSubmitOrder" class="btn btn-primary">Order</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

            $('#btnAddCart').click(function(event) {
                event.preventDefault();
                var product_id = $(this).data('id');
                $(".modal-header #product_id").val( product_id );
            });
        });
    </script>
@endsection
