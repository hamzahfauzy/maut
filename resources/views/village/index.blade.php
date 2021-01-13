@extends('adminlte::page')

@section('title', 'Village')

@section('content_header')
    Village
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Village') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('villages.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>District Id</th>
										<th>Name</th>
										<th>Lat</th>
										<th>Long</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($villages as $village)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $village->district_id }}</td>
											<td>{{ $village->name }}</td>
											<td>{{ $village->lat }}</td>
											<td>{{ $village->long }}</td>

                                            <td>
                                                <form action="{{ route('villages.destroy',$village->id) }}" method="POST" onsubmit="if(confirm('Are you sure to delete this item ?')){return true}else{return false}">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('villages.show',$village->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('villages.edit',$village->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $villages->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
