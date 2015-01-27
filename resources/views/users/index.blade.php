@extends('layout')


@section('content')
<div class="col-md-6 col-md-offset-3">

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('users.create') }}" class="button large pull-right">New</a>
        </div>
    </div>
    <h1>Users</h1>
    @if($users)
        <div class="row">
            @foreach ($users as $user)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img data=src="holder.js/100x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjkyLjQ2MDkzNzUiIHk9IjEwMCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMXB0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjI0MngyMDA8L3RleHQ+PC9nPjwvc3ZnPg==" alt="">
                        <div class="caption">
                            <h3>{{ $user->name }}</h3>
                            <P>{{ $user->position }}</P>
                            <a href="{{ route('users.edit', $user->id)}}">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@stop