@extends('layout')

@section('content')
    <h1 class="text-center">Update</h1>
    <div class="col-md-6 col-md-offset-3">
        {!! Form::model($topic, ['route' => ['topics.update', $topic->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
            @include('topics.form')
            {!! Form::submit('Update', ['class' => 'button btn pull-right']) !!}
        {!! Form::close() !!}
    </div>
@stop
