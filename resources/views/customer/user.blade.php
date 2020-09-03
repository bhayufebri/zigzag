
@extends('layouts.app5')

<!-- @section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item active">EVENT</li>


@endsection -->

@section('content')












		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-12 col-12">
						<div class="checkout-form">
							<h2>Update Profil</h2>
							<p>Update Profil anda sesuai data yang sebenarnya</p>
							<!-- Form -->
							<!-- <form class="form" method="post" action="#"> -->
							<form class="form" method="POST" action="{{ route('customer.update_user') }}">
                            {{ csrf_field() }}
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Nama dan Gelar yang ditampilkan di Sertifikat, Zoom atau medsos lain<span>*</span></label>
											<input type="text" name="first_name" placeholder="" class="name_input" value="{{  old('first_name') ? old('first_name') : $data->first_name }}" required="required" disabled>
											@error('first_name')
											<span class="text-danger" >{{$message}}</span>
											@enderror
											<!-- <span class="text-danger" >cncnn</span> -->
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Alamat Email<span>*</span></label>
											<input type="email" name="email" placeholder="" value="{{ old('email') ? old('email') : $data->email }}" disabled>
											@error('email')
											<span class="text-danger" >{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>No. Telephon<span>*</span></label>
											<input type="number" name="phone" placeholder="cnth : 0812345678" class="phone_input" value="{{ old('phone') ? old('phone') : ($data->user_detail ? $data->user_detail->phone : '') }}" required="required" disabled>
											@error('phone')
											<span class="text-danger" >{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>No. NIRA / Nomor Induk Mahasiswa <span>*</span></label>
											<input type="text" name="id_number" placeholder="" class="id_input" value="{{ old('id_number') ?  old('id_number') : ($data->user_detail ? $data->user_detail->id_card : '') }}" required="required" disabled> 
											@error('id_number')
											<span class="text-danger" >{{$message}}</span>
											@enderror
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Provinsi DPW<span>*</span></label>
											<select name="state-province" id="state-province" class="state-province dpw_input" disabled>
												<option value="" selected="selected">Pilih</option>
												
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
											<input type="text" name="institusi" placeholder="" class="institusi_input" value="{{ old('institusi') ? old('institusi') : $data->persist_code }}" required="required" disabled>
											@error('institusi')
											<span class="text-danger" >{{$message}}</span>
											@enderror
										</div>
									</div>
								
									<div class="col-lg-12 col-md-12 col-12">
										<div class="form-group login-btn">
											<button class="btn bg-warning invisible simpan_btn" type="submit">Simpan</button>
                                            <a class="btn bg-warning text-white px-4 d-block d-md-inline-block btn_edit"> Edit</a>
											
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
     $('#menuUser').addClass('active');  


   
    </script>

<script>

	$(document).ready(function() {
         $.getJSON('https://x.rajaapi.com/poe', function(data) {
			 if(data['success'] == true){
            

            // var jobs = JSON.parse("{{ $data->last_name}}");
            var provinsi = {!! json_encode($data->last_name) !!};


            // console.log('sdfsds',provinsi);


				$.ajax({
                        type:'get',
                        dataType: 'JSON',
                        url:"https://x.rajaapi.com/MeP7c5ne" + data['token'] +"/m/wilayah/provinsi",
                     
                        success:function(datax) {
							for(i=0; i<datax['data'].length; i++){
								
                            // console.log(datax['data'][i]['name']);

                            
								$('.state-province').append('<option value="'+ datax['data'][i]['name']+'">'+datax['data'][i]['name']+'</option>');
								
							}
                            $('.state-province').val(provinsi);
							$('.state-province').niceSelect('update');

                        }
              
                    });

			 }
			
            
            
            });
      });

      $(document).on('click','.btn_edit',function(){
                console.log('waaaaa');
                $('.name_input').removeAttr('disabled');
                $('.phone_input').removeAttr('disabled');

                $('.dpw_input').removeAttr('disabled');

                $('.institusi_input').removeAttr('disabled');
                $('.id_input').removeAttr('disabled');
                $('.btn_edit').addClass('invisible');
                $('.simpan_btn').removeClass('invisible');
                $('.state-province').prop('disabled', false).niceSelect('update');

                

                // var id_cat = $(this).attr('id').slice(5);
                // $('.id_kir').val(id_cat);
            });
	  </script>
    @endsection