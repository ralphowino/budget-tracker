@extends('layouts.app')

@section('content')
    <a href="{{route('points.edit',$point->id)}}" class="btn btn-info">Edit</a>
    <pre>{{ $point }}</pre>
@endsection