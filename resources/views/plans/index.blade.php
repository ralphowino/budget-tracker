@extends('layouts.app')

@section('content')

    <h1>
        Plans
        <a href="{{route('budgets.{bid}.plans.create', $bid)}}" class="btn btn-success pull-right">Add New</a>
    </h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Budget</th>
            <th>Budget Point</th>
            <th>Status</th>
            <th>Amount</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($plans as $plan)
            <tr>
                <td>{{$plan->id}}</td>
                <td>{{$plan->budget->name}}</td>
                <td>{{$plan->budgetPoint->name}}</td>
                <td>{{$plan->status}}</td>
                <td>{{$plan->amount}}</td>
                <td>
                    <a href="{{route('budgets.{bid}.plans.show',[$plan->budget->id, $plan->id])}}" class="btn btn-info">Details</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection