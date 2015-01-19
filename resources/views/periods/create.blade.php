@extends('layout')

@section('ext_js')
    {!! Html::script('js/app.js') !!}
@show

@section('content')
<h1 class="text-center">New Periods</h1>
<div class="col-md-6 col-md-offset-3">
    {!! Form::open(['route' => 'periods.store', 'class' => 'form-horizontal']) !!}
    <div class="form-group">
        {!! Form::label('start', 'Start', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('start', null, ['class' => 'form-control datepicker',  'data-date-format' => 'yyyy-mm-dd' ]) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('end', 'End', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10 input-append date">
            {!! Form::text('end', null, ['class' => 'form-control datepicker', 'data-date-format' => 'yyyy-mm-dd' ]) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('assignee', 'Assignee', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}

        </div>
    </div>

    {!! Form::submit('Create', ['class' => 'button btn pull-right']) !!}
    {!! Form::close() !!}
</div>
@stop
