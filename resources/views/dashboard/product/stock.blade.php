@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item">Product</li>

<li class="breadcrumb-item active">Detail</li>


@endsection

@section('content')

<h2 class="text-dark m-0 mb-3">Detail </h2>
@if($errors->any())
    {!! implode('', $errors->all('<p class="text-danger">:message</p>')) !!}
@endif
<!-- <div class="mb-4">
    
        <a href="#" class="btn bg-accent text-white px-2 d-block d-md-inline-block"><i class="feather-user-plus"></i> Add User</a>        
    
    <a href="#" class="btn btn-action-white d-block d-md-inline-block" data-toggle="modal" data-target="#modal_filter"><i class="feather-download"></i> Ekspor Data</a>
</div> -->




    <!-- <div class="col-md-8"> -->
        <div id="accordion">
        <div class="card border-0 mb-4"> 
        <a class="collapsed card-link pull-right" data-toggle="collapse" href="#collapseFilter">
                                <div class="card-header">Detail
                                    
                                    
                                    <i class="feather-chevron-down mr-3 pull-right"></i>
                                   
                                </div> </a>
            <div id="collapseFilter" class="collapse" data-parent="#accordion">
            <div class="card-body">      

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text"  name="product_name" class="form-control product_name"  value="{{ $product->product_name }}" disabled>
                                
                                </div> 
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-md-4">

                                    <select name="category_product_id" class="form-control category_product_id {{ $errors->has('category_product_id') ? 'is-invalid' :'' }}" disabled>
                                            
                                                    <option value="">--Select--</option>
                                                    @forelse ($category_product as $item)
                                                        <option value="{{  $item->id  }}" {{ $product->category_product_id == $item->id ? 'selected' : '' }} >{{  $item->category_name  }}</option>
                                                    @empty
                                                    <option value="">-</option>
                                                    @endforelse

                                    </select>
                                
                                
                                </div> 
                            </div>
                       

                        
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Detail</label>
                            <div class="col-md-10">
                                <div id="detail2" name="detail2" style="min-height:100px"></div>
                                
                                
                            </div> 
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Date</label>
                            <div class="col-md-4">
                                
                                <input type="text" id="date_acara" name="date_acara" class="form-control"  value="{{ date('d F Y', strtotime($product->date_acara)) }}" disabled>
                               
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Show</label>
                            <div class="col-md-4">
                                <!-- <input type="text"  name="category_name" class="form-control category_name" > -->
                                <select name="is_show" class="form-control is_show" disabled>
                                            <option value="">--Select--</option>
                                            
                                                <option value="0" {{ $product->is_show == 0 ? 'selected' : '' }}>Hidden</option>
                                                <option value="1" {{ $product->is_show == 1 ? 'selected' : '' }}>Show</option>
                                            

                                </select>
                              
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Price</label>
                            <div class="col-md-4">
                                <input type="text"  name="price" class="form-control price"  value="{{ number_format($product->price, 0, ',', '.')}}" disabled>
                                
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-md-10">
                                
                                    <div class="image-upload">
                                        
                                        <img src="{{ asset('uploads/products/'.$product->image.'') }}" 
                                         onerror="this.onerror=null;this.src='{{ asset('assets/images/background/blank.jpg') }}';"
                                         alt="" width="100" height="100" class="object-fit-cover radius-5 image2" id="img-tag2">
                                        
                                        <span class="btn btn-secondary btn-sm" onclick="$(this).next().trigger('click')" ><i class="feather-camera"></i></span>
                                        <input type="file" class="d-none" id="image2" name="image">
                                        
                                    </div>
                                
                                
                            </div>
                            @error('image')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                        </div>
                        <br/>
                        <br/>
                        <!-- <button type="submit" class="btn bg-accent text-white px-4 d-block d-md-inline-block">Submit</button> -->
                
                



            </div>
        </div>
    </div>
