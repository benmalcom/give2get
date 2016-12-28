@extends('admin.layouts.default')
@section('content')

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Categories <span class="badge badge-info">@if(isset($count)) {{$count}} @endif</span></h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
@include('frontend.layouts.partials.message')
@include('errors.errors')

<div class="col-sm-8 col-sm-offset-2">
    <form class="form-inline" role="form" method="post" action="/a/categories">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="sr-only">Category name</label>
            <input type="text" class="form-control" name="name" placeholder="Category name" required autofocus>
        </div>
        <button type="submit" class="btn btn-success waves-effect waves-light m-l-10 btn-md">Add category</button>
    </form>
</div>
<div class="clearfix"></div>

@if(isset($categories) && count($categories) > 0)
    <div class="table-responsive col-sm-10 col-sm-offset-1 m-t-5">
        <table class="table m-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Items</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $index => $category)
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->items_count }}</td>
                    <td> <a class="label label-info" href="/a/categories/{{$category->hashed_id}}/edit">Edit</a> </td>
                    <td> <a class="label label-danger" href="/a/categories/{{$category->hashed_id}}/delete">Delete</a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
     <div>
         <p class="text-danger">No categories added yet</p>
     </div>
    @endif


@endsection