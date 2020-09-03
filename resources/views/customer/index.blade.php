
@extends('layouts.app5')

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
							<a href="{{ route('customer.order', $item->id) }}"  class="more-btn">Ikuti</a>

							<!-- <a>Rp. {{number_format($item->price, 0, ',', '.')}}sd</a> -->
							<a href="{{ route('customer.show_detail', $item->id) }}" class="more-btn">Continue Reading</a>
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
	@endsection
	@section('customjs')
    <script>
     $('#menuHome').addClass('active');    
    </script>
    @endsection