@extends('layout')

@section('content')
    <h1>Create</h1>

    {!! Form::open(['route' => 'users.store']) !!}
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null) !!}
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null) !!}
    <!-- {!! Form::label('password', 'Passowrd') !!}
    {!! Form::password('password', null) !!}
    {!! Form::label('password_confirmation', 'Passowrd Confirmation') !!}
    {!! Form::password('password_confirmation', null) !!} -->
    {!! Form::submit('Create', ['class' => 'button small']) !!}
    {!! Form::close()!!}
@stop