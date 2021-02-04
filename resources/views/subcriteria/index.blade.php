@extends('adminlte::page')

@section('title', 'Subkriteria')

@section('content_header')
    Subkriteria
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Subkriteria') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('subcriterias.create',['criteria'=>$criteria]) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                        <form action="" name="filter">
                            <label for="">Kriteria</label>
                            <select name="criteria" id="" class="form-control" onchange="filter.submit()" required>
                                <option value="">- Pilih -</option>
                                @foreach($criterias as $c)
                                <option value="{{$c->id}}" {{$c->id==$criteria?'selected=""':''}}>{{$c->name}}</option>
                                @endforeach
                            </select>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Kriteria</th>
										<th>Subkriteria</th>
										<th>Bobot</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($subcriterias as $subcriteria)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $subcriteria->criteria->name }}</td>
											<td>{{ $subcriteria->name }}</td>
											<td>{{ $subcriteria->weighted }}</td>

                                            <td>
                                                <form action="{{ route('subcriterias.destroy',$subcriteria->id) }}" method="POST" onsubmit="if(confirm('Are you sure to delete this item ?')){return true}else{return false}">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('subcriterias.show',$subcriteria->id) }}"><i class="fa fa-fw fa-eye"></i> Tampil</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('subcriterias.edit',$subcriteria->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5"><i>Data empty!</i></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $subcriterias->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
