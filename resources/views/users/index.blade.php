@extends('layout')


@section('content')
    <div class="row">
        <h1>Users</h1>

        @if($users)
            @foreach ($users as $user)
                <p>{{ $user->name }}</p>
            @endforeach
        @endif
    </div>
    <div class="row">
        <div class="content">
            <a href="{{ route('users.create') }}" class="button large">New</a>
        </div>
    </div>
@stop