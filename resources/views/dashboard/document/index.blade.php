@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item active">LEGAL DOCUMENT</li>


@endsection

@section('content')

<h2 class="text-dark m-0 mb-3">LEGAL DOCUMENT </h2>
<div class="card border-0">   
    <div class="table-responsive col-md-12">
        <table id="legalTable" class="table table-striped table-bordered" >
            <thead>
                <tr>
                    
                    <th width="5%">ID</th>
                    <th width="30%">Vendor Name</th>
                    <th width="30%">KTP Number</th> 
                    <th width="30%">NPWP Number</th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div class="card-footer bg-white border-light"></div>
</div>
@endsection
@section('customjs')
<script>
$('#menuLegal').addClass('active');
$(document).ready(function() {
    $('#legalTable').DataTable({
        processing:true,
        serverSide:true,
        ajax: '{!! route('document.indexData') !!}',
        order: [[0, 'desc']],
        columns:[
            {data:'id',name:'id'},
            {data:'Name',name:'Name'},
            {data:'ktp_number',name:'ktp_number'},
            {data:'npwp_number',name:'npwp_number'},
            {data: 'action',name:'action'},
        ],
        columnDefs: [
            {
                targets: 4,
                className: 'text-center', "orderable": false, "bSearchable": false
            }
        ],

    });
} );
</script>
@endsection
