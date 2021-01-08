@extends('adminlte::page')

@section('title', 'Medium')

@section('content_header')
    {{ $medium->name ?? 'Show Medium' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Medium</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('media.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $medium->name }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $medium->url }}
                        </div>
                        <div class="form-group">
                            <strong>Scrap Url:</strong>
                            {{ $medium->scrap_url }}
                        </div>
                        <div class="form-group">
                            <strong>Keywords:</strong>
                            {{ $medium->keywords }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $medium->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
