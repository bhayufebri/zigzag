
@extends('layouts.app5')

<!-- @section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item active">EVENT</li>


@endsection -->

@section('content')

	
	
	
    <br/>
	<section class="shop-home-list section">
		<div class="container">
            
            <div class="table-responsive">
                
        
                <table  id="userTable" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                            
                            <th >ID</th>
                            <th >Nama Seminar</th>
                            <th >Status</th> 
                            <!-- <th >Histori</th>  -->

                            <th >Biaya</th>
                            <th >Aksi</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
	@endsection
    @section('customjs')
    <script>
     $('#menuList').addClass('active');  

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
              url: "{!! route('customer.indexData') !!}",
              type: 'GET',
            //   data: function (d) {
            //     // console.log(d);
            //   d.status_user = $('#status_user').val();
            //   d.banned_user = $('#banned_user').val();
            //   d.type_user = $('#type_user').val();

            //   }
             },
    // order: [[5, 'desc']],
    columns:[
        {data:'id',name:'id'},
    {data:'product',name:'product'},
    {data:'status',name:'status'},
    // {data:'histori',name:'histori'},

    {data:'total',name:'total', render:  $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
    
    {data: 'action',name:'action'},

    
    ]
    

    });

   

    
    } );  
    </script>


    @endsection