<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('media_id') }}
            {{ Form::text('media_id', $log->media_id, ['class' => 'form-control' . ($errors->has('media_id') ? ' is-invalid' : ''), 'placeholder' => 'Media Id']) }}
            {!! $errors->first('media_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('incoming_news') }}
            {{ Form::text('incoming_news', $log->incoming_news, ['class' => 'form-control' . ($errors->has('incoming_news') ? ' is-invalid' : ''), 'placeholder' => 'Incoming News']) }}
            {!! $errors->first('incoming_news', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stored_news') }}
            {{ Form::text('stored_news', $log->stored_news, ['class' => 'form-control' . ($errors->has('stored_news') ? ' is-invalid' : ''), 'placeholder' => 'Stored News']) }}
            {!! $errors->first('stored_news', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>