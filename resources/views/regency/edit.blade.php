@extends('adminlte::page')

@section('title', 'Regency')

@section('content_header')
    Update Regency
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Regency</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('regencies.update', $regency->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('regency.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
