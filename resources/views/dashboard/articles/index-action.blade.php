<a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ route('articles.detail', $data->id) }}"><i class="feather-eye"></i></a>

<a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ route('articles.edit', $data->id) }}"><i class="feather-edit"></i></a>
<form  action="{{ route('articles.delete', $data->id) }}" method="post" style="display: inline-flex" >
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn-outline-danger"> <i class="feather-delete"></i></button>
</form>

