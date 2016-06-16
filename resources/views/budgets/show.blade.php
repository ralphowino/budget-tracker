@extends('layouts.app')

@section('content')
    <a href="{{route('budgets.edit', $budget->id)}}" class="btn btn-success">Edit</a>
    <a href="{{route('budgets.{bid}.plans.index', $budget->id)}}" class="btn btn-success">Plans</a>
    <pre>{{ $budget }}</pre>
@endsection