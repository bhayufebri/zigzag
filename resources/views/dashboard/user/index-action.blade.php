<!-- <a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ route('user.show', $data->id) }}"><i class="feather-eye"></i></a> -->
<a class="btn  text-dark py-0 px-1 btn-sm btn_edit" id="edit{{ $data->id }}" data-toggle="modal" data-target="#exampleModal"><i class="feather-edit"></i></a>

<!-- <a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ route('user.edit', $data->id) }}"><i class="feather-edit"></i></a> -->
<a class="btn btn-link text-dark py-0 px-1 btn-sm btn_del" id="delete{{ $data->id }}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-times text-danger"></i></a>
<a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ route('user.cetak_pdf', $data->id) }}" title="invoice"><i class="fa fa-download"></i></a>
