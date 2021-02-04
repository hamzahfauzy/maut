@extends('adminlte::page')

@section('title', 'Subkriteria')

@section('content_header')
    {{ $subcriteria->name ?? 'Tampil Subkriteria' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Tampil Subkriteria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('subcriterias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Kriteria:</strong>
                            {{ $subcriteria->criteria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Subkriteria:</strong>
                            {{ $subcriteria->name }}
                        </div>
                        <div class="form-group">
                            <strong>Bobot:</strong>
                            {{ $subcriteria->weighted }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
