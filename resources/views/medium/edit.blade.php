@extends('adminlte::page')

@section('title', 'Medium')

@section('content_header')
    Update Medium
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Medium</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('media.update', $medium->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('medium.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
