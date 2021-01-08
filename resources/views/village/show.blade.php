@extends('adminlte::page')

@section('title', 'Village')

@section('content_header')
    {{ $village->name ?? 'Show Village' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Village</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('villages.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>District Id:</strong>
                            {{ $village->district_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $village->name }}
                        </div>
                        <div class="form-group">
                            <strong>Lat:</strong>
                            {{ $village->lat }}
                        </div>
                        <div class="form-group">
                            <strong>Long:</strong>
                            {{ $village->long }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
