@extends('layout')


@section('content')
<h1 class="text-center">Duty Table</h1>
<div class="col-md-6 col-md-offset-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Periods</div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Assign To</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periods as $index => $period)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $period->start }}</td>
                                    <td>{{ $period->end }}</td>
                                    <td>{{ $period->user->name }}</td>
                                    <td>
                                        <a href="#">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('periods.create') }}" class="button large pull-right">New</a>
        </div>
    </div>

</div>
@stop