</div>

        <div class="card border-0"> 
            
            <div class="card-body">
                <!-- <div class="mb-4">
                    <button type="button" class="btn btn-outline-success px-2 d-block d-md-inline-block" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="feather-plus"></i> Add Detail Stock</button>
                </div> -->
                <div class="table-responsive col-md-12">
                    <table  id="userTable" class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                
                                <th >ID</th>
                                <th > Status</th>
                                <th >Nama</th>
                                <th >Email</th>
                                <th >Phone</th>
                                <th >QR Code</th>

                                
                                
                                <th >Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($order_detail as $items)
                                <tr >
                                <td>{{$items->id }}</td>
                                
                                <td>
                                <!-- {{$items->order->status }} -->
                                @if($items->order->status == 'new')
                                <span class="badge badge-primary">{{$items->order->status}}</span>
                                @elseif($items->order->status == 'pending')
                                <span class="badge badge-warning">{{$items->order->status}}</span>

                                @elseif($items->order->status == 'success')
                                <span class="badge badge-success">{{$items->order->status}}</span>

                                @elseif($items->order->status == 'failed')
                                <span class="badge badge-danger">{{$items->order->status}}</span>
                                @elseif($items->order->status == 'hadir')
                                <span class="badge badge-dark">{{$items->order->status}}</span>
                                @else
                                <span class="badge badge-light">{{$items->order->status}}</span>

                                @endif
                                
                                </td>

                                <td>{{$items->order->user->first_name}}</td>
                                <td>{{$items->order->user->email}}</td>
                                <td>{{$items->order->user->user_detail ? $items->order->user->user_detail->phone  : ''}}</td>
                                <td>{{$items->order->qr_code ? $items->order->qr_code  : ''}}</td>


                                
                                
                                <td>
                                <!-- <a  class="btn btn-circle-light delete_detail " id="{{$items->id}}"><i class="fa fa-times"></i></a> -->
<!-- <a class="btn  text-dark py-0 px-1 btn-sm btn_edit" id="edit{{ $items->id }}" data-toggle="modal" data-target="#exampleModal"><i class="feather-edit"></i></a>
<a class="btn btn-link text-dark py-0 px-1 btn-sm btn_del" id="delete{{ $items->id }}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-times text-danger"></i></a> -->
@if($items->order->status == 'pending' || $items->order->status == 'failed')

<a class="btn btn-link text-dark py-0 px-1 btn-sm btn_del" id="delete{{ $items->order->id }}" title="Set New" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-reply text-danger"></i></a>
<a class="btn btn-link text-dark py-0 px-1 btn-sm btn_suc" id="success{{ $items->order->id }}" title="Set Success" data-toggle="modal" data-target="#successModal"><i class="fa fa-share text-primary"></i></a>

@endif
@if($items->order->status == 'success')


<a class="btn btn-link text-dark py-0 px-1 btn-sm btn_had" id="hadir{{ $items->order->id }}" title="Hadir" data-toggle="modal" data-target="#hadirModal"><i class="fa fa-check text-primary"></i></a>

@endif
@if($items->order->status == 'hadir')


<a class="btn btn-link text-dark py-0 px-1 btn-sm btn_kir" id="kirim{{ $items->order->id }}" title="Kirim" data-toggle="modal" data-target="#kirimModal"><i class="fa fa-check text-primary"></i> Kirim</a>

@endif
@if($items->order->status == 'terkirim')


<a class="btn btn-link text-dark py-0 px-1 btn-sm" href="{{ $items->order->link_sertifikat }}" title="{{ $items->order->link_sertifikat }}" target="_blank"><i class="fa fa-link text-primary"></i></a>

@endif

<!-- {{count($items->order->midtrans_detail)}} -->
@if(count($items->order->midtrans_detail) > 0)


<a class="btn btn-link text-dark py-0 px-1 btn-sm btn_his" id="histori{{ $items->order->id }}" title="histori" data-toggle="modal" data-target="#historiModal"><i class="fa fa-eye text-primary"></i></a>

@endif


                                </td>
                                </tr>
                                @empty
                                    <div >-</div>
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- </div>
        </div> -->


