@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item active">ORDER</li>


@endsection

@section('content')

<h2 class="text-dark m-0 mb-3">ORDER </h2>
<div class="mb-4">
    
        <!-- <a href="#" class="btn bg-accent text-white px-2 d-block d-md-inline-block"><i class="feather-user-plus"></i> Add User</a>        
    
    <a href="#" class="btn btn-action-white d-block d-md-inline-block" data-toggle="modal" data-target="#modal_filter"><i class="feather-download"></i> Ekspor Data</a> -->
</div>

<div class="card border-0">
    <div class="card-header bg-white text-dark border-0">
        <!-- <div class="col-md-6"> -->
            <div id="accordion">
                <div class="card">
                    <a class="collapsed card-link pull-right" data-toggle="collapse" href="#collapseFilter">
                    <div class="card-header">Filter<i class="feather-chevron-down mr-3 pull-right"></i>
                                    </div></a>
                        <div id="collapseFilter" class="collapse" data-parent="#accordion">
                            <div class="card-body ">
                                    <form id="myForm" action="/order/export_order" method="post" class="form">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group row ">
                                                                <label class="col-form-label col-md-5">Event : </label>
                                                                <div class="col-md-7">
                                                                    <select name="event" id="event" class="form-control select2" style="width:100%">
                                                                        <option value="" >--Semua--</option>
                                                                        @forelse ($event as $items)
                                                                        <option value="{{$items->id}}" >{{$items->name}}</option>
                                                                        @empty
                                                                        <option value="" >-</option>
                                                                        @endforelse
                                                                        
                                                                    </select>
                                                                </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group row ">
                                                            <label class="col-form-label col-md-5">Status  : </label>
                                                            <div class="col-md-7">
                                                            <select name="status" id="status" class="form-control">
                                                                    <option value="" >--Semua--</option>
                                                                    @forelse ($invoice as $items)
                                                                    <option value="{{$items->status}}" >{{$items->status}}</option>
                                                                    @empty
                                                                    <option value="" >-</option>
                                                                    @endforelse
                                                            </select>
                                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-outline-warning px-4 d-block d-md-inline-block "  id="reset"> Reset</a> 
                                        <button class="btn btn-outline-secondary px-2 d-block d-md-inline-block " type="submit"> <i class="feather-download"></i></button>
                                    </div>
                                </div>
                                        </form>
                            </div>
                        </div>
                
                </div>
            </div>
        <!-- </div> -->
    </div>
    
    <div class="table-responsive col-md-12">
        
 
        <table  id="userTable" class="table table-striped table-bordered" >
            <thead>
                <tr>
                    
                    <th >ID</th>
                    <th >Invoice</th>
                    <th >Name</th> 
                    <th >Event</th>
                    <th >Qty</th>
                    <th >Total</th>
                    <th >Payment Method</th>
                    <th >Status</th>
                    <th >Created</th>
                    <th >Confirm</th>
                    <th ></th>
                    
                </tr>
            </thead>
            <tbody>
               
                
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white border-light">
    
    </div>
</div>
@endsection
@section('customjs')
    <script>
     $('#menuOrder').addClass('active');
    //  $('#menuAllUser').addClass('active');
    //  $('#user-submenu').addClass('show');
    //  $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');

    //  count_user_badges
     
    </script>
    <script>





    $(document).ready(function() {
   
    var oTable = $('#userTable').DataTable({
        // "language": {
        //         "paginate": {
        //           "previous": "Sebelumnya",
        //           "next": "Selanjutnya"
        //         },
        //         "lengthMenu": "Tampilkan _MENU_ data",
        //         "zeroRecords": "Data Tidak Ada",
        //         "sInfo": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
        //         "sSearch": "Cari:",
        //         "infoEmpty": "Data Tidak Tersedia",
        //         "infoFiltered": "(pencarian dari _MAX_ total data)",
        //         "processing": "Sedang memproses..."
        //     },
    processing:true,
    serverSide:true,
    // order: [[ 2, "desc" ]],
    // ajax:'{!! route('user.indexData') !!}',
    ajax: {
              url: "{!! route('order.indexData') !!}",
              type: 'GET',
              data: function (d) {
                // console.log(d);
              d.event = $('#event').val();
              d.status = $('#status').val();
              d.type_user = $('#type_user').val();

              }
             },
    order: [[0, 'desc']],
    columns:[
        {data:'id',name:'id'},
    {data:'invoice_no',name:'invoice_no'},
    {data:'first_name',name:'user.first_name'},
    {data:'event',name:'event.name'},

    
    
    {data: 'quantity', name:'invoice_detail.jml'},
    {data:'total',name:'total', render:  $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
    {data:'payment_method',name:'payment_method.name'},
    {data:'status', name:'status'},
    {data:'created_at',name:'created_at'},
    {data:'confirm',name:'confirm'},

    {data: 'action',name:'action'},

    
    ],
    columnDefs: [
    
    {
        targets: 10,
        className: 'text-center', "orderable": false, "bSearchable": false
    },
    {
        targets: 9,
        className: 'text-center', "orderable": false, "bSearchable": false
    },
    // {
    //     targets: 7,
    //     className: 'text-center', "orderable": false, "bSearchable": false
    // },
    // {
    //     targets: 6,
    //     className: 'text-center'
    // },
    // {
    //     "orderable": false, "targets": 6, "bSearchable": false
    // }
  ],

    });

    $('#event').on('change',function(){
            oTable.ajax.reload();
            // $('#verifikasi').val($('#status_user').val());
        });
        $('#status').on('change',function(){
            oTable.ajax.reload();
            // $('#status').val($('#banned_user').val());


        });
    //     $('#type_user').on('change',function(){
    //         oTable.ajax.reload();
    //         $('#tipe').val($('#type_user').val());


    //     });
        $('#reset').on('click',function(){
            $("#event").select2('val', 'All');
        document.getElementById("myForm").reset();
           oTable.ajax.reload();
       });


    //    $('#multiselect').on('change',function(){
    //         // oTable.ajax.reload();
    //             // console.log($('#multiselect').val().length);
    //             // find('option:selected')
    //         if($('#multiselect').val().length == 0){
    //             $("#export_excel").attr('disabled',true)
    //             // console.log('benar');
    //         }
    //         else if ($('#multiselect').val().length > 0){
    //         // $('#export_excel').atr($('#status_user').val());
    //         $("#export_excel").attr('disabled',false)
    //         }
    //     });

    //     $('#modal_filter').on('shown.bs.modal', function () {
    //     // do something…
    //     alert("Hello World!");
    //         // console.log('close');
    //     });


        
        
    //     $('#export_excel').click(function () {
    //     // do something…
    //         // $($(this).closest('.modal')).modal('hide');
    //         $('#modal-filter').modal('hide');
    //         console.log('close');
    //     });

    
    } );
    </script>
    
 <!-- <script>

        $('#export_excel').click(function () {
                // do something…
                    $($(this).closest('.modal')).modal('hide');
                    console.log('close');
                });
</script> -->
<!-- MULTI SELECT -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>

    
    <script>
        $(document).ready( function () {
            // $('#datatable').DataTable({
            //     "initComplete": function(settings, json) {
            //         $('#filter-calendar').prependTo($('#datatable_filter'));         
            //     }
            // });
            $('#multiselect').multiSelect();
        $(".select2").select2();
        });
    </script>
@endsection
