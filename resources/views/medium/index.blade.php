@extends('adminlte::page')

@section('title', 'Medium')

@section('content_header')
    Medium
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Medium') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('media.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Name</th>
										{{-- <th>Url</th> --}}
										<th>Scrap Url</th>
										<th>Keywords</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($media as $medium)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $medium->name }}</td>
											{{-- <td>{{ $medium->url }}</td> --}}
											<td>{{ $medium->scrap_url }}</td>
											<td>{{ $medium->keywords }}</td>
											<td>{{ $medium->status }}</td>

                                            <td>
                                                <form action="{{ route('media.destroy',$medium->id) }}" method="POST" onsubmit="if(confirm('Are you sure to delete this item ?')){return true}else{return false}">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('media.show',$medium->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('media.edit',$medium->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7"><i>Data empty!</i></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $media->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
