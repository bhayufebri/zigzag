
@extends('layouts.app5')

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
                     
                        <a href="{{ route('customer.index') }}" class="btn bg-secondary text-white px-4 d-block d-md-inline-block ">Back</a>
                        
                        <a href="{{ route('customer.order', $data[0]->id) }}" class="btn bg-warning text-white px-4 d-block d-md-inline-block pull-right">Ikuti</a>
                    </div>
					
				</div>
			</div>
		</section>
		<!--/ End Blog Single -->
	
	@endsection
	@section('customjs')
    <script>
     $('#menuList').addClass('active');    
    </script>

<script
  src="https://app.sandbox.midtrans.com/snap/snap.js"
  data-client-key="SB-Mid-client-mqgoO4J9nlvnfRRc"
></script>
<script type="text/javascript">
  document.getElementById("pay-button").onclick = function () {
    // This is minimal request body as example.
    // Please refer to docs for all available options: https://snap-docs.midtrans.com/#json-parameter-request-body
    // TODO: you should change this gross_amount and order_id to your desire.


    $.ajax({
                        type:'POST',
                        data: {
                            "_token": "{!! csrf_token() !!}",
                            "order_id": $('#order_id').val()

                                },
                        dataType: 'JSON',
                        url:"{!! route('customer.pay') !!}",
                     
                        success:function(data) {
                            console.log(data[0]['total']);
                            var total = data[0]['total'];
                            var id = data[0]['id'];

                            var requestBody = {
      transaction_details: {
        gross_amount: total,
        // as example we use timestamp as order ID
        order_id: "T-" + id + '-' + Math.round(new Date().getTime() / 1000),
      },
    };

    getSnapToken(requestBody, function (response) {
      var response = JSON.parse(response);
      console.log("new token response", response);
      // Open SNAP payment popup, please refer to docs for all available options: https://snap-docs.midtrans.com/#snap-js
      snap.pay(response.token);
    });


                        }
                
                    });



    
    
  };
  /**
   * Send AJAX POST request to checkout.php, then call callback with the API response
   * @param {object} requestBody: request body to be sent to SNAP API
   * @param {function} callback: callback function to pass the response
   */
  function getSnapToken(requestBody, callback) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function () {
      if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        callback(xmlHttp.responseText);
      }
    };
    
    xmlHttp.open("post", "{!! asset('assets/snap/checkout.php') !!}");
	

    xmlHttp.send(JSON.stringify(requestBody));
  }
</script>
    @endsection