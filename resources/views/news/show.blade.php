@extends('adminlte::page')

@section('title', 'News')

@section('content_header')
    {{ $news->name ?? 'Show News' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show News</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Log Id:</strong>
                            {{ $news->log_id }}
                        </div>
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $news->category_id }}
                        </div>
                        <div class="form-group">
                            <strong>Village Id:</strong>
                            {{ $news->village_id }}
                        </div>
                        <div class="form-group">
                            <strong>District Id:</strong>
                            {{ $news->district_id }}
                        </div>
                        <div class="form-group">
                            <strong>Media Id:</strong>
                            {{ $news->media_id }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $news->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $news->description }}
                        </div>
                        <div class="form-group">
                            <strong>Location:</strong>
                            {{ $news->location }}
                        </div>
                        <div class="form-group">
                            <strong>Origin Url:</strong>
                            {{ $news->origin_url }}
                        </div>
                        <div class="form-group">
                            <strong>Event Date:</strong>
                            {{ $news->event_date }}
                        </div>
                        <div class="form-group">
                            <strong>Lat:</strong>
                            {{ $news->lat }}
                        </div>
                        <div class="form-group">
                            <strong>Long:</strong>
                            {{ $news->long }}
                        </div>
                        <div class="form-group">
                            <strong>Created By:</strong>
                            {{ $news->created_by }}
                        </div>
                        <div class="form-group">
                            <strong>Updated By:</strong>
                            {{ $news->updated_by }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
