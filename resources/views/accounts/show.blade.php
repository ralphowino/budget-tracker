@extends('layouts.app')

@section('content')
    <a href="{{route('accounts.edit',$account->id)}}" class="btn btn-info">Edit</a>
    <pre>{{ $account }}</pre>
@endsection