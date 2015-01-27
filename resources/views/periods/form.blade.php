<div class="form-group">
    {!! Form::label('start', 'Start', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('start', null, ['class' => 'form-control datepicker',  'data-date-format' => 'yyyy-mm-dd' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('end', 'End', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10 input-append date">
        {!! Form::text('end', null, ['class' => 'form-control datepicker', 'data-date-format' => 'yyyy-mm-dd' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('assignee', 'Assignee', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}

    </div>
</div>
