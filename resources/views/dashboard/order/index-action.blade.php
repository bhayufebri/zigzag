<a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ $data->id ? route('order.show', $data->id) : '#'}}"><i class="feather-eye"></i></a>

<a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ $data->id ? route('order.edit', $data->id) : '#'}}"><i class="feather-edit"></i></a>
