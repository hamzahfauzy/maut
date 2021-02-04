@extends('adminlte::page')

@section('title', 'Kriteria')

@section('content_header')
    {{ $criteria->name ?? 'Tampil Kriteria' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Tampil Kriteria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('criterias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Kriteria:</strong>
                            {{ $criteria->name }}
                        </div>
                        <div class="form-group">
                            <strong>Bobot:</strong>
                            {{ $criteria->weighted }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
