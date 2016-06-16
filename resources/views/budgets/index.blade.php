@extends('layouts.app')

@section('content')
    <h1>
        Budget
        <a href="{{route('budgets.create')}}" class="btn btn-success pull-right">Add New</a>

    </h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Period</th>
            <th>Amount</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($budgets as $budget)
            <tr>
                <td>{{$budget->id}}</td>
                <td>{{$budget->name}}</td>
                <td>{{$budget->starts_at}} - {{$budget->ends_at}}</td>
                <td>{{$budget->amount}}</td>
                <td>
                    <a href="{{route('budgets.show',$budget->id)}}" class="btn btn-info">Details</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection