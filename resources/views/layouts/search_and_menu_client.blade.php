<nav>
    <div class="container">
        <div class="mm-toggle-wrap">
            <div class="mm-toggle">
                <i class="fa fa-align-justify"></i>
                <span class="mm-label">Menu</span>
            </div>
        </div>
        <div class="nav-inner">
            <ul id="nav" class="hidden-xs">
                <li class="level0 nav-6 level-top noDropdown active"><a class="level-top" href="{{ route('client.index') }}">
                        <span>Home</span> </a>
                <li class="mega-menu">
                    <a class="level-top" href="http://htmldemo.themessoft.com/freshia/version3/grid.html">
                        <span>{{ trans('message.product') }}</span>
                    </a>
                    <div class="level0-wrapper dropdown-6col">
                        <div class="container">
                            <div class="level0-wrapper2">
                                <div class="nav-block nav-block-center" style="min-height: 100px">
                                    <!--mega menu-->
                                    <ul class="level0">
                                        @foreach($category_with_product as $category)
                                            <li class="level3 nav-6-1 parent item">
                                                <a href="">
                                                    <span>{{ $category->name }}</span>
                                                </a>
                                                <ul class="level1">
                                                    @for($i = 0; $i < count($category->products); $i++)
                                                        <li class="level2 nav-6-1-1">
                                                            <a href="{{ route('client.product.detail', ['id' => $category->products[$i]->id]) }}">
                                                                <span>{{ $category->products[$i]->name }}</span>
                                                            </a>
                                                        </li>
                                                    @endfor
                                                    <li class="push_img">
                                                        <img src="{{ asset(config('asset.image_path.category') . $category->image) }}">
                                                    </li>
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="nav-menu-item-3566" class=" pull-right">
                    <a href="#" class="">
                        <span>Winter Sale! <em class="tip hot">HOT<i class="tip-arrow"></i></em></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
