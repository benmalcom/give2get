@extends('admin.layouts.default')
@section('content')

        <!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Transactions <span class="badge badge-info">@if(isset($count)) {{$count}} @endif</span></h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
@include('errors.errors')

@if(isset($transactions) && count($transactions) > 0)
    <div class="table-responsive col-sm-10 col-sm-offset-1 m-t-5">
        <table class="table m-0">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Date Registered</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $index => $transaction)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M Y - H:i:s') }}</td>

                    <td> <a class="label label-danger" href="/a/users/{{$hashIds->encode($user->id)}}/delete">Delete</a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div>
        <p class="text-danger">No users yet</p>
    </div>
@endif


@endsection