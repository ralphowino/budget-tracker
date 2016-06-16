@extends('layouts.app')

@section('content')
    <h1>Budget Points
        <a href="{{route('points.create')}}" class="btn btn-info">Add New</a>
    </h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Type</th>
            <th>Parent</th>
            <th>Account</th>
            <th>Amount</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($points as $point)
            <tr>
                <td>{{$point->id}}</td>
                <td>{{$point->name}}</td>
                <td>{{$point->type}}</td>
                <td>{{$point->parent->name or 'N/A'}}</td>
                <td>{{$point->account->name}}</td>
                <td>{{$point->amount}}</td>
                <td>
                    <a href="{{route('points.show',$point->id)}}" class="btn btn-info">Details</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection