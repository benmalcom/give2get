<header id="topnav">
    <div class="topbar-main bg-success">
        <div class="container">

            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <!--<a href="index.html" class="logo">-->
                <!--Zircos-->
                <!--</a>-->
                <!-- Image Logo -->
                <a href="/" class="logo"><i class="fa fa-exchange"></i>
                    Give2get
                </a>

            </div>
            <!-- End Logo container-->


            <div class="menu-extras">

                <ul class="nav navbar-nav navbar-right pull-right">

                                        <li class="dropdown navbar-c-items">
                        <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ !empty(Auth::user()->avatar_url)  ?  Auth::user()->avatar_url : '/custom/img/no_photo_available.png'}}" alt="user-img" class="img-circle"> </a>
                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                            <li class="text-center">
                                <h5>Hi, Admin</h5>
                            </li>
                            <li><a href="/"><i class="ti-settings m-r-5"></i> Main Site</a></li>
                            <li><a href="/profile"><i class="ti-user m-r-5"></i> Profile</a></li>
                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-5"></i> Logout</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form></li>
                        </ul>

                    </li>
                </ul>
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>
            <!-- end menu-extras -->

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <div class="navbar-custom">
        <div class="container">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li>
                        <a href="/a/dashboard"><i class="mdi mdi-view-dashboard"></i> Dashboard</a>
                    </li>

                    <li><a href="/a/items"><i class="fa fa-shopping-cart"></i> Items</a></li>
                    <li><a href="/a/categories"><i class="fa fa-list"></i> Categories</a></li>
                    <li><a href="/a/transactions"><i class="fa fa-suitcase"></i> Transactions</a></li>
                    <li><a href="/a/users"><i class="fa fa-users"></i> Users</a></li>

                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>