@extends('layout')


@section('content')
    <h1 class="text-center">Duty Table</h1>
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('periods.create') }}" class="button large pull-right">New</a>
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
                                    <th data-sort="date">Start</th>
                                    <th data-sort="date">End</th>
                                    <th data-sort="string">Assign To</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($periods as $index => $period)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $period->start }}</td>
                                        <td>{{ $period->end }}</td>
                                        @if ($period->user)
                                            <td>{{ $period->user->name }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>
                                            <a href="{{ route('periods.edit', $period->id)}}">Edit</a>
                                            {!! Form::open(['route' => ['periods.destroy', $period->id], 'method' => 'DELETE', 'class' => 'inline-form form-horizontal']) !!}
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
    {!! Html::script('js/stupidtable.js') !!}
    {!! Html::script('js/moment.js') !!}
    {!! Html::script('js/periods.js') !!}
@show
