<div class="box box-info padding-1">
    <input type="hidden" name="tahun" value="{{$tahun}}">
    <div class="box-body">
        @foreach($criterias as $key => $criteria)
        <div class="form-group">
            {{ Form::label($criteria->name) }}
            @php($old_subcriteria=old('subcriteria_id.'.$criteria->id)?old('subcriteria_id.'.$criteria->id):(isset($valuation[$key])?$valuation[$key]['subcriteria_id']:''))
            <select name="subcriteria_id[{{$criteria->id}}]" id="subcriteria_id-{{$criteria->id}}" class="form-control {{$errors->has('subcriteria_id.'.$criteria->id) ? 'is-invalid' : ''}}">
                <option value="">Pilih</option>
                @foreach($criteria->subcriterias as $subcriteria)
                <option value="{{$subcriteria->id}}" {{$old_subcriteria==$subcriteria->id?'selected=""':''}}>{{$subcriteria->name}}</option>
                @endforeach
            </select>
            {!! $errors->first('subcriteria_id.'.$criteria->id, '<div class="invalid-feedback">:message</p>') !!}
        </div>
        @endforeach
        {{ Form::hidden('alternatif_id', $alternatif->id, []) }}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>