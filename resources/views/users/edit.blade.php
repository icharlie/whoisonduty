@extends('layout')

@section('content')
    <h1 class="text-center">Update</h1>
    <div class="col-md-6 col-md-offset-3">
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!} 
            @include('users.form')
            {!! Form::submit('Update', ['class' => 'button btn pull-right']) !!}
        {!! Form::close() !!}
    </div>
@stop
