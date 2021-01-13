<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $province->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lat') }}
            {{ Form::text('lat', $province->lat, ['class' => 'form-control' . ($errors->has('lat') ? ' is-invalid' : ''), 'placeholder' => 'Lat']) }}
            {!! $errors->first('lat', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('long') }}
            {{ Form::text('long', $province->long, ['class' => 'form-control' . ($errors->has('long') ? ' is-invalid' : ''), 'placeholder' => 'Long']) }}
            {!! $errors->first('long', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            <div id="map-canvas" style="height: 300px"></div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
@section('adminlte_js')
<script>
initMap(event, {{$province->lat}}, {{$province->long}})
</script>
@endsection