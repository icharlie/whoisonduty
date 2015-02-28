<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
    {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>
{!! $errors->first('name', '<div class="alert alert-danger alert-small col-sm-10 col-sm-offset-2"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>:message</div>')  !!}