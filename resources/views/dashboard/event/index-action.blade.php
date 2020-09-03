<a class="btn btn-link text-dark py-0 px-1 btn-sm set_featured" href="{{ route('event.set_featured', $data->id) }}" data-toggle="tooltip" data-placement="top" title="Set as featured"><i class="{{$data->featured == 1 ? 'feather-check-circle' : 'feather-circle'}}"></i></a>
<a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ route('event.detail', $data->id) }}"><i class="feather-eye"></i></a>

<a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ route('event.edit', $data->id) }}"><i class="feather-edit"></i></a>

