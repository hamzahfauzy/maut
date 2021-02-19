@extends('adminlte::page')

@section('title', 'Alternatif')

@section('content_header')
    {{ $alternatif->name ?? 'Show Alternatif' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Alternatif</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('alternatifs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $alternatif->name }}
                        </div>
                        <div class="form-group">
                            <strong>Nik:</strong>
                            {{ $alternatif->NIK }}
                        </div>
                        <div class="form-group">
                            <strong>Tempat Lahir:</strong>
                            {{ $alternatif->tempat_lahir }}
                        </div>
                        <div class="form-group">
                            <strong>Tanggal Lahir:</strong>
                            {{ $alternatif->tanggal_lahir }}
                        </div>
                        <div class="form-group">
                            <strong>Pendidikan Terakhir:</strong>
                            {{ $alternatif->pendidikan_terakhir }}
                        </div>
                        <div class="form-group">
                            <strong>No Sk Pertama:</strong>
                            {{ $alternatif->no_sk_pertama }}
                        </div>
                        <div class="form-group">
                            <strong>Tanggal Sk Pertama:</strong>
                            {{ $alternatif->tanggal_sk_pertama }}
                        </div>
                        <div class="form-group">
                            <strong>No Sk Terakhir:</strong>
                            {{ $alternatif->no_sk_terakhir }}
                        </div>
                        <div class="form-group">
                            <strong>Tanggal Sk Terakhir:</strong>
                            {{ $alternatif->tanggal_sk_terakhir }}
                        </div>
                        <div class="form-group">
                            <strong>Jenis Jabatan:</strong>
                            {{ $alternatif->jenis_jabatan }}
                        </div>
                        <div class="form-group">
                            <strong>Alamat:</strong>
                            {{ $alternatif->alamat }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
