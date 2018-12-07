<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{ asset('images/framgia-logo.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset('images/framgia2.png') }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('admin.index') }}"> <i class="menu-icon fa fa-dashboard"></i>{{ __('Dashboard') }}</a>
                </li>
                <h3 class="menu-title">{{ __('Manager System') }}</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('admin.user.index') }}"> <i class="menu-icon fa fa-user"></i>{{ __('Manager User') }}</a>
                </li>
                <li>
                    <a href="{{ route('admin.role.index') }}"> <i class="menu-icon fa fa-user"></i>{{ __('Manager Role') }}</a>
                </li>
                <li>
                    <a href="{{ route('admin.feedback.index')}}"> <i class="menu-icon fa fa-user"></i>{{ __('Manager Feedback') }}</a>
                </li>

                <h3 class="menu-title">{{ __('Manager Business') }}</h3><!-- /.menu-title -->

                <li>
                    <a href="{{ route('admin.category.index') }}"> <i class="menu-icon fa fa-user"></i>{{ __('Manager Category') }}</a>
                </li>

                <li>
                    <a href="{{ route('admin.product.index') }}"> <i class="menu-icon fa fa-user"></i>{{ __('Manager Product') }}</a>
                </li>

                <li>
                    <a href="{{ route('admin.size.index') }}"> <i class="menu-icon fa fa-user"></i>{{ __('Manager Size') }}</a>
                </li>

                <li>
                    <a href="{{ route('admin.topping.index') }}"> <i class="menu-icon fa fa-user"></i>{{ __('Manager Topping') }}</a>
                </li>
                <h3 class="menu-title">{{ __('Manager Bill') }}</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('admin.order.index') }}"> <i class="menu-icon fa fa-user"></i>{{ __('Manager Bill') }}</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
