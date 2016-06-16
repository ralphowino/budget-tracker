@extends('layouts.app')

@section('content')

    {!! Former::vertical_open()->route('points.update', $point->id) !!}
    {!! Former::text('name') !!}
    {!! Former::textarea('description') !!}
    {!! Former::select('account_id')->label('Account')->placeholder('Select Account')->options($accounts)!!}
    {!! Former::select('parent_id')->label('Parent')->placeholder('Select Parent')->options($parents)!!}
    {!! Former::number('amount')!!}
    {!! Former::number('percentage')!!}
    {!! Former::select('type')->options(['income','expense','savings'])!!}
    {!! Former::textarea('implementation_notes')!!}
    {!! Former::submit('Save')->class('btn btn-success') !!}
    {!! Former::close() !!}

@endsection