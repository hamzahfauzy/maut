@extends('adminlte::page')

@section('title', 'News')

@section('content_header')
    News
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('News') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('news.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif
                        {{$dataTable->table()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('adminlte_js')
    {{$dataTable->scripts()}}
@endsection