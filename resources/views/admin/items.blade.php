@extends('admin.layouts.default')
@section('content')

        <!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Items <span class="badge badge-info">@if(isset($count)) {{$count}} @endif</span></h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
@include('errors.errors')

@if(isset($items) && count($items) > 0)
    <div class="table-responsive col-sm-10 col-sm-offset-1 m-t-5">
        <table class="table m-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>Category</th>
                <th>Exchange</th>
                <th>State</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $index => $item)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->exchange }}</td>
                    <td>{{ $item->state->name }}</td>
                    <td><a href="/items/{{$item->hashed_id}}/details" class="label label-default"><i class="fa fa-info-circle"></i> Details on main site</a>
                    </td>
                    <td> <a class="label label-danger" href="/admin/items/{{$hashIds->encode($item->id)}}/delete"><i class="fa fa-trash"></i> Delete</a> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <div>
        <p class="text-danger">No items yet</p>
    </div>
@endif


@endsection