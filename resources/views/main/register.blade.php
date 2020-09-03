
@extends('layouts.app3')

<!-- @section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item active">EVENT</li>


@endsection -->

@section('content')

		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Register</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Shop Login -->
		<!-- <section class="shop login section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-6 offset-lg-3 col-12">
						<div class="login-form">
							<h2>Register</h2>
							<p>Please register in order to checkout more quickly</p> -->
							<!-- Form -->
							<!-- <form class="form" method="post" action="#"> -->
                            <!-- <form class="form" method="POST" action="{{ route('main.mainregisterstore') }}">
                            {{ csrf_field() }}
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Your Name<span>*</span></label>
                                            <input type="text" name="name" placeholder="" required="required">
                                            @error('first_name')
                                <span class="help-block text-danger" >{{$message}}</span>
                                @enderror
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Your Email<span>*</span></label>
                                            <input type="text" name="email" placeholder="" required="required">
                                            @error('email')
											<span class="help-block text-danger" >{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>State / Divition<span>*</span></label>
											<input type="text" name="email" placeholder="" required="required">

										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Your Password<span>*</span></label>
                                            <input type="password" name="password" placeholder="" required="required">
                                            @error('password')
                                <span class="help-block text-danger" >{{$message}}</span>
                                @enderror
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Confirm Password<span>*</span></label>
                                            <input type="password" name="password_confirmation" placeholder="" required="required">
                                            
										</div>
									</div>
									<div class="col-12">
										<div class="form-group login-btn">
											<button class="btn" type="submit">Register</button>
											<a href="{{ route('main.mainlogin')}}" class="btn">Login</a>
										</div>
										<div class="checkbox">
											<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Sign Up for Newsletter</label>
										</div>
									</div>
								</div>
							</form> -->
							<!--/ End Form -->
						<!-- </div>
					</div>
				</div>
			</div>
		</section> -->
		<!--/ End Login -->








		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-12 col-12">
						<div class="checkout-form">
							<h2>Register disini</h2>
							<p>Please register in order to checkout more quickly</p>
							<!-- Form -->
							<!-- <form class="form" method="post" action="#"> -->
							<form class="form" method="POST" action="{{ route('main.mainregisterstore') }}">
                            {{ csrf_field() }}
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Nama dan Gelar yang ditampilkan di Sertifikat, Zoom atau medsos lain<span>*</span></label>
											<input type="text" name="first_name" placeholder="" value="{{ old('first_name') }}" required="required">
											@error('first_name')
											<span class="text-danger" >{{$message}}</span>
											@enderror
											<!-- <span class="text-danger" >cncnn</span> -->
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Alamat Email<span>*</span></label>
											<input type="email" name="email" placeholder="" value="{{ old('email') }}" required="required">
											@error('email')
											<span class="text-danger" >{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>No. Telephon<span>*</span></label>
											<input type="number" name="phone" placeholder="cnth : 0812345678" value="{{ old('phone') }}" required="required">
											@error('phone')
											<span class="text-danger" >{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>No. NIRA / Nomor Induk Mahasiswa <span>*</span></label>
											<input type="text" name="id_number" placeholder="" value="{{ old('id_number') }}" required="required">
											@error('id_number')
											<span class="text-danger" >{{$message}}</span>
											@enderror
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Provinsi DPW<span>*</span></label>
											<select name="state-province" id="state-province" class="state-province">
												<option value="" selected="selected">Select</option>
												
											</select>
											@error('state-province')
											<span class="text-danger" >{{$message}}</span>
											@enderror
										</div>
									</div>
									<!-- <div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Alamat<span>*</span></label>
											<input id="autocomplete"
             placeholder="Enter your address"
             onFocus="geolocate()"
             type="text"/>
										</div>
									</div> -->
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Institusi<span>*</span></label>
											<input type="text" name="institusi" placeholder="" value="{{ old('institusi') }}" required="required">
											@error('institusi')
											<span class="text-danger" >{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Password<span>*</span></label>
											<input type="password" name="password" placeholder="" required="required">
											@error('password')
											<span class="text-danger" >{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Konfirmasi Password<span>*</span></label>
											<input type="password" name="password_confirmation" placeholder="" required="required">
										</div>
									</div>
									
									<div class="col-lg-12 col-md-12 col-12">
										<div class="form-group login-btn">
											<button class="btn" type="submit">Register</button>
											<button><a href="{{ route('main.mainlogin')}}" class="btn">Login</a></button>
										</div>
										
									</div>
									
								</div>
							</form>
							<!--/ End Form -->
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<!--/ End Checkout -->
	@endsection
	@section('customjs')
	<script>

	$(document).ready(function() {
         $.getJSON('https://x.rajaapi.com/poe', function(data) {
			 if(data['success'] == true){

				$.ajax({
                        type:'get',
                        // data: {
                        //     "_token": "{!! csrf_token() !!}",
                        //     "transaction_id": $('#transaction_id').val(),
                        //     "buyer_phone": $('#buyer_phone').val(),
                        //     "token": $('#token').val()

                        //         },
                        dataType: 'JSON',
                        url:"https://x.rajaapi.com/MeP7c5ne" + data['token'] +"/m/wilayah/provinsi",
                     
                        success:function(datax) {
							for(i=0; i<datax['data'].length; i++){
								
                            console.log(datax['data'][i]['name']);
								$('.state-province').append('<option value="'+ datax['data'][i]['name']+'">'+datax['data'][i]['name']+'</option>');
								
							}
							$('.state-province').niceSelect('update');

                        }
              
                    });

			 }
			
            
            
            });
      });
	  </script>
	  

<script>


var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIodrOUURx340AjXZCIBcILoBUjxz2nlQ&libraries=places&callback=initAutocomplete"
        async defer></script>
	@endsection