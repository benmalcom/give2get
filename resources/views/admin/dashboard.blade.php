@extends('admin.layouts.default')
@section('content')
        <!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-primary">
            <i class="mdi mdi-chart-areaspline widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Items</p>
                <h2><span data-plugin="counterup">{{$items_count}}</span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                <p class="text-muted m-0"><b>Today:</b> {{$items_today_count}}</p>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-warning">
            <i class="mdi mdi-layers widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Item Categories</p>
                <h2><span data-plugin="counterup">{{$categories_count}} </span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                <p class="text-muted m-0"><b>Today:</b> {{$categories_today_count}}</p>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-danger">
            <i class="mdi mdi-access-point-network widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Transactions</p>
                <h2><span data-plugin="counterup">{{$transactions_count}}</span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                <p class="text-muted m-0"><b>Today:</b> {{$transactions_today_count}}</p>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-lg-3 col-md-6">
        <div class="card-box widget-box-two widget-two-success">
            <i class="mdi mdi-account-convert widget-two-icon"></i>
            <div class="wigdet-two-content">
                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">Users</p>
                <h2><span data-plugin="counterup">{{$users_count}} </span> <small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
                <p class="text-muted m-0"><b>Today:</b> {{$users_today_count}}</p>
            </div>
        </div>
    </div><!-- end col -->

</div>
<!-- end row -->


<div class="row">

    <div class="col-md-4">
        <div class="card-box" style="height: auto !important;">
            <h4 class="header-title m-t-0 m-b-30">Recent Items</h4>
            @if(isset($items) && count($items) > 0)
                <div class="inbox-widget slimscroll-alt">
                    @foreach($items as $index=>$item)
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="{{ isset($item->images) && count($item->images) >0   ?  $item->images[0]->url : '/custom/img/image_not_available.png'}}" class="img-circle" alt=""></div>
                                <p class="inbox-item-author">{{$item->poster->fullName()}}</p>
                                <p class="inbox-item-text">{{$item->name}}</p>
                                <p class="inbox-item-date">{{$item->created_at->diffForHumans()}}</p>
                            </div>
                        </a>
                    @endforeach
            </div>
            @else
                <div class="alert alert-info">No recent items!</div>
            @endif

        </div> <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-md-8">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">Recent Users</h4>

            @if(isset($users) && count($users) > 0)
            <div class="table-responsive">
                <table class="table table table-hover m-0">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index=>$user)
                        <tr>
                            <th>
                                <img src="{{ !empty($user->avatar_url)  ?  $user->avatar_url : '/custom/img/no_photo_available.png'}}" alt="user" class="thumb-sm img-circle" />
                            </th>
                            <td>
                                <h5 class="m-0">{{$user->fullName()}}</h5>
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{isset($user->mobile) ? $user->mobile : 'Not available'}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div> <!-- table-responsive -->
            @else
                <div class="alert alert-info">No users registered yet!</div>
            @endif
        </div> <!-- end card -->
    </div>
    <!-- end col -->

</div>
<!-- end row -->




@endsection