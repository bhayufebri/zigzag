@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item active">USER</li>


@endsection

@section('content')
<h2 class="text-dark m-0 mb-3">USER </h2>

@if($errors->any())
    {!! implode('', $errors->all('<p class="text-danger">:message</p>')) !!}
@endif

<div class="mb-4">
    
        <a href="#" class="btn bg-accent text-white px-2 d-block d-md-inline-block" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="feather-user-plus"></i> Add User</a>        
    
    <!-- <a href="#" class="btn btn-action-white d-block d-md-inline-block" data-toggle="modal" data-target="#modal_filter"><i class="feather-download"></i> Ekspor Data</a> -->
</div>

<div class="card border-0">
    <div class="card-header bg-white text-dark border-0">
        <!-- <div class="col-md-6"> -->
            <!-- <div id="accordion">
                <div class="card">
                    <a class="collapsed card-link pull-right" data-toggle="collapse" href="#collapseFilter">
                    <div class="card-header">Filter<i class="feather-chevron-down mr-3 pull-right"></i>
                                    </div></a>
                        <div id="collapseFilter" class="collapse" data-parent="#accordion">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-5">
                                    <form id="myForm">
                                        <div class="form-group row ">
                                                                <label class="col-form-label col-md-5">Status Verifikasi : </label>
                                                                <div class="col-md-7">
                                                                <select name="status_user" id="status_user" class="form-control">
                                                                    <option value="" >-</option>
                                                                    @forelse ($group as $items)
                                                                    <option value="{{$items->id}}" >{{$items->name}}</option>
                                                                    
                                                                    @empty
                                                                    @endforelse
                                                                </select>
                                                                </div>
                                        </div>
                                        <div class="form-group row ">
                                                                <label class="col-form-label col-md-5">Jenis Pengguna: </label>
                                                                <div class="col-md-7">
                                                                <select name="type_user" id="type_user" class="form-control">
                                                                    <option value="" >--Semua--</option>
                                                                    <option value="do-it" >DO-IT</option>
                                                                </select>
                                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group row ">
                                                            <label class="col-form-label col-md-5">Status Akun : </label>
                                                            <div class="col-md-7">
                                                            <select name="banned_user" id="banned_user" class="form-control">
                                                                <option value="" >--Semua--</option>
                                                                <option value="1" >Terblokir</option>
                                                                <option value="0" >Aktif</option>
                                                            </select>
                                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2">
                                    <button class="btn bg-warning text-white px-4 d-block d-md-inline-block "  id="reset"> Reset</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </div>
            </div> -->
        <!-- </div> -->


                                                
    </div>
    
    <div class="table-responsive col-md-12">
        
 
        <table  id="userTable" class="table table-striped table-bordered" >
            <thead>
                <tr>
                    
                    <th >ID</th>
                    <th> Name</th>
                    <th >DPW Provinsi</th> 
                    <th >Email</th>
                    <th >Institusi</th>
                    <th >Created</th>
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


<!-- Large modal create -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content text-right">
    <form action="/user" method="post" id="identifier" >
                
                
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="card-body ">
                    <!-- <form action="" class="form"> -->
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" id="nama" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' :'' }}"  value="{{ old('nama') }}">
                                @error('nama')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-md-10">

                            <input type="text" id="nik" name="nik" class="form-control {{ $errors->has('nik') ? 'is-invalid' :'' }}"  value="{{ old('nik') }}">
                               
                                @error('nik')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                            </div> 
                        </div>                       
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Lembaga</label>
                            <div class="col-md-10">
                                
                                <input type="text" id="lembaga" name="lembaga" class="form-control {{ $errors->has('lembaga') ? 'is-invalid' :'' }}"  value="{{ old('lembaga') }}">
                                @error('lembaga')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Bank</label>
                            <div class="col-md-10">
                                <!-- <input type="text"  name="category_name" class="form-control category_name" > -->
                                <input type="text" id="bank" name="bank" class="form-control {{ $errors->has('bank') ? 'is-invalid' :'' }}"  value="{{ old('bank') }}">

                                @error('bank')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">No. Rekening</label>
                            <div class="col-md-10">
                                <input type="number" id="rekening" name="rekening" class="form-control {{ $errors->has('rekening') ? 'is-invalid' :'' }}"  value="{{ old('rekening') }}">
                                @error('rekening')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                                
                                <!-- <input type="text" id="alamat" name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' :'' }}"  value="{{ old('alamat') }}"> -->
                                <textarea name="alamat" class="form-control"  ></textarea>
                                @error('alamat')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-md-10">
                                
                                <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control date_acara2 {{ $errors->has('tanggal_lahir') ? 'is-invalid' :'' }}"  value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">No Handphone</label>
                            <div class="col-md-10">
                                
                                <input type="text" id="no_handphone" name="no_handphone" class="form-control {{ $errors->has('no_handphone') ? 'is-invalid' :'' }}"  value="{{ old('no_handphone') }}">
                                @error('no_handphone')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <!-- <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-md-10">
                                
                                    <div class="image-upload">
                                        
                                        <img src="#"  onerror="this.onerror=null;this.src='{{ asset('assets/images/background/blank.jpg') }}';"alt="" width="100" height="100" class="object-fit-cover radius-5" id="img-tag">
                                        
                                        <span class="btn btn-secondary btn-sm" onclick="$(this).next().trigger('click')" ><i class="feather-camera"></i></span>
                                        <input type="file" class="d-none" id="image" name="image">
                                        
                                    </div>
                                
                                
                            </div>
                            @error('image')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                        </div> -->
                        <br/>
                        <br/>
                        <button type="submit" class="btn bg-accent text-white px-4 d-block d-md-inline-block">Submit</button>
                </div>
            
            
            
            
        </form> 
    </div>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="/user/update" method="post" id="identifier2" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
                
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card-body ">
                    <!-- <form action="" class="form"> -->
                    <input type="hidden"  name="id" class="id" >

                    <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input type="text" id="nama" name="nama" class="form-control nama {{ $errors->has('nama') ? 'is-invalid' :'' }}"  value="{{ old('nama') }}">
                                @error('nama')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-md-10">

                            <input type="text" id="nik" name="nik" class="form-control nik {{ $errors->has('nik') ? 'is-invalid' :'' }}"  value="{{ old('nik') }}">
                               
                                @error('nik')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                            </div> 
                        </div>                       
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Lembaga</label>
                            <div class="col-md-10">
                                
                                <input type="text" id="lembaga" name="lembaga" class="form-control lembaga {{ $errors->has('lembaga') ? 'is-invalid' :'' }}"  value="{{ old('lembaga') }}">
                                @error('lembaga')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Bank</label>
                            <div class="col-md-10">
                                <!-- <input type="text"  name="category_name" class="form-control category_name" > -->
                                <input type="text" id="bank" name="bank" class="form-control bank {{ $errors->has('bank') ? 'is-invalid' :'' }}"  value="{{ old('bank') }}">

                                @error('bank')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">No. Rekening</label>
                            <div class="col-md-10">
                                <input type="number" id="rekening" name="rekening" class="form-control rekening {{ $errors->has('rekening') ? 'is-invalid' :'' }}"  value="{{ old('rekening') }}">
                                @error('rekening')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                                
                                <!-- <input type="text" id="alamat" name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' :'' }}"  value="{{ old('alamat') }}"> -->
                                <textarea name="alamat" class="form-control alamat"  ></textarea>
                                @error('alamat')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-md-10">
                                
                                <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control date_acara2 tanggal_lahir{{ $errors->has('tanggal_lahir') ? 'is-invalid' :'' }}"  value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">No Handphone</label>
                            <div class="col-md-10">
                                
                                <input type="text" id="no_handphone" name="no_handphone" class="form-control no_handphone {{ $errors->has('no_handphone') ? 'is-invalid' :'' }}"  value="{{ old('no_handphone') }}">
                                @error('no_handphone')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                </div>
            
            
            
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form> 
    </div>
  </div>
