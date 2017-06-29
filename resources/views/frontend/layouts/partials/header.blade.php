<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown">
            <a href="#">Put your item first </a> <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Request for quote</a>
        </div>
        <div class="col-md-6" data-animate="fadeInDown">
            <ul class="menu">
                @if( Auth::check())
                    @if( Auth::user()->isAdmin())
                        <li><a href="{{url('/admin/dashboard')}}">Admin</a></li>
                    @endif
                    <li><a href="{{url('/profile')}}">Profile</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @else
                    <li><a href="{{url('/login')}}" >Login</a></li>
                    <li><a href="{{url('/register')}}">Register</a></li>
                @endif
            </ul>
        </div>
    </div>

</div>

<!-- *** TOP BAR END *** -->

<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="{{url('/')}}" data-animate-hover="bounce">
                {{$appName}}
            {{--    <img src="{{asset('img/logo.png')}}" alt="Obaju logo" class="hidden-xs">
                <img src="{{asset('img/logo-small.png')}}" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
            --}}</a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="{{url('items/add')}}">
                    <i class="fa fa-plus-square"></i>  <span class="hidden-xs">Post your item</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="{{url('/')}}">Home</a>
                </li>
                <li><a href="{{url('/how-it-works')}}">How It Works</a></li>
                <li><a href="{{url('/faqs')}}">FAQs</a></li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                            @if(isset($categories) && count($categories) > 0)
                                @foreach($categories as $category)
                                <li><a href="/categories/{{$category->hashed_id}}/items"> {{ucfirst($category->name)}}</a>
                                @endforeach

                            @else
                                <li class="text-danger">No categories yet!</li>
                            @endif
                            <!-- /.yamm-content -->

                    </ul>
                </li>
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="{{url('items/add')}}" class="btn btn-primary navbar-btn"><i class="fa fa-plus-square"></i><span class="hidden-sm">Post your item</span></a>
            </div>
            <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right" id="search-not-mobile">
                {{--<button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>--}}
                <a href="#" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#login-modal"><i class="fa fa-search"></i></a>
            </div>

        </div>

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog simplebox">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Search for an Item</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/search')}}" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control input-lg" id="term" name="term" placeholder="Type item name to search">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="category_id">
                                    <option value=""> --Category ?-- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"> {{ucfirst($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="state_id">
                                    <option value=""> --State ?-- </option>
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}"> {{ucfirst($state->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <p class="text-left">
                                <button class="btn btn-primary"><i class="fa fa-search"></i> Submit</button>
                            </p>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        {{--<div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                </div>
            </form>

        </div>--}}
        <!--/.nav-collapse -->

    </div>
    <!-- /.container -->
</div>