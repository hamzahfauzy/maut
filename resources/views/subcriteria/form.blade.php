<div class="box box-info padding-1">
    <div class="box-body">
        <input type="hidden" name="criteria_id" value="{{$subcriteria->criteria_id}}">
        <div class="form-group">
            {{ Form::label('Subkriteria') }}
            {{ Form::text('name', $subcriteria->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Bobot') }}
            {{ Form::text('weighted', $subcriteria->weighted, ['class' => 'form-control' . ($errors->has('weighted') ? ' is-invalid' : ''), 'placeholder' => 'Weighted']) }}
            {!! $errors->first('weighted', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>