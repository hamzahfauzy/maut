@extends('adminlte::page')

@section('title', 'Group')

@section('content_header')
    {{ $group->name ?? 'Show Group' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Group</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('groups.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $group->color }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $group->name }}
                        </div>
                        <div class="form-group">
                            <strong>Slug:</strong>
                            {{ $group->slug }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $group->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
