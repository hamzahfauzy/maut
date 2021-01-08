@extends('adminlte::page')

@section('title', 'District')

@section('content_header')
    District
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('District') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('districts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Regency Id</th>
										<th>Name</th>
										<th>Lat</th>
										<th>Long</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($districts as $district)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $district->regency_id }}</td>
											<td>{{ $district->name }}</td>
											<td>{{ $district->lat }}</td>
											<td>{{ $district->long }}</td>

                                            <td>
                                                <form action="{{ route('districts.destroy',$district->id) }}" method="POST" onsubmit="if(confirm('Are you sure to delete this item ?')){return true}else{return false}">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('districts.show',$district->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('districts.edit',$district->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6"><i>Data empty!</i></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $districts->links() !!}
            </div>
        </div>
    </div>
@endsection
