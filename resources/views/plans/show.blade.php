@extends('layouts.app')

@section('content')
    <a href="{{route('budgets.{bid}.plans.edit',[$plan->budget->id, $plan->id])}}" class="btn btn-info">Edit</a>
    <pre>{{ $plan }}</pre>
@endsection