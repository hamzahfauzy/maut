@extends('adminlte::page')

@section('title', 'Subkriteria')

@section('content_header')
    Buat Subkriteria
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Buat Subkriteria - {{$subcriteria->criteria->name}}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('subcriterias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('subcriteria.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
