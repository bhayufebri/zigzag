<a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ route('customer.show', $data->id) }}" title="lihat detail"><i class="fa fa-eye" style="font-size:30px;color:red"></i></a>

@if($data->status == 'success' || $data->status == 'hadir' || $data->status == 'terkirim')
<a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ route('customer.cetak_pdf', $data->id) }}" title="invoice"><i class="fa fa-download"></i></a>
@endif
@if($data->status == 'terkirim')
<a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ $data->link_sertifikat }}" title="link sertifikat" target="_blank"><i class="fa fa-link"></i></a>
@endif