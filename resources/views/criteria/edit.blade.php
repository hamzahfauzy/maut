@extends('adminlte::page')

@section('title', 'Kriteria')

@section('content_header')
    Edit Kriteria
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Edit Kriteria</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('criterias.update', $criteria->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('criteria.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
