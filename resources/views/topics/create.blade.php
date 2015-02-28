@extends('layout')

@section('content')
    <h1 class="text-center">Create</h1>
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open(['route' => 'topics.store', 'class' =>'form-horizontal']) !!}
        @include('topics.form')

        {!! Form::submit('Create', ['class' => 'button btn pull-right']) !!}
        {!! Form::close()!!}
    </div>
@stop