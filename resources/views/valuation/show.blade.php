@extends('adminlte::page')

@section('title', 'Penilaian')

@section('content_header')
    {{ $valuation->name ?? 'Tampil Penilaian' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Tampil Penilaian</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('valuations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Criteria Id:</strong>
                            {{ $valuation->criteria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Subcriteria Id:</strong>
                            {{ $valuation->subcriteria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Alternatif Id:</strong>
                            {{ $valuation->alternatif_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
