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
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Quản lý hệ thống</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('admin.user.index') }}"> <i class="menu-icon ti-user"></i>Quản lý người dùng </a>
                </li>
                <li>
                    <a href="{{ route('admin.role.index') }}"> <i class="menu-icon ti-user"></i>Quản lý Vai trò </a>
                </li>

                <h3 class="menu-title">Quản lý kinh doanh</h3><!-- /.menu-title -->

                <li>
                    <a href="{{ route('admin.category.index') }}"> <i class="menu-icon ti-email"></i>Quản lý loại sản phẩm </a>
                </li>

                <li>
                    <a href="{{ route('admin.product.index') }}"> <i class="menu-icon ti-email"></i>Quản lý sản phẩm </a>
                </li>

                <li>
                    <a href="{{ route('admin.topping.index') }}"> <i class="menu-icon ti-email"></i>Quản lý topping </a>
                </li>
                <h3 class="menu-title">Quản lý hóa đơn</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('admin.order.index') }}"> <i class="menu-icon ti-email"></i>Quản lý hóa đơn </a>
                </li>

                <h3 class="menu-title">Thống kê</h3><!-- /.menu-title -->
                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-email"></i>Thống kê hóa đơn </a>
                </li>

                <li>
                    <a href="{{ route('admin.feedback.index')}}"> <i class="menu-icon ti-email"></i>Quản lý phản hồi </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
