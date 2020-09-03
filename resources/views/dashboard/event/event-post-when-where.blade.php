@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item">EVENT</li>
<li class="breadcrumb-item active">DETAIL</li>

@endsection

@section('content')

            <h2 class="text-dark m-0 mb-3"> POST EVENT</h2>
            @include('layouts.header-event')
            <div class="card border-0 bg-white shadow-sm">
                <div class="card-body p-5">
                    <h3 class="mb-5">Tell The World About Your Event</h3>
                    <div class="form">
                        <div class="form-date-container border-bottom mx-n5 px-5 mb-5">
                            <div class="row row-event-date position-relative">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Start <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control start clone-start"  id="start" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">End <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control end"  id="end">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="date-clone-container"></div>
                            <div class="date-clone-container2"></div>
                            <div class="text-right py-4">
                                <div class="form-group">
                                    <button class="btn btn-outline-secondary btn-clone-date font-weight-light" type="button"><i class="fa fa-plus"></i> Add Another Time</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" id="address">
                        </div>
                        <div class="form-group">
                            <label for="">Venue Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="venue" id="venue">
                        </div>
                        <div class="map-container bg-light">
                            <div id="map" style="height:300px;"></div>
                            <!-- <img src="{{ asset('assets/images/background/marker.png') }}" alt="" class="marker" width="32" height="32"> -->
                            <input type="hidden" id='lat' >
                            <input type="hidden" id='lng' >
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center text-md-right mt-5">
                <a href="{{ route('event.event_post_ticket') }}"  onclick="return theFunction();" class="btn bg-accent text-white py-3 px-4 shadow-lg">Continue to Tickets <i class="fa fa-angle-right ml-3"></i></a>
            </div>
            <!-- "{{ route('event.event_post_ticket') }}" -->
