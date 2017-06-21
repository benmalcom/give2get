<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        <h3 class="panel-title">User section</h3>
    </div>

    <div class="panel-body">

        <ul class="nav nav-pills nav-stacked">
            <li @if(Request::path() == "profile")class="active"@endif>
                <a href="{{'/profile'}}"><i class="fa fa-user"></i> My Profile</a>
            </li>
            <li @if(Request::path() == "change-password")class="active"@endif>
                <a href="{{'/change-password'}}"><i class="fa fa-user-secret"></i> Change Password</a>
            </li>
            <li  @if(Request::path() == "my-items")class="active"@endif>
                <a href="{{'/my-items'}}"><i class="fa fa-list"></i> My Items</a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>

</div>