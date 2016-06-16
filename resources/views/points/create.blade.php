@extends('layouts.app')

@section('content')

    {!! Former::vertical_open()->route('points.store') !!}
    {!! Former::text('name') !!}
    {!! Former::textarea('description') !!}
    {!! Former::select('account_id', 'Account')->options($accounts)!!}
    {!! Former::select('parent_id', 'Parent')->options($parents)!!}
    {!! Former::number('amount')!!}
    {!! Former::number('percentage')!!}
    {!! Former::select('type')->options(['income','expense','savings'])!!}
    {!! Former::textarea('implementation_notes')!!}
    {!! Former::submit('Save')->class('btn btn-success') !!}
    {!! Former::close() !!}

@endsection