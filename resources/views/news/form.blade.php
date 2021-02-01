<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('log_id') }}
            {{ Form::text('log_id', $news->log_id, ['class' => 'form-control' . ($errors->has('log_id') ? ' is-invalid' : ''), 'placeholder' => 'Log Id']) }}
            {!! $errors->first('log_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('category_id') }}
            {{ Form::text('category_id', $news->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Category Id']) }}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('village_id') }}
            {{ Form::text('village_id', $news->village_id, ['class' => 'form-control' . ($errors->has('village_id') ? ' is-invalid' : ''), 'placeholder' => 'Village Id']) }}
            {!! $errors->first('village_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('district_id') }}
            {{ Form::text('district_id', $news->district_id, ['class' => 'form-control' . ($errors->has('district_id') ? ' is-invalid' : ''), 'placeholder' => 'District Id']) }}
            {!! $errors->first('district_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('media_id') }}
            {{ Form::text('media_id', $news->media_id, ['class' => 'form-control' . ($errors->has('media_id') ? ' is-invalid' : ''), 'placeholder' => 'Media Id']) }}
            {!! $errors->first('media_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $news->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::textarea('description', $news->description, ['class' => 'tiny form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('location') }}
            {{ Form::text('location', $news->location, ['class' => 'form-control' . ($errors->has('location') ? ' is-invalid' : ''), 'placeholder' => 'Location']) }}
            {!! $errors->first('location', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('origin_url') }}
            {{ Form::text('origin_url', $news->origin_url, ['class' => 'form-control' . ($errors->has('origin_url') ? ' is-invalid' : ''), 'placeholder' => 'Origin Url']) }}
            {!! $errors->first('origin_url', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('event_date') }}
            {{ Form::text('event_date', $news->event_date, ['class' => 'form-control' . ($errors->has('event_date') ? ' is-invalid' : ''), 'placeholder' => 'Event Date']) }}
            {!! $errors->first('event_date', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lat') }}
            {{ Form::text('lat', $news->lat, ['class' => 'form-control' . ($errors->has('lat') ? ' is-invalid' : ''), 'placeholder' => 'Lat']) }}
            {!! $errors->first('lat', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('long') }}
            {{ Form::text('long', $news->long, ['class' => 'form-control' . ($errors->has('long') ? ' is-invalid' : ''), 'placeholder' => 'Long']) }}
            {!! $errors->first('long', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('created_by') }}
            {{ Form::text('created_by', $news->created_by, ['class' => 'form-control' . ($errors->has('created_by') ? ' is-invalid' : ''), 'placeholder' => 'Created By']) }}
            {!! $errors->first('created_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('updated_by') }}
            {{ Form::text('updated_by', $news->updated_by, ['class' => 'form-control' . ($errors->has('updated_by') ? ' is-invalid' : ''), 'placeholder' => 'Updated By']) }}
            {!! $errors->first('updated_by', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>