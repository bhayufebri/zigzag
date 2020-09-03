@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item active">Product</li>


@endsection

@section('content')

<h2 class="text-dark m-0 mb-3">Product </h2>
@if($errors->any())
    {!! implode('', $errors->all('<p class="text-danger">:message</p>')) !!}
@endif
<!-- <div class="mb-4">
    
        <a href="#" class="btn bg-accent text-white px-2 d-block d-md-inline-block"><i class="feather-user-plus"></i> Add User</a>        
    
    <a href="#" class="btn btn-action-white d-block d-md-inline-block" data-toggle="modal" data-target="#modal_filter"><i class="feather-download"></i> Ekspor Data</a>
</div> -->
<div class="mb-4">
<button type="button" class="btn btn-outline-success px-2 d-block d-md-inline-block" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="feather-plus"></i> Add Product</button>
</div>



    <!-- <div class="col-md-8"> -->
        <div class="card border-0"> 
            <div class="card-body">      
                <div class="table-responsive ">
                    <table  id="userTable" class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                
                                <th >ID</th>
                                <th > Product Name</th>
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
    <!-- </div>
</div> -->

<!-- Large modal create -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content text-right">
    <form action="/product/store" method="post" id="identifier" enctype="multipart/form-data">
                
                
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="card-body ">
                    <!-- <form action="" class="form"> -->
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-md-10">
                                <input type="text" id="product_name" name="product_name" class="form-control {{ $errors->has('product_name') ? 'is-invalid' :'' }}"  value="{{ old('product_name') }}">
                                @error('product_name')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category</label>
                            <div class="col-md-10">

                                <select name="category_product_id" class="form-control {{ $errors->has('category_product_id') ? 'is-invalid' :'' }}">
                                        
                                                <option value="">--Select--</option>
                                                @forelse ($category_product as $item)
                                                    <option value="{{  $item->id  }}" >{{  $item->category_name  }}</option>
                                                @empty
                                                <option value="">-</option>
                                                @endforelse

                                </select>
                               
                                @error('category_product_id')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Detail</label>
                            <div class="col-md-10">
                                <div id="detail" name="detail" style="min-height:100px"></div>
                                <textarea name="detail" style="display:none" id="hiddenArea"></textarea>
                                @error('detail')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <br/>
                        <br/>
                        
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Date</label>
                            <div class="col-md-10">
                                
                                <input type="text" id="date_acara" name="date_acara" class="form-control date_acara2 {{ $errors->has('date_acara') ? 'is-invalid' :'' }}"  value="{{ old('date_acara') }}">
                                @error('date_acara')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Show</label>
                            <div class="col-md-10">
                                <!-- <input type="text"  name="category_name" class="form-control category_name" > -->
                                <select name="is_show" class="form-control is_show">
                                            <option value="">--Select--</option>
                                            
                                                <option value="0" >Hidden</option>
                                                <option value="1" >Show</option>
                                            

                                </select>
                                @error('is_show')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Price</label>
                            <div class="col-md-10">
                                <input type="number" id="price" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' :'' }}"  value="{{ old('price') }}">
                                @error('price')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Image</label>
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="/product/update" method="post" id="identifier2" enctype="multipart/form-data">
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
                    <input type="hidden"  name="id" class="id" >

                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-md-10">
                                <input type="text"  name="product_name" class="form-control product_name {{ $errors->has('product_name') ? 'is-invalid' :'' }}"  value="{{ old('product_name') }}">
                                @error('product_name')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category</label>
                            <div class="col-md-10">

                                <select name="category_product_id" class="form-control category_product_id {{ $errors->has('category_product_id') ? 'is-invalid' :'' }}">
                                        
                                                <option value="">--Select--</option>
                                                @forelse ($category_product as $item)
                                                    <option value="{{  $item->id  }}" >{{  $item->category_name  }}</option>
                                                @empty
                                                <option value="">-</option>
                                                @endforelse

                                </select>
                               
                                @error('category_product_id')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Detail</label>
                            <div class="col-md-10">
                                <div id="detail2" name="detail2" style="min-height:100px"></div>
                                <textarea name="detail" style="display:none" id="hiddenArea2"></textarea>
                                @error('detail')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Date</label>
                            <div class="col-md-10">
                                
                                <input type="text" id="date_acara" name="date_acara" data-date-format="yyyy-mm-dd" class="form-control date_acara {{ $errors->has('date_acara') ? 'is-invalid' :'' }}"  value="{{ old('date_acara') }}">
                                @error('date_acara')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Show</label>
                            <div class="col-md-10">
                                <!-- <input type="text"  name="category_name" class="form-control category_name" > -->
                                <select name="is_show" class="form-control is_show">
                                            <option value="">--Select--</option>
                                            
                                                <option value="0" >Hidden</option>
                                                <option value="1" >Show</option>
                                            

                                </select>
                                @error('is_show')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Price</label>
                            <div class="col-md-10">
                                <input type="number"  name="price" class="form-control price {{ $errors->has('price') ? 'is-invalid' :'' }}"  value="{{ old('price') }}">
                                @error('price')
                                <span class="help-block form-error" >{{$message}}</span>
                                @enderror
                                
                            </div> 
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-md-10">
                                
                                    <div class="image-upload">
                                        
                                        <img src=""  onerror="this.onerror=null;this.src='{{ asset('assets/images/background/blank.jpg') }}';"alt="" width="100" height="100" class="object-fit-cover radius-5 image2" id="img-tag2">
                                        
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
        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
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
     $('#menuProduct').addClass('active');
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
              url: "{!! route('product.indexData') !!}",
              type: 'GET',
              data: function (d) {
                // console.log(d);
            //   d.status_user = $('#status_user').val();
            //   d.banned_user = $('#banned_user').val();
            //   d.type_user = $('#type_user').val();

              }
             },
    order: [[0, 'desc']],
    columns:[
        {data:'id',name:'id'},
    {data:'product_name',name:'product_name'},
    {data:'category_product.category_name',name:'category_product.category_name'},

    {data:'is_show',name:'is_show'},
    {data: 'action',name:'action'},

    
    ],
    columnDefs: [
    
    {
        targets: 4,
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
            $('.date_acara2').datepicker({ format: 'yyyy-mm-dd' });
            $('.date_acara').datepicker({ 
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4'
                 });


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
                    url:"{!! route('product.edit') !!}",
                    success:function(data) {
                        console.log(data);
                        quill2.root.innerHTML = data['detail'];
                        $('.product_name').val(data['product_name']);
                        $('.category_product_id').val(data['category_product_id']);
                        $('.is_show').val(data['is_show']);
                        $('.price').val(data['price']);
                        $('.date_acara').val(data['date_acara']);


                        $('.id').val(data['id']);
                        $(".image2").attr("src", '{{ URL::asset('uploads/') }}'+'/products/' +data['image']);


                        
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


            $(document).on('click','.btn_del_act',function(){              
                var id_cat = $('.id_del').val();

                $.ajax({
                    type:'POST',
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "id": id_cat
                        
                        },
                    dataType: 'JSON',
                    url:"{!! route('product.delete') !!}",
                    success:function(data) {
                        console.log(data);

                        window.location.href = "{!! route('product.index') !!}";

                        
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

        var quill = new Quill('#detail', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            }
        });
        var quill2 = new Quill('#detail2', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            }
        });

        $("#identifier").on("submit",function(){
            var editor_content = quill.root.innerHTML
        $("#hiddenArea").val(editor_content);
        });
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
