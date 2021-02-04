@extends('adminlte::page')

@section('title', 'Kriteria')

@section('content_header')
    Kriteria
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Kriteria') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('criterias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Kriteria</th>
										<th>Bobot</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($criterias as $criteria)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $criteria->name }}</td>
											<td>{{ $criteria->weighted }}</td>

                                            <td>
                                                <form action="{{ route('criterias.destroy',$criteria->id) }}" method="POST" onsubmit="if(confirm('Are you sure to delete this item ?')){return true}else{return false}">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('criterias.show',$criteria->id) }}"><i class="fa fa-fw fa-eye"></i> Tampil</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('criterias.edit',$criteria->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4"><i>Data empty!</i></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $criterias->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
