<div>
    <form action="{{ route('news.destroy',$id) }}" method="POST" onsubmit="if(confirm('Are you sure to delete this item ?')){return true}else{return false}">
        <a class="btn btn-sm btn-primary " href="{{ route('news.show',$id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
        <a class="btn btn-sm btn-success" href="{{ route('news.edit',$id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
    </form>
</div>
