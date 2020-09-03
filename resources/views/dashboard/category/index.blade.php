@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item active">USER</li>


@endsection

@section('content')

<h2 class="text-dark m-0 mb-3">USER </h2>
<!-- <div class="mb-4">
    
        <a href="#" class="btn bg-accent text-white px-2 d-block d-md-inline-block"><i class="feather-user-plus"></i> Add User</a>        
    
    <a href="#" class="btn btn-action-white d-block d-md-inline-block" data-toggle="modal" data-target="#modal_filter"><i class="feather-download"></i> Ekspor Data</a>
</div> -->
<div class="row">
    <div class="col-md-4">


        <div class="card text-right ">
            <div class="card-header">
                Add Category
            </div>


            <form action="/category_product/create" method="post">
                
                
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <div class="card-body ">
                        <!-- <form action="" class="form"> -->
                            <div class="form-group row ">
                                <label class="col-sm-4 col-form-label">Category</label>
                                <div class="col-md-8">
                                    <input type="text" id="category_name" name="category_name" class="form-control {{ $errors->has('category_name') ? 'is-invalid' :'' }}"  value="{{ old('category_name') }}">
                                    @error('category_name')
                                    <span class="help-block form-error" >{{$message}}</span>
                                    @enderror
                                    
                                </div> 
                            </div>
                            <!-- <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Belakang</label>
                                <div class="col-md-6">
                                    <input type="text" id="lastname" name="lastname" class="form-control {{ $errors->has('lastname') ? 'is-invalid' :'' }}" value="{{ old('lastname') }}">
                                    @error('lastname')
                                    <span class="help-block form-error" >{{$message}}</span>
                                    @enderror
                                </div> 
                            </div> -->
                            <button type="submit" class="btn bg-accent text-white px-4 d-block d-md-inline-block">Submit</button>
                    </div>
                
                
                
                
            </form> 
        </div>
    </div>

    <div class="col-md-8">
        <div class="card border-0"> 
            <div class="card-body">      
                <div class="table-responsive ">
                    <table  id="userTable" class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                
                                <th >ID</th>
                                <th >Category Name</th>
                                <th >is Show</th> 
                                
                                <th ></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group row ">
                <label class="col-sm-4 col-form-label">Category</label>
                <div class="col-md-8">
                    <input type="text"  name="category_name" class="form-control category_name" >
                    <input type="hidden"  name="id" class="form-control id" >
                </div> 
            </div>
            <div class="form-group row ">
                <label class="col-sm-4 col-form-label">Show</label>
                <div class="col-md-8">
                    <!-- <input type="text"  name="category_name" class="form-control category_name" > -->
                    <select name="is_show" class="form-control is_show">
                                <option value="">--Select--</option>
                                
                                    <option value="0" >Hidden</option>
                                    <option value="1" >Show</option>
                                

                    </select>
                </div> 
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn_update">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
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
     $('#menuCategory').addClass('active');
    //  $('#menuAllUser').addClass('active');
    //  $('#user-submenu').addClass('show');
    //  $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');

    //  count_user_badges
     
    </script>
    <script>





    $(document).ready(function() {
   
    var oTable = $('#userTable').DataTable({
    processing:true,
    serverSide:true,
    // order: [[ 2, "desc" ]],
    // ajax:'{!! route('user.indexData') !!}',
    ajax: {
              url: "{!! route('category_product.indexData') !!}",
              type: 'GET',
              data: function (d) {
                // console.log(d);
            //   d.status_user = $('#status_user').val();
            //   d.banned_user = $('#banned_user').val();
            //   d.type_user = $('#type_user').val();

              }
             },
    // order: [[0, 'desc']],
    columns:[
        {data:'id',name:'id'},
    {data:'category_name',name:'category_name'},
    {data:'is_show',name:'is_show'},
    {data: 'action',name:'action'},

    
    ],
    columnDefs: [
    
    {
        targets: 3,
        className: 'text-center', "orderable": false, "bSearchable": false
    },

  ],

    });

  
    
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
        });
        $(document).on('click','.btn_edit',function(){
                // console.log('waaaaa', $(this).attr('id').slice(4));
                var id_cat = $(this).attr('id').slice(4);
                $.ajax({
                    type:'POST',
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "id": id_cat
                        },
                    dataType: 'JSON',
                    url:"{!! route('category_product.edit_category') !!}",
                    success:function(data) {
                        console.log(data);
                        $('.category_name').val(data['category_name']);
                        $('.is_show').val(data['is_show']);
                        $('.id').val(data['id']);


                        
                    setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
                    }
                });
            });

            $(document).on('click','.btn_update',function(){              
                var id_cat = $('.id').val();
                var name_cat = $('.category_name').val();
                var is_cat = $('.is_show').val();

                $.ajax({
                    type:'POST',
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "id": id_cat,
                        "category_name": name_cat,
                        "is_show": is_cat
                        },
                    dataType: 'JSON',
                    url:"{!! route('category_product.update_category') !!}",
                    success:function(data) {
                        console.log(data);

                        window.location.href = "{!! route('category_product.index') !!}";

                        
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
                    url:"{!! route('category_product.delete_category') !!}",
                    success:function(data) {
                        console.log(data);

                        window.location.href = "{!! route('category_product.index') !!}";

                        
                    setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
                    }
                });
            });
            



    </script>
@endsection
