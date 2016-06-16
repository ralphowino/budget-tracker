@extends('layouts.app')

@section('content')

    {!! Former::vertical_open()->route('budgets.{bid}.plans.store', $bid) !!}
    {!! Former::hidden('budget_id')!!}
    {!! Former::select('budget_point_id')->options($points)->label('Budget Point') !!}
    {!! Former::submit('Save')->class('btn btn-success') !!}
    {!! Former::close() !!}

@endsection