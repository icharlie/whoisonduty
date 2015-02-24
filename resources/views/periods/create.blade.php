@extends('layout')


@section('content')
<h1 class="text-center">New Periods</h1>
<div class="col-md-6 col-md-offset-3">
    {!! Form::open(['route' => 'periods.store', 'class' => 'form-horizontal']) !!}
        @include('periods.form')
    {!! Form::submit('Create', ['class' => 'button btn pull-right']) !!}
    {!! Form::close() !!}
</div>
@stop



@section('ext_js')
{!! Html::script('js/periods.js') !!}
@show
