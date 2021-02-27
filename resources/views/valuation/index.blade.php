@extends('adminlte::page')

@section('title', 'Penilaian - '.$alternatif->name)

@section('content_header')
    Penilaian - {{$alternatif->name}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <form action="" name="formFilter">
                    <input type="hidden" name="alternatif" value="{{$alternatif->id}}">
                    <label for="">Tahun</label>
                    <select name="tahun" id="tahun" class="form-control" onchange="formFilter.submit()" required>
                        <option value="">Pilih Tahun</option>
                        <option {{$tahun==2021?'selected=""':''}}>2021</option>
                        <option {{$tahun==2020?'selected=""':''}}>2020</option>
                        <option {{$tahun==2019?'selected=""':''}}>2019</option>
                        <option {{$tahun==2018?'selected=""':''}}>2018</option>
                        <option {{$tahun==2017?'selected=""':''}}>2017</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Penilaian') }}
                            </span>

                             <div class="float-right">
                                @if($alternatif->valuations()->where('tahun',$tahun)->get() && count($alternatif->valuations()->where('tahun',$tahun)->get()))
                                <form action="{{ route('valuations.destroy',$alternatif->id) }}?tahun={{$tahun}}" method="POST" onsubmit="if(confirm('Are you sure to delete this item ?')){return true}else{return false}">
                                    <a href="{{ route('valuations.edit',$alternatif->id) }}?tahun={{$tahun}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                    </a>
                                    
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Hapus</button>
                                </form>
                                
                                @else
                                <a href="{{ route('valuations.create',['alternatif'=>$alternatif->id,'tahun'=>$tahun]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
