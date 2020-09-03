@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item">EVENT</li>
<li class="breadcrumb-item active">DETAIL</li>

@endsection

@section('content')

            <h2 class="text-dark m-0 mb-3"> DETAIL EVENT</h2>
            

            <div class="card border-0">
                <div class="card-body p-3">
                      
                       
                        <table  class="table table-striped table-bordered" >
                            
                            <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td>{{$data->name}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Describe</th>
                                <td><div id="detail" name="detail" style="min-height:200px"></div></td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Vendor</th>
                                <td><select name="vendor_id" id="vendor_id" class="form-control vendor_id" disabled>
                                                                <option value="">--Select--</option>
                                                                @forelse ($vendor as $item)
                                                                    <option value="{{  $item->id  }}" {{  $item->id == $data->vendor_id ? 'selected' : '' }} >{{  $item->name  }} /{{ $item->id}}</option>
                                                                @empty
                                                                <option value="">-</option>
                                                                @endforelse

                                                    </select></td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Category</th>
                                <td><select name="event_category_id" id="event_category_id" class="form-control event_category_id" disabled>
                                                                <option value="">--Select--</option>
                                                                @forelse ($event_category as $item)
                                                                    <option value="{{  $item->id  }}" {{ $item->id == $data->event_category_id ? 'selected' : ''}} >{{  $item->name  }}</option>
                                                                @empty
                                                                <option value="">-</option>
                                                                @endforelse

                                                            </select></td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Select who can see your event</th>
                                <td>
                                <!-- <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                                                                <label class="{{$data->privacy == '0' ? 'btn btn-outline-secondary active' : 'btn btn-outline-secondary'}}" id="public" readonly>
                                                                <input type="radio" name="privacy" id="privacy_0" value="0" {{$data->privacy == '0' ? 'checked' : ''}} readonly> Public
                                                                </label>
                                                                <label class=" {{$data->privacy == '1' ? 'btn btn-outline-secondary active' : 'btn btn-outline-secondary'}}" id="unlisted" readonly>
                                                                <input type="radio" name="privacy" id="privacy_1" value="1" {{$data->privacy == 1 ? 'checked' : ''}} readonly> Unlisted
                                                                </label>
                                                            </div> -->
                                                            
                                                            <!-- {{$data->privacy == '0' ? "<label class='btn btn-outline-secondary active' id='public'>Public </label>" : ''}} -->
                                                            <small class=" {{$data->privacy == '0' ? 'bg-warning': 'bg-secondary'}} text-white text-nowrap py-1 px-3 text-center radius-5 ">{{$data->privacy == '0' ? 'Public': 'Unlisted'}}</small>
                                                            </td>
                                
                            </tr>
                                
                            </tbody>
                        </table>

                        
                        
                    
                </div>
                
            </div>

            <br/>

            <div class="card border-0">
                <div class="card-body p-3">
                      
                       
                        <table  class="table table-striped table-bordered" >
                            
                            <tbody>
                            <tr>
                                <th scope="row">Venue</th>
                                <td>{{$data->venue}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Address</th>
                                <td>{{$data->address}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Map</th>
                                <td>
                                <div class="map-container bg-light">
                                    <div id="map" style="height:300px;"></div>
                                    <!-- <img src="{{ asset('assets/images/background/marker.png') }}" alt="" class="marker" width="32" height="32"> -->
                                    <div id="infowindow-content">
                                        <img src="" width="16" height="16" id="place-icon" />
                                        <span id="place-name" class="title"></span><br />
                                        <span id="place-address"></span>
                                    </div>
                                    <input type="hidden" id='lat' name="lat" >
                                    <input type="hidden" id='lng' name="lng">
                                </div>
                                </td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Event Time</th>
                                <td>@forelse ($data->event_time as $item)

                                {{$loop->index+1}}. {{$item ? $item->event_date_start : ''}}/{{ $item ? $item->event_date_end : ''}}<br/>
                                @empty
                                    -
                                @endforelse
                                </td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Schedule</th>
                                <td>@forelse ($data->event_schedule as $item)
                                <div class="card border-1 ">
                                <table>
                                <tbody>
                                <tr><th>Name</th><td>{{$item->name}}</td></tr>
                                <tr><th>Start Date - End Date</th><td>{{$item->start_date}} - {{$item->end_date}}</td></tr>
                                

                                </tbody>
                                </table>
                                <br/>
                                
                                <table class="table table-striped table-bordered table_parent" >
                                    <thead>
                                        <tr>
                                            
                                            <th >Name</th>
                                            <th >Event Time</th>
                                            <th >Quantity</th>
                                            <th >Price</th> 
                                            <th >Min</th>
                                            <th >Max</th>
                                            
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="input_ticket">
                                    @forelse ($item->ticket as $items)
                                    <tr class="parent_table">
                                    <td>{{ $items->event_class ? $items->event_class->name : ''}}</td>
                                    
                                    <td>{{$items->event_time ? $items->event_time->event_date_start : ''}}/{{ $items->event_time ? $items->event_time->event_date_end : ''}}</td>

                                    <td>{{$items->total}}</td>
                                    <td>{{$items->price}}</td>
                                    
                                    <td>{{$items->min_order}}</td>
                                    <td>{{$items->max_order}}</td>
                                    
                                    </tr>
                                    @empty
                                        <div >-</div>
                                    @endforelse

                                    </tbody>
                                </table>
                                </div>
                                <br/>
                                @empty
                                -
                                @endforelse
                                </td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Contact Detail</th>
                                <td>{{$data->contact_detail}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Additional Order Message</th>
                                <td>{{$data->additional_order_message}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Publicated</th>
                                <td>
                                <!-- <label class="switch">
                                                <input type="checkbox" id="status" name="status" {{$data->status == 1 ? 'checked' : ''}} >
                                                <span class="slider"></span>
                                                
                                            </label> <div>{{$data->status == 1 ? 'Publicated' : 'Not Publicated'}}</div> -->
                                            
                                            <small class=" {{$data->status == '1' ? 'bg-warning': 'bg-secondary'}} text-white text-nowrap py-1 px-3 text-center radius-5 ">{{$data->status == '1' ? 'Active': 'Disabled'}}</small>
                                            </td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Header</th>
                                <td><div class="image-upload">
                                                            
                                                            <img src="{{$file2}}"  onerror="this.onerror=null;this.src='{{ asset('assets/images/background/default-avatar.png') }}';"alt="" width="100" height="100" class="object-fit-cover radius-5" id="profile-img-tag2">
                                                            
                                                            
                                                            
                                                        </div></td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Poster</th>
                                <td>
                                <div class="image-upload">
                                                            
                                                            <img src="{{$file}}"  onerror="this.onerror=null;this.src='{{ asset('assets/images/background/blank.jpg') }}';"alt="" width="100" height="100" class="object-fit-cover radius-5" id="profile-img-tag3">
                                                            
                                                            
                                                            
                                                        </div></td>
                                
                            </tr>
                            
                                
                            </tbody>
                        </table>

                        
                        
                    
                </div>
                
            </div>
            <br/>
            
            <a href="{{ route('event.index') }}" class="btn bg-secondary text-white px-4 d-block d-md-inline-block">Back</a>
            
            <a class="btn bg-warning text-white px-4 d-block d-md-inline-block" href="{{ route('event.edit', $data->id) }}"> Edit</a>
            
                    
                   
            <!-- </form> -->
@endsection
@section('customjs')
    <script>
     $('#menuEvent').addClass('active');
    
     $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');
     
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
//         quill.setContents({
//     "ops":[
//         {"insert":{!! json_encode($data->detail) !!}}
//     ]
// });
// var html = document.querySelector("#detail").innerHTML
quill.root.innerHTML = {!! json_encode($data->detail) !!};
quill.enable(false);
        // var html = document.querySelector(".ql-editor").innerHTML
        // console.log('dlasas', quill.root.innerHTML)

        // quill.on('text-change', function(delta, oldDelta, source) {
        //     console.log(delta);
        //     if (source == 'api') {
        //         console.log("An API call triggered this change.");
        //     } else if (source == 'user') {
        //         console.log("A user action triggered this change.");
        //     }
        //     });
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIodrOUURx340AjXZCIBcILoBUjxz2nlQ&libraries=places"></script>
    
    <script>
            // var latitude_cok=getCookie("latitude");
            // var longitude_cok=getCookie("longitude");
            var def_lat = -7.801310424965196;
            var def_lng = 110.36476269325254;
            // -7.782108, 110.370384

var LatLng = {'lat':parseFloat({!! json_encode($data->latitude) !!}), 'lng': parseFloat({!! json_encode($data->longitude) !!})};
            $('#lat').val(parseFloat({!! json_encode($data->latitude) !!}));
          $('#lng').val(parseFloat({!! json_encode($data->longitude) !!}));
            var map = new google.maps.Map(document.getElementById("map"), {
          center: LatLng,
          zoom: 17
        });
            

            var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});
            autocomplete.bindTo("bounds", map);

            // Set the data fields to return when the user selects a place.
            autocomplete.setFields([
            "address_components",
            "geometry",
            "icon",
            "name"
            ]);
            var infowindow = new google.maps.InfoWindow();
            var infowindowContent = document.getElementById("infowindow-content");
            infowindow.setContent(infowindowContent);
            var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
            });



            // ----------add---------------------------------------
        //   console.log('asdadas', LatLng);
          marker.setPosition(LatLng);
          marker.setVisible(true);
        //   infowindowContent.children["place-icon"].src = place.icon;
          infowindowContent.children["place-name"].textContent = {!! json_encode($data->venue) !!};
        //   infowindowContent.children["place-address"].textContent = {!! json_encode($data->address) !!};
          infowindow.open(map, marker);
// ---------------------------add--------------------------------------


            autocomplete.addListener("place_changed", function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert(
              "No details available for input: '" + place.name + "'"
            );
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17); // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);
          console.log('place', place.geometry.location);

          var address = "";
          if (place.address_components) {
            address = [
              (place.address_components[0] &&
                place.address_components[0].short_name) ||
                "",
              (place.address_components[1] &&
                place.address_components[1].short_name) ||
                "",
              (place.address_components[2] &&
                place.address_components[2].short_name) ||
                ""
            ].join(" ");
          }
        //   console.log('lokasi', place.geometry.location.lat(), place.geometry.location.lng()); 
          $('#venue').val(place.name);
        //   $('.venue_form').val(place.name);


          $('#lat').val(place.geometry.location.lat());
          $('#lng').val(place.geometry.location.lng());



          infowindowContent.children["place-icon"].src = place.icon;
          infowindowContent.children["place-name"].textContent = place.name;
          infowindowContent.children["place-address"].textContent = address;
          infowindow.open(map, marker);
        });
        </script>
@endsection