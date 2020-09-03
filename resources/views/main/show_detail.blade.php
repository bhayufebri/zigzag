@extends('layouts.app3')

<!-- @section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item active">EVENT</li>


@endsection -->

@section('content')
    
    
	
	<!-- Start Blog Single -->
    <section class="blog-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="blog-single-main">
							<div class="row">
								<div class="col-12">
									<div class="image">
										<img src="{{ asset('uploads/products/'.$data[0]->image.'') }}" alt="#">
									</div>
									<div class="blog-detail">
										<h2 class="blog-title">{{ $data[0]->product_name }}</h2>
										<div class="blog-meta">
											<span class="author"><a href="#"><i class="fa fa-user"></i>By Admin</a><a href="#"><i class="fa fa-calendar"></i>{{ date('d F Y', strtotime($data[0]->date_acara)) }}</a><a href="#"><i class="fa fa-comments"></i>Rp. {{ $data[0]->price}}</a></span>
										</div>
										<div class="content">
                                        {!! $data[0]->detail !!}
										</div>
									</div>
									
								</div>
																		
											
							</div>
						</div>
            <br/>
                     
                        <a href="{{ route('main.index') }}" class="btn bg-secondary text-white px-4 d-block d-md-inline-block ">Back</a>
                        
                        
                    </div>
					
				</div>
			</div>
		</section>
		<!--/ End Blog Single -->
	@endsection