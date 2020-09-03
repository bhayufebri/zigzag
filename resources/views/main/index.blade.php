
@extends('layouts.app3')

<!-- @section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item active">EVENT</li>


@endsection -->

@section('content')
<!-- Start Shop Blog  -->
<section class="shop-blog section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Seminar yang akan diselenggarakan</h2>
					</div>
				</div>
			</div>
			<div class="row">

			@forelse ($product as $item)
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Blog  -->
					<div class="shop-single-blog">
						<img src="{{ asset('uploads/products/'.$item->image.'') }}" alt="#">
						<div class="content">
							<p class="date">{{ date('d F Y', strtotime($item->date_acara)) }}</p>
							<a href="#" class="title">{{$item->product_name}}</a>
							

							<a class="more-btn">Rp. {{number_format($item->price, 0, ',', '.')}}</a>
							<a href="{{ route('main.show_detail', $item->id) }}" class="more-btn">Continue Reading</a>
						</div>
					</div>
					<!-- End Single Blog  -->
				</div>

			@empty
												
			@endforelse


				
			</div>
		</div>
	</section>
	<!-- End Shop Blog  -->
		
		
		
		<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
						</div>
						<div class="modal-body">
							<div class="row no-gutters">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<!-- Product Slider -->
										<div class="product-gallery">
											<div class="quickview-slider-active">
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
												<div class="single-slider">
													<img src="https://via.placeholder.com/569x528" alt="#">
												</div>
											</div>
										</div>
									<!-- End Product slider -->
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<div class="quickview-content">
										<h2>Flared Shift Dress</h2>
										<div class="quickview-ratting-review">
											<div class="quickview-ratting-wrap">
												<div class="quickview-ratting">
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<a href="#"> (1 customer review)</a>
											</div>
											<div class="quickview-stock">
												<span><i class="fa fa-check-circle-o"></i> in stock</span>
											</div>
										</div>
										<h3>$29.00</h3>
										<div class="quickview-peragraph">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
										</div>
										<div class="size">
											<div class="row">
												<div class="col-lg-6 col-12">
													<h5 class="title">Size</h5>
													<select>
														<option selected="selected">s</option>
														<option>m</option>
														<option>l</option>
														<option>xl</option>
													</select>
												</div>
												<div class="col-lg-6 col-12">
													<h5 class="title">Color</h5>
													<select>
														<option selected="selected">orange</option>
														<option>purple</option>
														<option>black</option>
														<option>pink</option>
													</select>
												</div>
											</div>
										</div>
										<div class="quantity">
											<!-- Input Order -->
											<div class="input-group">
												<div class="button minus">
													<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
														<i class="ti-minus"></i>
													</button>
												</div>
												<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
												<div class="button plus">
													<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
														<i class="ti-plus"></i>
													</button>
												</div>
											</div>
											<!--/ End Input Order -->
										</div>
										<div class="add-to-cart">
											<a href="#" class="btn">Add to cart</a>
											<a href="#" class="btn min"><i class="ti-heart"></i></a>
											<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
										</div>
										<div class="default-social">
											<h4 class="share-now">Share:</h4>
											<ul>
												<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
												<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
												<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal end -->
	@endsection
	@section('customjs')
    <script>

	$(document).on('click','.det',function(){
                console.log('waaaaa');
				// $('.container_grid').attr('class', 'd-none');

				$('.container_grid').html('');
                $('.det').removeClass('active').addClass('');


                var id_cat = $(this).attr('id').slice(4);
                $.ajax({
                    type:'POST',
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "category_id": id_cat
                        },
                    dataType: 'JSON',
                    url:"{!! route('main.contain_req') !!}",
                    success:function(data) {
                        console.log(data);
                        // quill2.root.innerHTML = data['detail'];
                        $('#idme'+data['id']).addClass( 'active');
                        // $('.stock').val(data['stock']);
                        // $('.product_id').val(data['product_id']);
                        // $('.id').val(id_cat);

                        // $('.price').val(data['price']);
						const format = num => 
    String(num).replace(/(?<!\..*)(\d)(?=(?:\d{3})+(?:\.|$))/g, '$1.');
                        // $('.id').val(data['id']);
                        // $(".image2").attr("src", '{{ URL::asset('uploads/') }}'+'/products/' +data['image']);

						for(i=0; i<data.length; i++){
                            // $('select[name="name_schedule"]').append('<option value="'+ data[i]['id'] +'">'+  data[i]['name'] +'</option>');
                            // console.log(data[i]['id'], data[i]['name'])
                            // class_arr.push({
                            //     'id' : data[i]['id'],
                            //     'name' : data[i]['name']

							$('.container_grid').append(


								'<div class="col-lg-4 col-md-6 col-12">'+
								'<div class="single-product">'+
									'<div class="product-img">'+
										'<a href="#">'+
											'<img class="default-img" src="uploads/products/'+data[i]['image']+'" alt="#">'+
											'<img class="hover-img" src="uploads/products/'+data[i]['image']+'" alt="#">'+
										'</a>'+
										'<div class="button-head">'+
											'<div class="product-action">'+
												'<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>'+
												'<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>'+
												'<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>'+
											'</div>'+
											'<div class="product-action-2">'+
												'<a title="Add to cart" href="#">Add to cart</a>'+
											'</div>'+
										'</div>'+
									'</div>'+
									'<div class="product-content">'+
										'<h3><a href="#">'+data[i]['product_name']+'</a></h3>'+
										'<div class="product-price">'+
											'<span>Rp. '+format(data[i]['price'])+'</span>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'


							);
                            }
						
                    }
                });
			});
			
			$(document).on('click','.btn_search',function(){
				console.log('waaaaai');
                console.log($('#category_filter').val());
				
				console.log($('#bottom_range').val());
				console.log($('#top_range').val());
				var category = $('#category_filter').val();
				var top_range = $('#top_range').val();
				var bottom_range = $('#bottom_range').val();
				

				// $('.container_grid').attr('class', 'd-none');

				$('.container_grid').html('');
                // $('.det').removeClass('active').addClass('');
				const format = num => 
    String(num).replace(/(?<!\..*)(\d)(?=(?:\d{3})+(?:\.|$))/g, '$1.');

                // var id_cat = $(this).attr('id').slice(4);
                $.ajax({
                    type:'POST',
                    data: {
                        "_token": "{!! csrf_token() !!}",
						"category_id": category,
						"top_range": top_range,
						"bottom_range": bottom_range
                        },
                    dataType: 'JSON',
                    url:"{!! route('main.filter_req') !!}",
                    success:function(data) {
                        console.log(data);
                        // quill2.root.innerHTML = data['detail'];
                        $('#idme'+data['id']).addClass( 'active');
                        // $('.stock').val(data['stock']);
                        // $('.product_id').val(data['product_id']);
                        // $('.id').val(id_cat);

                        // $('.price').val(data['price']);

                        // $('.id').val(data['id']);
                        // $(".image2").attr("src", '{{ URL::asset('uploads/') }}'+'/products/' +data['image']);

						for(i=0; i<data.length; i++){
                            // $('select[name="name_schedule"]').append('<option value="'+ data[i]['id'] +'">'+  data[i]['name'] +'</option>');
                            // console.log(data[i]['id'], data[i]['name'])
                            // class_arr.push({
                            //     'id' : data[i]['id'],
                            //     'name' : data[i]['name']

							$('.container_grid').append(


								'<div class="col-lg-4 col-md-6 col-12">'+
								'<div class="single-product">'+
									'<div class="product-img">'+
										'<a href="#">'+
											'<img class="default-img" src="uploads/products/'+data[i]['image']+'" alt="#">'+
											'<img class="hover-img" src="uploads/products/'+data[i]['image']+'" alt="#">'+
										'</a>'+
										'<div class="button-head">'+
											'<div class="product-action">'+
												'<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>'+
												'<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>'+
												'<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>'+
											'</div>'+
											'<div class="product-action-2">'+
												'<a title="Add to cart" href="#">Add to cart</a>'+
											'</div>'+
										'</div>'+
									'</div>'+
									'<div class="product-content">'+
										'<h3><a href="#">'+data[i]['product_name']+'</a></h3>'+
										'<div class="product-price">'+
											'<span>Rp. '+format(data[i]['price'])+'</span>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'


							);
                            }
						
                    }
                });
			});
			

			$(document).on('click','.like_link',function(){
                // console.log('waaaaa', $(this).attr('id').slice(4));
                var id_like = $(this).attr('id').slice(4);
                $.ajax({
                    type:'POST',
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "id": id_like
                        },
                    dataType: 'JSON',
                    url:"{!! route('main.like') !!}",
                    success:function(data) {
                        console.log(data);
                        // quill2.root.innerHTML = data['detail'];
                        // $('.detail_product_name').val(data['detail_product_name']);
                        // $('.stock').val(data['stock']);
                        // $('.product_id').val(data['product_id']);
                        // $('.id').val(id_cat);

                        // $('.price').val(data['price']);

                        // $('.id').val(data['id']);
                        // $(".image2").attr("src", '{{ URL::asset('uploads/') }}'+'/products/' +data['image']);


                        
                    setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
                    }
                });
            });
			</script>

			
@endsection