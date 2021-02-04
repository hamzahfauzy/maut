@extends('adminlte::page')

@section('title', 'Kriteria')

@section('content_header')
    Buat Kriteria
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Buat Kriteria</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('criterias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('criteria.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
