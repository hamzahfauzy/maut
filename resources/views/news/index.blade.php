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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
										{{-- <th>Log Id</th> --}}
										<th>Category Id</th>
										{{-- <th>Village Id</th>
										<th>District Id</th>
										<th>Media Id</th> --}}
										<th>Title</th>
										{{-- <th>Description</th> --}}
										<th>Location</th>
										{{-- <th>Origin Url</th>
										<th>Event Date</th>
										<th>Lat</th>
										<th>Long</th>
										<th>Created By</th>
										<th>Updated By</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($all_news as $news)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											{{-- <td>{{ $news->log_id }}</td> --}}
											<td>{{ $news->category_id }}</td>
											{{-- <td>{{ $news->village_id }}</td>
											<td>{{ $news->district_id }}</td>
											<td>{{ $news->media_id }}</td> --}}
											<td>{{ $news->title }}</td>
											{{-- <td>{{ $news->description }}</td> --}}
											<td>{{ $news->location }}</td>
											{{-- <td>{{ $news->origin_url }}</td>
											<td>{{ $news->event_date }}</td>
											<td>{{ $news->lat }}</td>
											<td>{{ $news->long }}</td>
											<td>{{ $news->created_by }}</td>
											<td>{{ $news->updated_by }}</td> --}}

                                            <td>
                                                <form action="{{ route('news.destroy',$news->id) }}" method="POST" onsubmit="if(confirm('Are you sure to delete this item ?')){return true}else{return false}">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('news.show',$news->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('news.edit',$news->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="16"><i>Data empty!</i></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $all_news->links('vendor.pagination.bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
