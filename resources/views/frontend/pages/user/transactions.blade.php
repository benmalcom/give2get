@extends('frontend.layouts.default')

@section('content')
    @include('frontend.layouts.partials.dashboard-menu')

    <div class="col-sm-10 col-sm-offset-1 mt-10 p-20 pt-20 bg-white shadow-lite">
        @include('frontend.layouts.partials.message')

        <div class="well well-sm col-sm-12 simplebox p-3">
            <h4>My Transactions</h4>
            <p class="text-muted text-warning"> <strong>*</strong> A summary of your transactions</p>
        </div>
        <div class="table-parent">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>S/NO</th>
                    <th>Product Name</th>
                    <th>Original Owner</th>
                    <th>Exchanger</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($transactions && count($transactions) > 0))
                    @foreach($transactions as $index=>$transaction)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$transaction->product->name}}</td>
                            <td>{{ Auth::user()->id == $transaction->seller->id ? 'You' : $transaction->seller->fullName}}</td>
                            <td>{{ Auth::user()->id == $transaction->buyer->id ? 'You' : $transaction->buyer->fullName}}</td>
                            <td>{{ $transaction->created_at->diffForHumans()}}</td>
                            <td><a class="label label-danger" href="/transactions/{{$transaction->hashed_id}}/delete"><i class="fa fa-trash"></i> Delete</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

        @if(empty($transactions) || count($transactions) == 0)
            <div>
                <p class="lead text-danger"><i class="fa fa-times"></i> You don't have any transaction yet!</p>
            </div>
            @endif

    </div>
@endsection