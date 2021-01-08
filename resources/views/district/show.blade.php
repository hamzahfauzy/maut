@extends('adminlte::page')

@section('title', 'District')

@section('content_header')
    {{ $district->name ?? 'Show District' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show District</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('districts.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Regency Id:</strong>
                            {{ $district->regency_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $district->name }}
                        </div>
                        <div class="form-group">
                            <strong>Lat:</strong>
                            {{ $district->lat }}
                        </div>
                        <div class="form-group">
                            <strong>Long:</strong>
                            {{ $district->long }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
