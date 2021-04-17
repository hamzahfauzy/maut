@extends('adminlte::page')

@section('title', 'Pegawai')

@section('content_header')
    Pegawai
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pegawai') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('alternatifs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Buat Baru') }}
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nama</th>
										<th>Nik</th>
										<th>Jenis Kelamin</th>
										<th>Unit Kerja</th>
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Pendidikan Terakhir</th>
										<th>SK Pertama</th>
										<th>SK Terakhir</th>
										<th>Jenis Jabatan</th>
										<th>Alamat</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($alternatifs as $alternatif)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $alternatif->name }}</td>
											<td>{{ $alternatif->NIK }}</td>
											<td>{{ $alternatif->jenis_kelamin }}</td>
											<td>{{ $alternatif->unit_kerja }}</td>
											<td>{{ $alternatif->tempat_lahir }}</td>
											<td>{{ $alternatif->tanggal_lahir }}</td>
											<td>{{ $alternatif->pendidikan_terakhir }}</td>
											<td>{{ $alternatif->no_sk_pertama }}<br>{{$alternatif->tanggal_sk_pertama}}</td>
											<td>{{ $alternatif->no_sk_terakhir }}<br>{{$alternatif->tanggal_sk_terakhir}}</td>
											<td>{{ $alternatif->jenis_jabatan }}</td>
											<td>{{ $alternatif->alamat }}</td>

                                            <td>
                                                @if(auth()->user()->level=='Super Admin')
                                                <form action="{{ route('alternatifs.destroy',$alternatif->id) }}" method="POST" onsubmit="if(confirm('Are you sure to delete this item ?')){return true}else{return false}">
                                                    <a class="btn btn-sm btn-success" href="{{ route('alternatifs.edit',$alternatif->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                                @endif
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
