<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-bold text-dark">
            MyClassified
        </span>
    </a>
    <p class="mb-0 bg-danger text-center ">ADMIN PANEL</p>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-0 pb-3 pt-3 d-flex bg-light">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-black-50"> {{Auth::User()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{route('admins.index')}}" class="nav-link @if($currentPage == 'dashboard') active @endif">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('advertisements.index')}}" class="nav-link @if($currentPage == 'advertisements') active @endif">
                        <i class="nav-icon fa fa-buysellads"></i>
                        <p>
                            Advertisements
                            {{--<span class="right badge badge-danger"></span>--}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link @if($currentPage =='categories') active @endif">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Categories
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('subcategories.index')}}" class="nav-link @if($currentPage== 'subcategories') active @endif">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Sub-Categories
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('countries.index')}}" class="nav-link @if($currentPage== 'countries') active @endif">
                        <i class="nav-icon fa fa-map-marker"></i>
                        <p>
                            Countries
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li><li class="nav-item">
                    <a href="{{route('cities.index')}}" class="nav-link @if($currentPage== 'cities') active @endif">
                        <i class="nav-icon fa fa-map-marker"></i>
                        <p>
                            Cities
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('orders.index')}}" class="nav-link @if($currentPage== 'orders') active  @endif">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>
                            Orders
                            {{--<span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
