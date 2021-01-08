@extends('adminlte::page')

@section('title', 'Log')

@section('content_header')
    {{ $log->name ?? 'Show Log' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Log</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('logs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Media Id:</strong>
                            {{ $log->media_id }}
                        </div>
                        <div class="form-group">
                            <strong>Incoming News:</strong>
                            {{ $log->incoming_news }}
                        </div>
                        <div class="form-group">
                            <strong>Stored News:</strong>
                            {{ $log->stored_news }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
