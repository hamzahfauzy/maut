<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Province') }}
            {{ Form::select('province_id', $provinces, $village->district&&$village->district->regency?$village->district->regency->province_id:0, ['class'=>'form-control '. ($errors->has('province_id') ? ' is-invalid' : ''),'onchange'=>'loadRegencies(this.value,0)']) }}
            {!! $errors->first('province_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Regency') }}
            <select name="regency_id" id="regency_id" class="form-control {{$errors->has('regency_id') ? ' is-invalid' : ''}}" onchange="loadDistrict(this.value,0)">
                <option value="">- Choose Province First -</option>
                @foreach ($regencies as $province)
                    @foreach ($province->regencies as $regency)
                        <option value="{{$regency->id}}" class="regency-prov prov-{{$province->id}}" {{$village->district&&$regency->id==$village->district->regency_id?'selected=""':''}}>{{$regency->name}}</option>
                    @endforeach
                @endforeach
            </select>
            {!! $errors->first('regency_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('District') }}
            <select name="district_id" id="district_id" class="form-control {{$errors->has('district_id') ? ' is-invalid' : ''}}">
                <option value="">- Choose Regency First -</option>
                @foreach ($regencies as $province)
                    @foreach ($province->regencies as $regency)
                        @foreach ($regency->districts as $district)
                            <option value="{{$district->id}}" class="district-regency-prov prov-district-{{$regency->id}}" {{$village->district&&$village->district->id==$district->id?'selected=""':''}}>{{$district->name}}</option>
                        @endforeach
                    @endforeach
                @endforeach
            </select>
            {!! $errors->first('district_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $village->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lat') }}
            {{ Form::text('lat', $village->lat, ['class' => 'form-control' . ($errors->has('lat') ? ' is-invalid' : ''), 'placeholder' => 'Lat']) }}
            {!! $errors->first('lat', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('long') }}
            {{ Form::text('long', $village->long, ['class' => 'form-control' . ($errors->has('long') ? ' is-invalid' : ''), 'placeholder' => 'Long']) }}
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
initMap(event, {{$village->lat?$village->lat:0}}, {{$village->long?$village->long:0}})
function loadRegencies(province_id, value)
{
    document.querySelector('#regency_id').value = value == 0 ? "" : value
    document.querySelectorAll('.regency-prov').forEach(el => el.style.display="none")
    if(province_id)
        document.querySelectorAll('.regency-prov.prov-'+province_id).forEach(el => el.style.display="block")
}

loadRegencies({{$village->district&&$village->district->regency?$village->district->regency->province_id:array_key_first($provinces)}},{{$village->district&&$village->district->regency?$village->district->regency_id:"0"}})

function loadDistrict(regency_id, value)
{
    document.querySelector('#district_id').value = value == 0 ? "" : value
    document.querySelectorAll('.district-regency-prov').forEach(el => el.style.display="none")
    if(regency_id)
        document.querySelectorAll('.district-regency-prov.prov-district-'+regency_id).forEach(el => el.style.display="block")
}

loadDistrict({{$village->district&&$village->district->regency?$village->district->regency_id:0}},{{$village->district_id?$village->district_id:"0"}})
</script>
@endsection