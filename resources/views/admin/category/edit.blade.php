@extends('admin.layouts.default')
@section('content')

        <!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Edit category</h4>
        </div>
    </div>
</div>
<!-- end page title end breadcrumb -->
@include('errors.errors')

<div class="col-sm-4 col-sm-offset-4">
    <form class="form-inline" role="form" method="post" action="/admin/categories/edit">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="sr-only">Category name</label>
            <input type="hidden" name="hashed_id"  value="@if(isset($category)) {{ $hashIds->encode($category->id)}} @endif">
            <input type="text" class="form-control" name="name" placeholder="Category name" value="@if(isset($category)) {{ $category->name}} @endif" required autofocus>
        </div>
        <button type="submit" class="btn btn-success waves-effect waves-light m-l-10 btn-md">Submit</button>
    </form>
</div>
<div class="clearfix"></div>
@endsection