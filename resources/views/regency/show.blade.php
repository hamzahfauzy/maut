@extends('adminlte::page')

@section('title', 'Regency')

@section('content_header')
    {{ $regency->name ?? 'Show Regency' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Regency</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('regencies.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Province Id:</strong>
                            {{ $regency->province_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $regency->name }}
                        </div>
                        <div class="form-group">
                            <strong>Lat:</strong>
                            {{ $regency->lat }}
                        </div>
                        <div class="form-group">
                            <strong>Long:</strong>
                            {{ $regency->long }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
