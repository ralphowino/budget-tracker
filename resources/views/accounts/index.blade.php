@extends('layouts.app')

@section('content')
    <h1>
        Accounts
        <a href="{{route('accounts.create')}}" class="btn btn-success pull-right">Add New</a>
    </h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Currency</th>
            <th>Amount</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr>
                <td>{{$account->id}}</td>
                <td>{{$account->name}}</td>
                <td>{{$account->currency}}</td>
                <td>{{$account->amount}}</td>
                <td>
                    <a href="{{route('accounts.show',$account->id)}}" class="btn btn-info">Details</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection