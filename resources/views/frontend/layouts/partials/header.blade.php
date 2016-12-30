<div id="first" class="container-fluid bg-white shadow-lite">
    <!-- Single button -->
    <div class="btn-group mt-5 ml-20">
        <a class="text-primary"><strong><i class="fa fa-facebook"></i></strong></a> |
        <a class="text-info"><strong><i class="fa fa-twitter"></i></strong></a> |
        <a class="text-black"><strong><i class="fa fa-instagram"></i></strong></a> |

        <a class="text-black text-muted"><strong><i class="fa fa-whatsapp text-success"></i></strong> 080923234519</a>


    </div>
    <div class="btn-group pull-right mt-5 mr-5">
        <a href="#" class="btn bg-custom btn-xs dropdown-toggle account-btn simplebox" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user"></span> 
            Account
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            @if(Auth::check())
                @if(Auth::user()->isVerified())
                    <li>
                        <div class="navbar-login">
                            <div class="row">
                                <div class="col-sm-4 col-xs-4">
                                    <img src="{{ !empty(Auth::user()->avatar_url)  ?  Auth::user()->avatar_url : '/custom/img/no_photo_available.png'}}" style="width: 100%;">
                                </div>
                                <div class="col-sm-8 col-xs-8">
                                    <p class="text-left"><strong>{{Auth::user()->fullName()}}</strong></p>
                                    <p class="text-left small">{{Auth::user()->email}}</p>
                                    <p>
                                        <a href="/profile" class="btn btn-default btn-sm"> My Dashboard</a>
                                        @if(Auth::user()->isAdmin())
                                            <a href="/a/dashboard" class="btn btn-warning btn-sm"> Admin</a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                @else
                    <li><a href="/activate-account" class="p-5"><strong class="text-danger"><i class="fa fa-info-circle"></i> Activate your account</strong></a></li>
                @endif
                <li class="divider"></li>
                <li>
                    <div class="navbar-login navbar-login-session">
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger btn-block"><i class="fa fa-power-off"></i> Logout</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            @else
                <li>
                    <div class="navbar-login simplebox">
                        <div class="btn-group btn-group-justified auth-parent" role="group" aria-label="...">
                            <a href="/login" class="btn btn-default btn-sm"><strong>Login</strong></a>
                            <a href="/register" class="btn btn-warning btn-sm"><strong>Register</strong></a>
                        </div>
                    </div>
                </li>
        </ul>
        @endif
    </div>
</div>
<nav class="navbar navbar-fixed-top navbar-custom shadow-lite">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-custom" href="/"><i class="fa fa-exchange"></i> Give2get</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            {{--<a href="/items/add" class="pull-right mt-15"><i class="fa fa-plus"></i> Exchange your item</a>--}}
            <p class="navbar-text navbar-right mr-5 add-item-parent"><a href="/items/add" class="navbar-link btn btn-default"><i class="fa fa-plus text-custom"></i> Exchange your item</a></p>
            <ul class="nav navbar-nav navbar-right mr-5 p-5">
                <li ><a href="/"><i class="fa fa-home"></i> Home</a></li>
                <li ><a href="/how-it-works"><i class="fa fa-info-circle"></i> How it works</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>