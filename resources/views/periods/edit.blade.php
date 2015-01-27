@extends('layout')

@section('ext_js')
    {!! Html::script('js/app.js') !!}
@show

@section('content')
<h1 class="text-center">New Periods</h1>
<div class="col-md-6 col-md-offset-3">
    {!! Form::model($period, ['route' => ['periods.update', $period->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
        @include('periods.form')
    {!! Form::submit('Update', ['class' => 'button btn pull-right']) !!}
    {!! Form::close() !!}
</div>
@stop
