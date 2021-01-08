@extends('adminlte::page')

@section('title', 'Province')

@section('content_header')
    {{ $province->name ?? 'Show Province' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Province</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('provinces.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $province->name }}
                        </div>
                        <div class="form-group">
                            <strong>Lat:</strong>
                            {{ $province->lat }}
                        </div>
                        <div class="form-group">
                            <strong>Long:</strong>
                            {{ $province->long }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