</div>

<!-- Modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p class="font-weight-bold">Are You sure?</p>
            <input type="hidden"  name="id" class="form-control id_del" >

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger btn_del_act">Delete</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('customjs')
    <script>
     $('#menuUser').addClass('active');
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
              url: "{!! route('user.indexData') !!}",
              type: 'GET',
              data: function (d) {
                // console.log(d);
              d.status_user = $('#status_user').val();
              d.banned_user = $('#banned_user').val();
              d.type_user = $('#type_user').val();

              }
             },
    order: [[5, 'desc']],
    columns:[
        {data:'id',name:'id'},
    {data:'nama',name:'nama'},
    {data:'nik',name:'nik'},

    
    {data:'lembaga',name:'lembaga'},
    
    {data:'bank',name:'bank'},
    {data: 'created_at', name:'created_at'},
    // {data:'banned_logo',name:'banned_logo'},
    // {data:'p2p_name',name:'p2p_name'},
    {data: 'action',name:'action'},

    
    ],
    columnDefs: [
    
    {
        targets: 4,
        className: 'text-center', "orderable": false, "bSearchable": false
    },
    // {
    //     targets: 5,
    //     className: 'text-center', "orderable": false, "bSearchable": false
    // },
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

   

    
    } );


    
    
        $(document).ready( function () {
            // $('#datatable').DataTable({
            //     "initComplete": function(settings, json) {
            //         $('#filter-calendar').prependTo($('#datatable_filter'));         
            //     }
            // });
            $('.date_acara2').datepicker({ format: 'yyyy-mm-dd' });
            $('.date_acara').datepicker({ 
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4'
                 });


            $('#multiselect').multiSelect();
        });
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
        });

        $(document).on('click','.btn_edit',function(){
                console.log('waaaaa', $(this).attr('id').slice(4));
                var id_cat = $(this).attr('id').slice(4);
                $.ajax({
                    type:'POST',
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "id": id_cat
                        },
                    dataType: 'JSON',
                    url:"{!! route('user.lihat') !!}",
                    success:function(data) {
                        console.log(data['nama']);
                     
                        $('.nama').val(data['nama']);
                        $('.nik').val(data['nik']);
                        $('.lembaga').val(data['lembaga']);
                        $('.bank').val(data['bank']);
                        $('.rekening').val(data['rekening']);
                        $('.alamat').val(data['alamat']);
                        $('.tanggal_lahir').val(data['tanggal_lahir']);
                        $('.no_handphone').val(data['no_handphone']);

                        $('.id').val(data['id']);
        


                        
                    setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
                    }
                });
            });

            $(document).on('click','.btn_del',function(){
                // console.log('waaaaa', $(this).attr('id').slice(4));
                var id_cat = $(this).attr('id').slice(6);
                $('.id_del').val(id_cat);

            });


            $(document).on('click','.btn_del_act',function(){              
                var id_cat = $('.id_del').val();

                $.ajax({
                    type:'POST',
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "id": id_cat
                        
                        },
                    dataType: 'JSON',
                    url:"{!! route('user.delete') !!}",
                    success:function(data) {
                        console.log(data);

                        window.location.href = "{!! route('user.index') !!}";

                        
                    setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
                    }
                });
            });
    </script>
@endsection
