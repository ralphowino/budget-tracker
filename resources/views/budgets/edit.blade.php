@extends('layouts.app')

@section('content')

    {!! Former::vertical_open()->route('budgets.update', $budget->id) !!}
    {!! Former::text('name') !!}
    {!! Former::textarea('description') !!}
    {!! Former::date('starts_at')->placeholder('YYYY-MM-DD') !!}
    {!! Former::date('ends_at')->placeholder('YYYY-MM-DD') !!}
    {!! Former::submit('Save')->class('btn btn-success') !!}
    {!! Former::close() !!}

@endsection