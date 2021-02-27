@extends('adminlte::page')

@section('title', 'Alternatif')

@section('content_header')
    Alternatif
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Alternatif') }}
                            </span>

                        </div>
                    </div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nama</th>
										<th>Nik</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($alternatifs as $alternatif)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $alternatif->name }}</td>
											<td>{{ $alternatif->NIK }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('valuations.index',['alternatif'=>$alternatif->id]) }}"><i class="fa fa-fw fa-eye"></i> Penilaian</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8"><i>Data empty!</i></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $alternatifs->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