<!-- Large modal create -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content text-right">
    <form action="/product/stock_store" method="post"  >
                
                
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="card-body ">
                    <!-- <form action="" class="form"> -->
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Detail Product Name</label>
                            <div class="col-md-8">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="text" name="detail_product_name" class="form-control {{ $errors->has('detail_product_name') ? 'is-invalid' :'' }}"  value="{{ old('detail_product_name') }}">
                                @error('stock')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        
                        
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Stock</label>
                            <div class="col-md-8">
                                <input type="number" name="stock" class="form-control {{ $errors->has('stock') ? 'is-invalid' :'' }}"  value="{{ old('stock') }}">
                                @error('stock')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        
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
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <form action="/product/stock_update" method="post" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
                
      {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="card-body ">
                    <!-- <form action="" class="form"> -->
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Detail Product Name</label>
                            <div class="col-md-8">
                            <input type="hidden" class="product_id" name="product_id" >
                            <input type="hidden" class="id" name="id" >

                                <input type="text" name="detail_product_name" class="form-control detail_product_name {{ $errors->has('detail_product_name') ? 'is-invalid' :'' }}"  value="{{ old('detail_product_name') }}">
                                @error('stock')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        
                        
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Stock</label>
                            <div class="col-md-8">
                                <input type="number" name="stock" class="form-control stock {{ $errors->has('stock') ? 'is-invalid' :'' }}"  value="{{ old('stock') }}">
                                @error('stock')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        
                        <br/>
                        <br/>
                        <!-- <button type="submit" class="btn bg-accent text-white px-4 d-block d-md-inline-block">Submit</button> -->
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
    <form action="{{ route('product.stock_delete') }}" method="post" >
    {{ csrf_field() }}
                {{ method_field('POST') }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p class="font-weight-bold">Are You sure?</p>
            <input type="hidden"  name="id" class="form-control id_del" >
            <input type="hidden"  name="id_parent" class="form-control" value="{{ $product->id }}" >


      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Reset</button>
      </div>
      </form> 

    </div>
  </div>
</div>

<!-- Modal success -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ route('product.stock_success') }}" method="post" >
    {{ csrf_field() }}
                {{ method_field('POST') }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Set Status Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p class="font-weight-bold">Are You sure?</p>
            <input type="hidden"  name="id" class="form-control id_suc" >
            <input type="hidden"  name="id_parent" class="form-control" value="{{ $product->id }}" >


      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Set Success</button>
      </div>
      </form> 

    </div>
  </div>
</div>

<!-- Modal hadir -->
<div class="modal fade" id="hadirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ route('product.stock_hadir') }}" method="post" >
    {{ csrf_field() }}
                {{ method_field('POST') }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Set Status Hadir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p class="font-weight-bold">Are You sure?</p>
            <input type="hidden"  name="id" class="form-control id_had" >
            <input type="hidden"  name="id_parent" class="form-control" value="{{ $product->id }}" >


      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Set Hadir</button>
      </div>
      </form> 

    </div>
  </div>
</div>


<!-- Modal kirim -->
<div class="modal fade" id="kirimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ route('product.stock_kirim') }}" method="post" >
    {{ csrf_field() }}
                {{ method_field('POST') }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kirim Link Sertifikat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <input type="text"  name="link_sertifikat" class="form-control" placeholder="link sertifikat" >

            <!-- <p class="font-weight-bold">Anda Yakin?</p> -->
            <input type="hidden"  name="id" class="form-control id_kir" >
            <input type="hidden"  name="id_parent" class="form-control" value="{{ $product->id }}" >


      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Kirim</button>
      </div>
      </form> 

    </div>
  </div>
</div>

<!-- Modal histori -->
<div class="modal fade" id="historiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Histori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  

      <table   class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                
                                <th >ID</th>
                                <th > Payment method</th>
                                

                                
                                
                                <th >Status</th>
                                <th >Tanggal</th>
                                

                                
                            </tr>
                        </thead>
                        <tbody class="isi">
                        
                                
                                
                        </tbody>
                    </table>


      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
      

    </div>
  </div>
</div>
@endsection
@section('customjs')
    <script>
     $('#menuProduct').addClass('active');
    //  $('#menuAllUser').addClass('active');
    //  $('#user-submenu').addClass('show');
    //  $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');

    //  count_user_badges
     
    </script>

<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>



    <script>





    $(document).ready(function() {
   
        quill2.root.innerHTML = {!! json_encode($product->detail) !!};

    $('#userTable').DataTable(
        {

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
    );


  
    
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
                    url:"{!! route('product.stock_edit') !!}",
                    success:function(data) {
                        console.log(data);
                        // quill2.root.innerHTML = data['detail'];
                        $('.detail_product_name').val(data['detail_product_name']);
                        $('.stock').val(data['stock']);
                        $('.product_id').val(data['product_id']);
                        $('.id').val(id_cat);

                        // $('.price').val(data['price']);

                        // $('.id').val(data['id']);
                        // $(".image2").attr("src", '{{ URL::asset('uploads/') }}'+'/products/' +data['image']);


                        
                    setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
                    }
                });
            });

            // $(document).on('click','.btn_update',function(){              
            //     var id_cat = $('.id').val();
            //     var name_cat = $('.category_name').val();
            //     var is_cat = $('.is_show').val();

            //     $.ajax({
            //         type:'POST',
            //         data: {
            //             "_token": "{!! csrf_token() !!}",
            //             "id": id_cat,
            //             "category_name": name_cat,
            //             "is_show": is_cat
            //             },
            //         dataType: 'JSON',
            //         url:"{!! route('category_product.update_category') !!}",
            //         success:function(data) {
            //             console.log(data);

            //             window.location.href = "{!! route('category_product.index') !!}";

                        
            //         setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
            //         }
            //     });
            // });

            $(document).on('click','.btn_del',function(){
                // console.log('waaaaa', $(this).attr('id').slice(4));
                var id_cat = $(this).attr('id').slice(6);
                $('.id_del').val(id_cat);
            });
            $(document).on('click','.btn_suc',function(){
                // console.log('waaaaa', $(this).attr('id').slice(4));
                var id_cat = $(this).attr('id').slice(7);
                $('.id_suc').val(id_cat);
            });
            $(document).on('click','.btn_had',function(){
                // console.log('waaaaa', $(this).attr('id').slice(4));
                var id_cat = $(this).attr('id').slice(5);
                $('.id_had').val(id_cat);
            });
            $(document).on('click','.btn_kir',function(){
                // console.log('waaaaa', $(this).attr('id').slice(4));
                var id_cat = $(this).attr('id').slice(5);
                $('.id_kir').val(id_cat);
            });
            $(document).on('click','.btn_his',function(){
                // console.log('waaaaa', $(this).attr('id').slice(4));
                $('.isi').empty();
                var id_cat = $(this).attr('id').slice(7);
                $.ajax({
                    type:'POST',
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "id": id_cat
                        
                        },
                    dataType: 'JSON',
                    url:"{!! route('product.histori') !!}",
                    success:function(data) {
                        console.log(data);
                        // console.log(id_parent);
                        for(i=0;i<data.length;i++){

                        $('.isi').append('<tr><td>'+data[i]['id']+'</td><td>'+data[i]['payment_method']+'</td><td>'+data[i]['status']+'</td><td>'+ data[i]['created_at'] +'</td></tr>');

                        }
                        // window.location.href = "{!! route('product.show', '+id_parent+') !!}";

                        
                    setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
                    }
                });
                // $('.id_kir').val(id_cat);
            });


            $(document).on('click','.btn_del_act',function(){              
                var id_cat = $('.id_del').val();
                var id_parent = {!! json_encode($product->id) !!};
                // {{ $product->id }}

                $.ajax({
                    type:'POST',
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "id": id_cat
                        
                        },
                    dataType: 'JSON',
                    url:"{!! route('product.stock_delete') !!}",
                    success:function(data) {
                        console.log(data);
                        console.log(id_parent);


                        // window.location.href = "{!! route('product.show', '+id_parent+') !!}";

                        
                    setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
                    }
                });
            });
            


            


    </script>

    <!-- QUILL EDITOR -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }],
            ['image'],
            ['clean']         
        ];

       
        var quill2 = new Quill('#detail2', {
            theme: 'snow',
            
            modules: {
                toolbar: toolbarOptions
            }
        });
        quill2.enable(false);

        
        $("#identifier2").on("submit",function(){
            var editor_content2 = quill2.root.innerHTML
        $("#hiddenArea2").val(editor_content2);
        })



    function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    // $('#profile-img-tag').attr('src', e.target.result);
                    $('#img-tag').attr('src', e.target.result);

                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function(){
            readURL2(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    // $('#profile-img-tag').attr('src', e.target.result);
                    $('#img-tag2').attr('src', e.target.result);

                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image2").change(function(){
            readURL(this);
        });
        
    </script>
@endsection
