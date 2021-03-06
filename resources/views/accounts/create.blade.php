@extends('layouts.app')

@section('content')

    {!! Former::vertical_open()->route('accounts.store') !!}
    {!! Former::text('name') !!}
    {!! Former::textarea('description') !!}
    {!! Former::select('currency')->options($currencies) !!}
    {!! Former::submit('Save')->class('btn btn-success') !!}
    {!! Former::close() !!}

@endsection