@endsection
@section('customjs')
    <script>
     $('#menuEvent').addClass('active');
     $('#basic').addClass('active');
     $('#when').addClass('active');
     $("#when_a").attr('disabled',false);

    
     $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');
    </script>
    
     <!-- DATEPICKER -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.js"></script>
    
    
    

    <script>
        $(document).ready( function () {
            // $('.date').datepicker();
            // $('.time').timepicker();
            $('.start').datetimepicker({dateFormat: "yy-mm-dd HH:ii:ss"});
            $('.end').datetimepicker({dateFormat: "yy-mm-dd HH:ii:ss"});



            $('.btn-clone-date').on('click',function(){
                
                $('.row-event-date').clone()
                .removeClass('row-event-date')
                .appendTo($('.date-clone-container'))
                .append('<button class="btn btn-delete-row-date text-danger" type="button"><i class="fa fa-trash-o"></i></button>')
                .find('.btn-delete-row-date')
                
                .css({
                    'position':'absolute',
                    'top':'25px',
                    'right':'-20px'
                });
                // $('.date').datepicker('update');
                // $('.time').timepicker();
                $('.start').datetimepicker({dateFormat: "yy-mm-dd HH:ii:ss"});
                $('.end').datetimepicker({dateFormat: "yy-mm-dd HH:ii:ss"});

            });
            $(document).on('click','.btn-delete-row-date',function(){
                $(this).parent('.row').remove();
            });

            
        } );
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIodrOUURx340AjXZCIBcILoBUjxz2nlQ&callback=initMap"></script>
    <script>
            var latitude_cok=getCookie("latitude");
            var longitude_cok=getCookie("longitude");
            var def_lat = -7.801310424965196;
            var def_lng = 110.36476269325254;
            if(latitude_cok != ""){
                    $('#lat').val(latitude_cok);
                    def_lat = parseFloat($('#lat').val());
                }
            if(longitude_cok != ""){
                    $('#lng').val(longitude_cok);
                    def_lng = parseFloat($('#lng').val());}
            console.log(def_lat);
                            function initMap() {
                                    

                                    var beaches = [
                                        ['Main branch', def_lat,def_lng,"MOVE IT"]
                                    ];
                                    var map = new google.maps.Map(document.getElementById('map'), {
                                        zoom: 17,
                                        center: {lat: def_lat, lng: def_lng}
                                    });
                                    var infowindow = new google.maps.InfoWindow({ content: beaches[0][3] });
                                    for (var i = 0; i < beaches.length; i++) {
                                        var marker = new google.maps.Marker({
                                        position: {lat: beaches[i][1], lng: beaches[i][2]},
                                        map: map,
                                        title: beaches[i][0],
                                        animation: google.maps.Animation.DROP,
                                        indexI:i,
                                        draggable:true
                                        });
                                        // google.maps.event.addListener(marker, 'click', function(){
                                        //   infowindow.setContent(beaches[this.indexI][4]);
                                        //   infowindow.open(map, this);
                                        // });
                                        google.maps.event.addListener(marker, 'dragend', function (event) {
                                        // document.getElementById("lat").value = this.getPosition().lat();
                                        var latitude = this.getPosition().lat();
                                        var longitude = this.getPosition().lng();
                                        $('#lat').val(latitude);
                                        $('#lng').val(longitude);

                                        // console.log(this.getPosition().lat())
                                        // document.getElementById("lng").value = this.getPosition().lng();
                                        });
                                        if(i==0){infowindow.open(map, marker);}
                                    }
                                    }

                        (function() { initMap() })();
    
    
                    var address=getCookie("address");
                    var venue=getCookie("venue");
                    var start_date=getCookie("start_date");
                    var end_date=getCookie("end_date");
                    // var privacy=getCookie("privacy");


                    if(address != ""){
                        $('#address').val(address)
                    }
                    if(venue != ""){
                        $('#venue').val(venue)
                    }
                    if(start_date != ""){
                        var start_arr = start_date.split(',');
                        var end_arr = end_date.split(',');

                        var x = start_date.split(',').length;
                        var y = x-1;
                        for(i=0; i<x; i++){
                            if(i==0){
                                $('.start').val(start_arr[i]);
                                $('.end').val(end_arr[i]);
                                }
                            else if(i>0){
                            $('.date-clone-container2').append(
                                '<div class="row row-event-date'+i+' position-relative">'+
                                    '<div class="col-md-6">'+
                                        '<div class="form-group">'+
                                            '<label for="">Start <span class="text-danger">*</span></label>'+
                                            '<div class="input-group">'+
                                                '<input type="text" class="form-control start clone-start"  id="start" value="'+start_arr[i]+'" >'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-6">'+
                                        '<div class="form-group">'+
                                            '<label for="">End <span class="text-danger">*</span></label>'+
                                            '<div class="input-group">'+
                                                '<input type="text" class="form-control end" value="'+end_arr[i]+'"  id="end">'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>');
                                $('.row-event-date'+i).append('<button class="btn btn-delete-row-date text-danger" type="button" style="position: absolute; top: 25px; right: -20px;"><i class="fa fa-trash-o"></i></button>'); 
                            }
                        };
                    }
                    function theFunction () {

                            
                            var start_date = document.getElementsByClassName( 'start' ),
                            start_val  = [].map.call(start_date, function( input ) {
                                return input.value;
                            }).join( '|' );

                            var end_date = document.getElementsByClassName( 'end' ),
                            end_val  = [].map.call(end_date, function( input ) {
                                return input.value;
                            }).join( '|' );


                            // console.log(start_val.split('|'));
                            console.log('latitude', $('#lat').val());




                            var address_val = $('#address').val()
                            var venue_val = $('#venue').val()
                            var a = start_val.split('|')
                            var b = end_val.split('|')
                            var latitude_val = $('#lat').val();
                            var longitude_val = $('#lng').val();

                            // latitude

                            // var event_category_id_val = $('#event_category_id').val()
                            // var privacy_val = $('input[name="privacy"]:checked').val()


                            setCookie("address", address_val, 3);
                            setCookie("venue", venue_val, 3);
                            setCookie("start_date", a, 3);
                            setCookie("end_date", b, 3);
                            setCookie("latitude", latitude_val, 3);
                            setCookie("longitude", longitude_val, 3);



                            // $('#payment_method').val()
                            }

                            function setCookie(cname,cvalue,exdays) {
                                var d = new Date();
                                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                                var expires = "expires=" + d.toGMTString();
                                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                                }
                            function getCookie(cname) {
                                var name = cname + "=";
                                var decodedCookie = decodeURIComponent(document.cookie);
                                var ca = decodedCookie.split(';');
                                for(var i = 0; i < ca.length; i++) {
                                    var c = ca[i];
                                    while (c.charAt(0) == ' ') {
                                    c = c.substring(1);
                                    }
                                    if (c.indexOf(name) == 0) {
                                    return c.substring(name.length, c.length);
                                    }
                                }
                                return "";
                                }
        </script>
@endsection