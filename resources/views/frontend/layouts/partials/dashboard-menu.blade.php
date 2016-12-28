<div class="col-sm-10 col-sm-offset-1 bg-white mt-15 shadow-lite">
    <div class="mt-20 text-black">
        <ul class="nav nav-pills mb-20 dashboard-menu">
            <li role="presentation" @if(Request::path() == "my-items")class="active"@endif><a href="/my-items">My Items</a></li>
            <li role="presentation" @if(Request::path() == "my-transactions")class="active"@endif><a href="/my-transactions">My Transactions</a></li>
            <li role="presentation" @if(Request::path() == "profile")class="active"@endif ><a href="/profile">Profile</a></li>
            <li role="presentation" @if(Request::path() == "change-password")class="active"@endif><a href="/change-password">Change Password</a></li>
        </ul>
    </div>
</div>