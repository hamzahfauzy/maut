@extends('adminlte::page')

@section('title', 'Penilaian')

@section('content_header')
    Edit Penilaian
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Edit Penilaian</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('valuations.update', $alternatif) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('valuation.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
