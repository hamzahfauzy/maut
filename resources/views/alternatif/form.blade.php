<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nama pegawai') }}
            {{ Form::text('name', $alternatif->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('NIK') }}
            {{ Form::text('NIK', $alternatif->NIK, ['class' => 'form-control' . ($errors->has('NIK') ? ' is-invalid' : ''), 'placeholder' => 'Nik']) }}
            {!! $errors->first('NIK', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tempat_lahir') }}
            {{ Form::text('tempat_lahir', $alternatif->tempat_lahir, ['class' => 'form-control' . ($errors->has('tempat_lahir') ? ' is-invalid' : ''), 'placeholder' => 'Tempat Lahir']) }}
            {!! $errors->first('tempat_lahir', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tanggal_lahir') }}
            {{ Form::date('tanggal_lahir', $alternatif->tanggal_lahir, ['class' => 'form-control' . ($errors->has('tanggal_lahir') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Lahir']) }}
            {!! $errors->first('tanggal_lahir', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pendidikan_terakhir') }}
            {{ Form::text('pendidikan_terakhir', $alternatif->pendidikan_terakhir, ['class' => 'form-control' . ($errors->has('pendidikan_terakhir') ? ' is-invalid' : ''), 'placeholder' => 'Pendidikan Terakhir']) }}
            {!! $errors->first('pendidikan_terakhir', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('no_sk_pertama') }}
            {{ Form::text('no_sk_pertama', $alternatif->no_sk_pertama, ['class' => 'form-control' . ($errors->has('no_sk_pertama') ? ' is-invalid' : ''), 'placeholder' => 'No Sk Pertama']) }}
            {!! $errors->first('no_sk_pertama', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tanggal_sk_pertama') }}
            {{ Form::date('tanggal_sk_pertama', $alternatif->tanggal_sk_pertama, ['class' => 'form-control' . ($errors->has('tanggal_sk_pertama') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Sk Pertama']) }}
            {!! $errors->first('tanggal_sk_pertama', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('no_sk_terakhir') }}
            {{ Form::text('no_sk_terakhir', $alternatif->no_sk_terakhir, ['class' => 'form-control' . ($errors->has('no_sk_terakhir') ? ' is-invalid' : ''), 'placeholder' => 'No Sk Terakhir']) }}
            {!! $errors->first('no_sk_terakhir', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tanggal_sk_terakhir') }}
            {{ Form::date('tanggal_sk_terakhir', $alternatif->tanggal_sk_terakhir, ['class' => 'form-control' . ($errors->has('tanggal_sk_terakhir') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Sk Terakhir']) }}
            {!! $errors->first('tanggal_sk_terakhir', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jenis_jabatan') }}
            {{ Form::text('jenis_jabatan', $alternatif->jenis_jabatan, ['class' => 'form-control' . ($errors->has('jenis_jabatan') ? ' is-invalid' : ''), 'placeholder' => 'Jenis Jabatan']) }}
            {!! $errors->first('jenis_jabatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('alamat') }}
            {{ Form::text('alamat', $alternatif->alamat, ['class' => 'form-control' . ($errors->has('alamat') ? ' is-invalid' : ''), 'placeholder' => 'Alamat']) }}
            {!! $errors->first('alamat', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>