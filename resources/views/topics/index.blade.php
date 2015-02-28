@extends('layout')


@section('content')
   <h1 class="text-center">Topics</h1>
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('topics.create') }}" class="button large pull-right">New</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Periods</div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th data-sort="int">#</th>
                                    <th data-sort="date">Topic Name</th>
                                    <th data-sort="date">Topic Manager</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topics as $index => $topic)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $topic->name}}</td>
                                        <td></td>
                                        <td>
                                            <a href="{{ route('topics.edit', $topic->id)}}">Edit</a>
                                            {!! Form::open(['route' => ['topics.destroy', $topic->id], 'method' => 'DELETE', 'class' => 'inline-form form-horizontal']) !!}
                                                <input type="submit" value="Delete" class="delete-link">
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('ext_js')
{!! Html::script('js/topics.js') !!}
@show