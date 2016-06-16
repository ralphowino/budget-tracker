@extends('layouts.app')

@section('content')

    {!! Former::vertical_open()->route('budgets.{bid}.plans.update', [$bid, $plan->id]) !!}
    {!! Former::select('budget_id')->options($budgets)->label('Budget') !!}
    {!! Former::select('budget_point_id')->options($points)->label('Budget Point') !!}
    {!! Former::number('amount') !!}
    {!! Former::textarea('remarks') !!}
    {!! Former::select('status')->options($statuses) !!}
    {!! Former::submit('Save')->class('btn btn-success') !!}
    {!! Former::close() !!}

@endsection