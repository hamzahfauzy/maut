@extends('adminlte::page')

@section('title', 'Village')

@section('content_header')
    Update Village
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Village</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('villages.update', $village->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('village.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
