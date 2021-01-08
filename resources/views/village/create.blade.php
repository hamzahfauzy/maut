@extends('adminlte::page')

@section('title', 'Village')

@section('content_header')
    Create Village
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Village</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('villages.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('village.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
