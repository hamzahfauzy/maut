@extends('adminlte::page')

@section('title', 'Alternatif')

@section('content_header')
    Buat Alternatif
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Buat Alternatif</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('alternatifs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('alternatif.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
