<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Province') }}
            {{ Form::select('province_id', $provinces, $district->regency?$district->regency->province_id:0, ['class'=>'form-control '. ($errors->has('province_id') ? ' is-invalid' : ''),'onchange'=>'loadRegencies(this.value,0)']) }}
            {!! $errors->first('province_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Regency') }}
            <select name="regency_id" id="regency_id" class="form-control {{$errors->has('regency_id') ? ' is-invalid' : ''}}">
                <option value="">- Choose Province First -</option>
                @foreach ($regencies as $province)
                    @foreach ($province->regencies as $regency)
                        <option value="{{$regency->id}}" class="regency-prov prov-{{$province->id}}" {{$regency->id==$district->regency_id?'selected=""':''}}>{{$regency->name}}</option>
                    @endforeach
                @endforeach
            </select>
            {!! $errors->first('regency_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $district->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lat') }}
            {{ Form::text('lat', $district->lat, ['class' => 'form-control' . ($errors->has('lat') ? ' is-invalid' : ''), 'placeholder' => 'Lat']) }}
            {!! $errors->first('lat', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('long') }}
            {{ Form::text('long', $district->long, ['class' => 'form-control' . ($errors->has('long') ? ' is-invalid' : ''), 'placeholder' => 'Long']) }}
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
initMap(event, {{$district->lat?$district->lat:0}}, {{$district->long?$district->long:0}})
function loadRegencies(province_id, value)
{
    document.querySelector('#regency_id').value = value == 0 ? "" : value
    document.querySelectorAll('.regency-prov').forEach(el => el.style.display="none")
    if(province_id)
        document.querySelectorAll('.regency-prov.prov-'+province_id).forEach(el => el.style.display="block")
}

loadRegencies({{$district->regency?$district->regency->province_id:array_key_first($provinces)}},{{$district->regency?$district->regency_id:"0"}})
</script>
@endsection