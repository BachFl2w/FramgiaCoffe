<!-- Navigation -->
<nav>
    <div class="container">
        <div class="mm-toggle-wrap">
            <div class="mm-toggle"><i class="fa fa-align-justify"></i><span class="mm-label">Menu</span></div>
        </div>
        <div class="nav-inner">
            <!-- BEGIN NAV -->
            <ul id="nav" class="hidden-xs">
                <li class="level0 nav-6 level-top noDropdown active"><a class="level-top" href="#">
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
                                                            <a href="">
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
                <li class="mega-menu">
                    <a class="level-top" href="http://htmldemo.themessoft.com/freshia/version3/grid.html">
                        <span>Furniture</span>
                    </a>
                    <div class="level0-wrapper dropdown-6col">
                        <div class="container">
                            <div class="level0-wrapper2">
                                <div class="nav-block nav-block-center grid12-8 itemgrid itemgrid-4col">
                                    <ul class="level0">
                                        <li class="level3 nav-6-1 parent item">
                                            <a href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>American</span></a>
                                            <ul class="level1">
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>American sub</span></a>
                                                </li>
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Beef on weck</span></a>
                                                </li>
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Bologna sandwich</span></a>
                                                </li>
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Cheese Dream</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="level3 nav-6-1 parent item">
                                            <a href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Mexican</span></a>
                                            <ul class="level1">
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Torta</span></a>
                                                </li>
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Cemita</span></a>
                                                </li>
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Toast</span></a>
                                                </li>
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Chanclas</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="level3 nav-6-1 parent item">
                                            <a href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Grilled</span></a>
                                            <ul class="level1">
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Cheese</span></a>
                                                </li>
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Chocolate</span></a>
                                                </li>
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Garlic Cheese</span></a>
                                                </li>
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Veg Cheese</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="level3 nav-6-1 parent item">
                                            <a href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Clubbed</span></a>
                                            <ul class="level1">
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Triple Decker California</span></a>
                                                </li>
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Tempeh Reuben</span></a>
                                                </li>
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Mediterranean Veggie</span></a>
                                                </li>
                                                <li class="level2 nav-6-1-1"><a
                                                            href="http://htmldemo.themessoft.com/freshia/version3/grid.html"><span>Leftover Turkey</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="nav-block nav-block-right std grid12-4">
                                    <img src="http://htmldemo.themessoft.com/freshia/version3/images/banner3.png">
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
            <!--nav-->
        </div>
    </div>
</nav>
<!-- <!-- end nav -->
