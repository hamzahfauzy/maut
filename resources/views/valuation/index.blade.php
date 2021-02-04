@extends('adminlte::page')

@section('title', 'Penilaian - '.$alternatif->name)

@section('content_header')
    Penilaian - {{$alternatif->name}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Penilaian') }}
                            </span>

                             <div class="float-right">
                                @if($alternatif->valuations && count($alternatif->valuations))
                                <form action="{{ route('valuations.destroy',$alternatif->id) }}" method="POST" onsubmit="if(confirm('Are you sure to delete this item ?')){return true}else{return false}">
                                    <a href="{{ route('valuations.edit',$alternatif->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                    </a>
                                    
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Hapus</button>
                                </form>
                                
                                @else
                                <a href="{{ route('valuations.create',['alternatif'=>$alternatif->id]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Buat Baru') }}
                                </a>
                                @endif
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
										<th>Subkriteria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($valuations as $valuation)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $valuation->criteria->name }}</td>
											<td>{{ $valuation->subcriteria->name }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3"><i>Data empty!</i></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $valuations->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
