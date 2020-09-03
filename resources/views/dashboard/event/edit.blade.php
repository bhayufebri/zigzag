@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item">EVENT</li>
<li class="breadcrumb-item active">DETAIL</li>

@endsection

@section('content')

            <h2 class="text-dark m-0 mb-3"> EDIT EVENT</h2>
            
            <nav class="nav-tabbar bg-white shadow-sm mb-3">
                <ul class="nav flex-row flex-nowrap nav-fill nav-tabs">
                    <li class="nav-item" id="basic"><a  href="#basic-tab" data-toggle="tab" class="nav-link py-4 border-right" id="basic_a" ><span class="badge badge-circle">1</span> BASIC</a></li>
                    <li class="nav-item" id="when"><a href="#when_tab" data-toggle="tab" class="nav-link py-4 border-right" id="when_a" disabled><span class="badge badge-circle">2</span> WHEN & WHERE</a></li>
                    <li class="nav-item" id="ticket"><a href="#ticket_tab" data-toggle="tab" class="nav-link py-4 border-right" id="ticket_a" disabled><span class="badge badge-circle">3</span> TICKETS</a></li>
                    <li class="nav-item" id="custom"><a href="#custom_tab" data-toggle="tab" class="nav-link py-4" id="custom_a" disabled><span class="badge badge-circle">4</span> CUSTOMIZE</a></li>
                </ul>
            </nav>
            <div class="tab-content">
                <div class="tab-pane active" id="basic-tab">
                
                    <div class="card border-0 bg-white shadow-sm">
                        <div class="card-body p-5">
                            <h3 class="mb-5">Tell The World About Your Event</h3>
                            <form action="{{ route('event.update_first', $data->id) }}" method="post" >
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                            <div class="form">
                                <div class="form-group ">
                                    <label for="" class="vendor_label">Vendor <span class="text-danger">*</span></label>
                                    <select name="vendor_id" id="vendor_id" class="form-control vendor_id" disabled>
                                                <option value="">--Select--</option>
                                                @forelse ($vendor as $item)
                                                    <option value="{{  $item->id  }}" {{  $item->id == $data->vendor_id ? 'selected' : '' }} >{{  $item->name  }} /{{ $item->id}}</option>
                                                @empty
                                                <option value="">-</option>
                                                @endforelse

                                    </select>
                                    <!-- <select name="name_schedule" id="name_schedulee" class="form-control name_schedule"></select> -->
                                </div>
                                <div class="form-group ">
                                    <label for="" class="name_label">What is your event name? <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control " value="{{$data->name}}">
                                    <span class="help-block form-error d-none name_class text-danger" >Required</span>
                                </div>
                                <div class="form-group">
                                    <label for="" class="detail_label">Describe your event? <span class="text-danger">*</span></label>
                                    <div id="detail" name="detail" style="min-height:200px"></div>
                                    <input name="detail_update" id="detail_update" type="hidden">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="mb-1 category_label">Select a category for your event <span class="text-danger">*</span></label>
                                            <small class="form-text text-muted mt-0 mb-3">
                                                This will help others find your event 
                                            </small>
                                            <select name="event_category_id" id="event_category_id" class="form-control event_category_id">
                                                <option value="">--Select--</option>
                                                @forelse ($event_category as $item)
                                                    <option value="{{  $item->id  }}" {{ $item->id == $data->event_category_id ? 'selected' : ''}} >{{  $item->name  }}</option>
                                                @empty
                                                <option value="">-</option>
                                                @endforelse

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="mb-1 who_see_label" >Select who can see your event <span class="text-danger">*</span></label>
                                            <small class="form-text text-muted mt-0 mb-3">
                                                Anyone can see and search for public events.{{$data->privacy}}
                                            </small>
                                            <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                                                <label class="{{$data->privacy == '0' ? 'btn btn-outline-secondary active' : 'btn btn-outline-secondary'}}" id="public" >
                                                <input type="radio" name="privacy" id="privacy_0" value="0" {{$data->privacy == '0' ? 'checked' : ''}}> Public
                                                </label>
                                                <label class=" {{$data->privacy == '1' ? 'btn btn-outline-secondary active' : 'btn btn-outline-secondary'}}" id="unlisted">
                                                <input type="radio" name="privacy" id="privacy_1" value="1" {{$data->privacy == 1 ? 'checked' : ''}}> Unlisted
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right text-md-right mt-5">
                                <button class="btn bg-warning text-white px-4 d-block d-md-inline-block" id="update_first" type="submit">Update</button>     
                                </div>    
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="text-center text-md-right mt-5">
                        <a  data-toggle="tab"   id="when_b" class="btn bg-accent text-white py-3 px-4 shadow-lg">Continue to When & Where <i class="fa fa-angle-right ml-3"></i></a>
                    </div>
                
                </div>
                <div role="tabpanel" class="tab-pane fade" id="when_tab">
                    <div class="card border-0 bg-white shadow-sm">
                        <div class="card-body p-5">
                            <h3 class="mb-5">Tell The World About Your Event</h3>
                            <form action="{{ route('event.update_first', $data->id) }}" method="post" >
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                            <div class="form">
                                <div class="form-date-container border-bottom mx-n5 px-5 mb-5">

                                 
                                @forelse ($data->event_time as $item)
                                    <div class="row row-event-date position-relative">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="" class="start_label">Start <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control "  id="start{{$loop->index}}" value="{{$item->event_date_start}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="" class="end_label">End <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  id="end{{$loop->index}}" value="{{$item->event_date_end}}" disabled>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="" class="end_label"></label>
                                                <div class="input-group">
                                                <a class="btn btn_edit_date " id="ed_da{{$item->id}}" data-toggle="modal" data-target="#editModal" type="button"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn_edit_date text-danger delete_sc" id="{{$item->id}}" href="{{ route('event.date_delete', [$item->id, $data->id]) }}"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div >-</div>
                                @endforelse
                                
                                <div class="date_list"></div>

                                    <div class="date-clone-container"></div>
                                    <div class="date-clone-container2"></div>
                                    <div class="text-right py-4">
                                        <div class="form-group">
                                            <button class="btn btn-outline-secondary font-weight-light" type="button" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add Another Time</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="address_label">Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{$data->address}}">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="" class="venue_label">Venue Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="venue" id="venue"  class="venue" value="{{$data->venue}}">
                                </div>
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
                                
                    


                            </div>
                            <div class="text-right text-md-right mt-5">
                                <button class="btn bg-warning text-white px-4 d-block d-md-inline-block" id="update_first" type="submit">Update</button>     
                                </div>    
                            </form>



                            <!-- Modal edit-->
                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Event Date</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('event.date_update') }}" method="post" >
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                    <div class="modal-body">
                                       
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Date Start</label>
                                            <div class="col-sm-8">
                                                <input name="date_start_modal" id="date_start_modal" type="text" class="form-control start">
                                                <input type="hidden" name="id_date" id="id_date">
                                                <input type="hidden" name="id_event" value="{{$data->id}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Date end</label>
                                            <div class="col-sm-8">
                                                <input name="date_end_modal" id="date_end_modal" type="text" class="form-control end">
                                            </div>
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

                                <!-- --modal edit end---- -->

                                <!-- Modal add -->
                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Event Date</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- <form action="{{ route('event.date_add', $data->id) }}" method="post" >
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }} -->
                                    <div class="modal-body">
                                       
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Date Start</label>
                                            <div class="col-sm-8">
                                                <input name="date_start_modal_add" id="date_start_modal_add" type="text" class="form-control start">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Date end</label>
                                            <div class="col-sm-8">
                                                <input name="date_end_modal_add" id="date_end_modal_add" type="text" class="form-control end">
                                                <input type="hidden" id="id_modal_add" name="id_modal_add" value="{{$data->id}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary add_date"  data-dismiss="modal">Save</button>
                                    </div>
                                    <!-- </form> -->
                                    </div>
                                </div>
                                </div>

                                <!-- --modal add end---- -->

                        </div>

                    </div>
                    <div class="text-center text-md-right mt-5">
                        <a  data-toggle="tab" id="ticket_b" class="btn bg-accent text-white py-3 px-4 shadow-lg">Continue to Tickets <i class="fa fa-angle-right ml-3"></i></a>
                    </div>
                    
                </div>
                <div role="tabpanel" class="tab-pane fade" id="ticket_tab">
                    <div class="card border-0 mb-4 bg-white shadow-sm">
                        <div class="card-body p-5">
                            <h3 class="mb-5">Ticket</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn btn-outline-success btn-block py-3 {{$data->is_paid == 0 ? 'd-none' : ''}}" data-toggle="modal" data-target="#addSchedule"><i class="fa fa-plus"></i> Paid Ticket</a>
                                </div>
                                <!-- <a href="#" class="btn btn-circle-light add_ticket_btn2"><i class="fa fa-plus"></i></a> -->
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-outline-success btn-block py-3 {{$data->is_paid == 1 ? 'd-none' : ''}}" data-toggle="modal" data-target="#addSchedule"><i class="fa fa-plus"></i> Free Ticket</a>
                                </div>
                            </div>
                            <span class="help-block form-error d-none schedule_class text-danger" >Select Schedule</span>
                        </div>
                    </div>
                    




                    @forelse ($data->event_schedule as $item)
                    <div class="card mb-4 border-0 bg-white shadow-sm form_schedule_paid validation">
                        <div class="d-flex flex-row py-4 px-5 border-bottom">
                            <h5 class="mb-0">Schedule</h5>
                            <a class="btn ml-auto mr-n4 btn-circle-light delete_sc" href="{{ route('event.schedule_delete', [$item->id, $data->id]) }}" type="button">&times;</a>
                        </div>
                        <div class="card-body p-5">
                        <form action="{{ route('event.schedule_update', $data->id) }}" method="post" >
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                            <div class="row">

                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Schedule Name{{$item->id}}/{{$data->id}}</label>
                                        <input type="hidden" name="id_schedule" value="{{$item->id}}">
                                        <div class="input-group">
                                            <input name="schedule_name" type="text" id="schedule_name{{$loop->index}}" class="form-control schedule_name" value="{{$item->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Start</label>
                                        <div class="input-group">
                                            <input type="text"  class="form-control start" name="start_schedule" value="{{$item->start_date}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">End</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control end" name="end_schedule" value="{{$item->end_date}}">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Action</label>
                                        <div class="input-group">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addTicket{{$loop->index}}" ><i class="fa fa-plus"></i> Add ticket</button>
                            
                            <!-- <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="" class="d-none d-md-block">&nbsp;</label>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    
                                                    <div class="input-group">
                                                        <select name="name_schedule" id="name_schedule{{$loop->index}}" class="form-control name_schedule">
                                                        @forelse ($event_class as $items)
                                                            <option value="{{$items->id}}">{{$items->name}}</option>
                                                        @empty
                                                            <option >-</option>
                                                        @endforelse

                                                        </select>
                                                         <div class="input-group-prepend">
                                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#exampleModal">Add </button>
                                                        </div>
                                                    </div>
                                                        
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Event Time</label>
                                                    
                                                    <select name="event_time" id="event_time{{$loop->index}}" class="form-control event_time">
                                                    @forelse ($data->event_time as $item3)
                                                    <option value="{{$item3->id}}">{{$item3->event_date_start}}/{{$item3->event_date_end}}</option>
                                                    @empty
                                                            <option >-</option>
                                                    @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Quantity</label>
                                                    <input type="text" id="quantity{{$loop->index}}" class="form-control quantity" onkeydown="isNumberKey(event)">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Price</label>
                                                    <input type="text" id="price{{$loop->index}}" class="form-control price" onkeydown="isNumberKey(event)">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="" >Ticket per order</label>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Min</label>
                                                    <input type="text" id="min{{$loop->index}}" class="form-control min" onkeydown="isNumberKey(event)">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="">Max</label>
                                                    <input type="text" id="max{{$loop->index}}" class="form-control max" onkeydown="isNumberKey(event)">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">action</label>
                                                    <a class="btn btn-circle-light add_ticket_btn" id="add_btn_det{{$loop->index}}"><i class="fa fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->



                            
                    
                                <!-- Modal add ticket -->
                                <div class="modal fade" id="addTicket{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Ticket</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('event.tikcket_add', $data->id) }}" method="post" >
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                        <input type="hidden" name="id_schedule" value="{{$item->id}}">
                                    <div class="modal-body">
                                       
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Name</label>
                                            <div class="col-sm-8">
                                            <div class="input-group">
                                                <select name="name_schedule" id="name_schedule" class="form-control name_schedule">
                                                @forelse ($event_class as $items)
                                                    <option value="{{$items->id}}">{{$items->name}}</option>
                                                @empty
                                                    <option >-</option>
                                                @endforelse

                                                </select>
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#addClass">Add </button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Event Time</label>
                                            <div class="col-sm-8">
                                                <select name="event_time" id="event_time" class="form-control event_time">
                                                @forelse ($data->event_time as $item3)
                                                <option value="{{$item3->id}}">{{$item3->event_date_start}}/{{$item3->event_date_end}}</option>
                                                @empty
                                                        <option >-</option>
                                                @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="quantity" class="form-control " name="quantity" onkeydown="isNumberKey(event)">  
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Price</label>
                                            <div class="col-sm-8">
                                            <input type="text" id="price" class="form-control " value="{{$data->is_paid == 0 ? '0' : ''}}" name="price" onkeydown="isNumberKey(event)" {{$data->is_paid == 0 ? 'disabled' : ''}}>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Minimal</label>
                                            <div class="col-sm-8">
                                            <input type="text" id="min" class="form-control " name="min" onkeydown="isNumberKey(event)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Maximal</label>
                                            <div class="col-sm-8">
                                            <input type="text" id="max" class="form-control" name="max" onkeydown="isNumberKey(event)">
                                            </div>
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

                                <!-- --modal add end---- -->



                            <table  id="userTable" class="table table-striped table-bordered table_parent" >
                                <thead>
                                    <tr>
                                        
                                        <th >Name</th>
                                        <th >Event Time</th>
                                        <th >Quantity</th>
                                        <th >Price</th> 
                                        <th >Min</th>
                                        <th >Max</th>
                                        
                                        <th ></th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="input_ticket">
                                @forelse ($item->ticket as $items)
                                <tr class="parent_table">
                                <td>{{$items->event_class ? $items->event_class->name : '-'}}</td>
                                
                                <td>{{$items->event_time ? $items->event_time->event_date_start : '-'}}/{{ $items->event_time ? $items->event_time->event_date_end : '-'}}</td>

                                <td>{{$items->total}}</td>
                                <td>{{$items->price}}</td>
                                
                                <td>{{$items->min_order}}</td>
                                <td>{{$items->max_order}}</td>
                                <td><a  class="btn btn-circle-light delete_detail " id="{{$items->id}}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @empty
                                    <div >-</div>
                                @endforelse

                                </tbody>
                            </table>

                        </div>
                    </div>
                    @empty
                        <div >-</div>
                    @endforelse








                                <!-- Modal add class -->
                                <div class="modal fade" id="addClass" tabindex="-1" role="dialog" aria-labelledby="addClassLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addClassLabel">Add Ticket</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- <form action="{{ route('event.tikcket_add', $data->id) }}" method="post" >
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }} -->
                                    <div class="modal-body">
                                       
                                       
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Name Class</label>
                                            <div class="col-sm-8">
                                                <input name="class_name" id="class_name" type="text" class="form-control class_name">
                                            <input name="id_vendor" value="{{$vendor[0]->user_id}}" id="id_vendor" type="hidden">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary submit_class"  data-dismiss="modal">Submit</button>
                                    </div>
                                    <!-- </form> -->
                                    </div>
                                </div>
                                </div>

                                <!-- --modal add class end---- -->


                                <!-- Modal add schedule -->
                                <div class="modal fade" id="addSchedule" tabindex="-1" role="dialog" aria-labelledby="addClassLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addClassLabel">Add Schedule</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('event.schedule_add', $data->id) }}" method="post" >
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                    <div class="modal-body">
                                       
                                       
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Schedule Name</label>
                                            <div class="col-sm-8">
                                                <input name="schedule_name" id="schedule_name" type="text" class="form-control">
                                            
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Date Start</label>
                                            <div class="col-sm-8">
                                                <input name="date_start" id="date_start" type="text" class="form-control start">
                                            
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-4 col-form-label">Date End</label>
                                            <div class="col-sm-8">
                                                <input name="date_end" id="date_end" type="text" class="form-control end">
                                            
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" >Submit</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>

                                <!-- --modal add schedule end---- -->





                    <div class="schedule_list"></div>
                    <!-- <input type="hidden" class="arr_all"> -->
            
                    
                    <div class="text-center text-md-right mt-5">
                        <a  data-toggle="tab" id="custom_b" class="btn bg-accent text-white py-3 px-4 shadow-lg">Continue to Customize <i class="fa fa-angle-right ml-3"></i></a>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="custom_tab">
                    <form action="{{ route('event.last_update', $data->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <!-- <input type="hidden" name="arr_all" class="arr_all">
                                <input type="hidden" name="name_event_form" class="name_event_form">
                                <input type="hidden" name="detail_event_form" class="detail_event_form">
                                <input type="hidden" name="category_event_form" class="category_event_form">
                                <input type="hidden" name="vendor_id_form" class="vendor_id_form">

                                
                                <input type="hidden" name="privacy_event_form" class="privacy_event_form">

                                <input type="hidden" name="start_form" class="start_form">
                                <input type="hidden" name="end_form" class="end_form">
                                <input type="hidden" name="venue_form" class="venue_form">
                                <input type="hidden" name="address_form" class="address_form">
                                <input type="hidden" name="lat_form" class="lat_form">
                                <input type="hidden" name="lng_form" class="lng_form">

                                <input type="hidden" name="schedule_name_form" class="schedule_name_form">
                                <input type="hidden" name="start_schedule_form" class="start_schedule_form">
                                <input type="hidden" name="end_schedule_form" class="end_schedule_form"> -->




                            <div class="card border-0 mb-4 bg-white shadow-sm">
                                <div class="card-body p-5">
                                    <h3 class="mb-5">Customize (optional)</h3>
                                    <div class="form border-bottom pb-4 mb-4 mx-n5 px-5">
                                        <div class="form-group">
                                            <label for="" class="mb-2">Contact Details</label>
                                            <div class="form-text text-muted mb-3 mt-0">
                                                <small>Your contact information is kept private and shown only to attendees who book a ticket</small>
                                            </div>
                                            <input type="text" class="form-control" name="email" value="{{$data->contact_detail}}" placeholder="Enter an email address or phone number">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="mb-2">Additional order message</label>
                                            <div class="form-text text-muted mb-3 mt-0">
                                                <small>This message will appear on the ticket confirmation email and on the ticket itself</small>
                                            </div>
                                            <textarea name="additional" id="additional" cols="30" rows="5" class="form-control" placeholder="Enter additional order message">{{$data->additional_order_message}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="mb-2">Publicated <div class="spinner-border spinner-border-sm d-none loading_status"></div></label>
                                            <div class="form-text text-muted mb-3 mt-0">
                                                <small>This message will appear on the ticket confirmation email and on the ticket itself</small>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox" id="status" name="status" {{$data->status == 1 ? 'checked' : ''}} >
                                                <span class="slider"></span>
                                                
                                            </label>
                                            
                                            <!-- <div class="spinner-grow spinner-grow-sm d-none loading_status"></div> -->
                                        </div>

                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <span class="card bg-light border-dashed h-100" style="background:#f5f5f5!important;">
                                                <div class="row">
                                                    <div class="col-md-auto">
                                                        <div class="image-upload">
                                                            
                                                            <img src="{{$file2}}"  onerror="this.onerror=null;this.src='{{ asset('assets/images/background/blank.jpg') }}';"alt="" width="100" height="100" class="object-fit-cover radius-5" id="profile-img-tag2">
                                                            
                                                            <span class="btn btn-secondary btn-sm" onclick="$(this).next().trigger('click')" ><i class="feather-camera"></i></span>
                                                            <input type="file" class="d-none" id="profile_img" name="profile_img">
                                                            
                                                        </div>
                                                    
                                                    </div>
                                                    <div class="card-body text-center d-flex align-items-center justify-content-center">
                                                        <div class="text p-3" style="color:#ccc;">
                                                            <i class="fa fa-arrow-circle-o-up fa-2x"></i>
                                                            <br/>
                                                            <small>Add social media photo<br/>min 100x100 px, max 2mb</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>

                                            
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <span href="#" class="card bg-light border-dashed h-100" style="background:#f5f5f5!important;" >
                                            <div class="row">
                                                    <div class="col-md-auto">
                                                        <div class="image-upload">
                                                            
                                                            <img src="{{$file}}"  onerror="this.onerror=null;this.src='{{ asset('assets/images/background/blank.jpg') }}';"alt="" width="100" height="100" class="object-fit-cover radius-5" id="profile-img-tag3">
                                                            
                                                            <span class="btn btn-secondary btn-sm" onclick="$(this).next().trigger('click')" ><i class="feather-camera"></i></span>
                                                            <input type="file" class="d-none" id="profile_img3" name="profile_img3">
                                                            
                                                        </div>
                                                    
                                                    </div>
                                                    <div class="card-body text-center d-flex align-items-center justify-content-center">
                                                        <div class="text p-3" style="color:#ccc;">
                                                            <i class="fa fa-arrow-circle-o-up fa-2x"></i>
                                                            <br/>
                                                            <small>Add event page cover image<br/>min 1110x444 px, max 5mb. Including any text on the photo</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="#" class="card bg-light border-dashed h-100" style="background:#f5f5f5!important;" data-toggle="modal" data-target="#modal-explorer">
                                                <div class="card-body text-center d-flex align-items-center justify-content-center">
                                                    <div class="text p-3" style="color:#ccc;">
                                                        <i class="fa fa-arrow-circle-o-up fa-2x"></i>
                                                        <br/>
                                                        <small>Add additional photos<br/>Upload additional photos to help attendees imaging coming to your event like promotional photo, venue photo, etc</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center text-md-right mt-5">
                                <button class="btn bg-warning text-white py-3 px-4 ml-3 mb-3 tbl_ok" type="submit">Update</button>
                                <a href="{{ route('event.index') }}" class="btn bg-accent text-white py-3 px-4 ml-3 mb-3">Back</a>
                                <!-- <a href="#" class="btn border-accent bg-white text-accent py-3 px-4 ml-3 mb-3" data-toggle="modal" data-target="#modal-schedule">Schedule</a>
                                <a href="#" class="btn border-accent bg-white text-accent py-3 px-4 ml-3 mb-3">Save as Draft</a> -->
                            </div>




                    <div class="modal fade" id="modal-schedule">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content p-5">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">Schedule event</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <p>
                                            Select a future time for your event to go live. Until then the event will remain in a draft state
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Date">
                                            <input type="text" class="form-control" placeholder="Time">
                                            <div class="input-group-append">
                                                <span class="input-group-text">EST</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade modal-explorer" id="modal-explorer">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="row row-explorer">
                                    <div class="col-md-4 mb-4 mb-lg-0">
                                        <nav>
                                            <ul class="nav flex-column">
                                                <li class="nav-item"><a href="#local-files" class="nav-link active" data-toggle="tab"><i class="fa fa-fw fa-file"></i> Local Files</a></li>
                                                <li class="nav-item"><a href="#camera" class="nav-link" data-toggle="tab"><i class="fa fa-fw fa-camera"></i> Camera</a></li>
                                                
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="tab-content h-100">
                                            <div class="tab-pane active h-100 p-5" id="local-files">
                                                <div class="d-flex align-items-center justify-content-center h-100" style="background-color: #cccccc;" id="profile-img-tag2">
                                                    <div class="text text-center">
                                                        <div class="h3 m-0 font-weight-light">drag & drop<br/>any files</div>
                                                        <div><small>or</small></div>
                                                        <!-- <img  onerror="this.onerror=null;this.src='{{ asset('assets/images/background/default-avatar.png') }}';"alt="" width="100" height="100" class="object-fit-cover radius-5" id="profile-img-tag"> -->
                                                        <!-- <input type="file" style="display:none" id="profile_img" name="profile_img"> -->
                                                        <button type="button" class="btn btn-primary" onclick="$(this).prev().trigger('click');">Choose local file</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane active h-100 p-5" id="camera">
                                                <div class="d-flex align-items-center justify-content-center h-100">
                                                    <div class="text text-center">
                                                        kkk
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

            

            
                   
            <!-- </form>{{ route('event.event_post_when_where') }} -->
@endsection
@section('customjs')

    <script>
    // $(document).ready( function () {
        var arr = []
        var class_arr = []
        var event_time_start_arr =[]
        var event_time_end_arr =[]

            $('#menuEvent').addClass('active');
            $('#basic').addClass('active');
            $('#basic_a').click(function(){
                // $('#when').remove('active')
                $('#when').removeClass('active').addClass('');
                $('#ticket').removeClass('active').addClass('');
                $('#custom').removeClass('active').addClass('');


                });
            $('#when_a').click(function(){
                $('#when').addClass('active');
                $('#ticket').removeClass('active').addClass('');
                $('#custom').removeClass('active').addClass('');

                });

                $('#when_b').click(function(){
                    var editor_content = quill.root.innerHTML
                    // console.log('ee', $('#event_category_id').val());
                    
                    
                    

                    
                // if($('#vendor_id').val() ==''){
                //     $('.vendor_label').addClass('text-danger');
                //     }else if($('#vendor_id').val() !=''){$('.vendor_label').removeClass('text-danger');}
                if($('#name').val() ==''){
                    $('.name_label').addClass('text-danger');
                    }else if($('#name').val() !=''){$('.name_label').removeClass('text-danger');}
                if(editor_content =='<p><br></p>'){
                    $('.detail_label').addClass('text-danger');
                    }else if(editor_content !='<p><br></p>'){$('.detail_label').removeClass('text-danger');}
                if($('#event_category_id').val() ==''){
                    $('.category_label').addClass('text-danger');
                    }else if($('#event_category_id').val() !=''){$('.category_label').removeClass('text-danger');}
                if($('input[name="privacy"]:checked').val() == undefined){
                    $('.who_see_label').addClass('text-danger');
                    }else if($('input[name="privacy"]:checked').val() != undefined){$('.who_see_label').removeClass('text-danger');}
                    
                if($('#name').val()!='' && 
                    // editor_content !='<p><br></p>' && 
                    // $('input[name="privacy"]:checked').val() != undefined &&
                    // $('#vendor_id').val() !='' &&
                    $('#event_category_id').val() !=''
                    ){
                    $("#when_a").attr('disabled',false);
                    $('#when_tab').removeClass('fade').addClass('active');
                    $('#basic-tab').removeClass('active').addClass('');

                    $('.name_label').removeClass('text-danger');
                    $('.detail_label').removeClass('text-danger');
                    $('.who_see_label').removeClass('text-danger');  

                    $('#when').addClass('active');
                    $('#ticket').removeClass('active').addClass('');
                    $('#custom').removeClass('active').addClass('');

                    // ---------------------ke form--------------------
                    $('.privacy_event_form').val($('input[name="privacy"]:checked').val());
                    $('.detail_event_form').val(editor_content);
                    $('.name_event_form').val($('#name').val());
                    $('.category_event_form').val($('#event_category_id').val());
                    $('.vendor_id_form').val($('#vendor_id').val());

                    
                    
                    }       
                });
                $('#ticket_a').click(function(){
                    $('#ticket').addClass('active')
                    $('#when').addClass('active')
                    $('#custom').removeClass('active').addClass('');

                    });
                $('#ticket_b').click(function(){

                    

                            var start_date = document.getElementsByClassName( 'start' ),
                                start_val  = [].map.call(start_date, function( input ) {
                                    return input.value;
                                }).join( '|' );

                            var end_date = document.getElementsByClassName( 'end' ),
                                end_val  = [].map.call(end_date, function( input ) {
                                    return input.value;
                                }).join( '|' );
                                
                            var a = start_val.split('|')
                            var b = end_val.split('|')
                            event_time_start_arr.push(a);
                            event_time_end_arr.push(b);

                            

                            // console.log('kami', a, b );

                            // if($('#address').val() ==''){
                            //     $('.address_label').addClass('text-danger');
                            //     }else if($('#address').val() !=''){$('.address_label').removeClass('text-danger');}
                            // if($('#venue').val() ==''){
                            //     $('.venue_label').addClass('text-danger');
                            //     }else if($('#venue').val() !=''){$('.venue_label').removeClass('text-danger');}
                            // if(a.includes("") == true){
                            //     $('.start_label').addClass('text-danger');
                            //     }else if(a.includes("") == false){$('.start_label').removeClass('text-danger');}
                            // if(b.includes("") == true){
                            //     $('.end_label').addClass('text-danger');
                            //     }else if(b.includes("") == false){$('.end_label').removeClass('text-danger');}
                            // if($('#address').val() == ""){
                            //     $('.address_label').addClass('text-danger');
                            //     }else if($('#address').val() != ""){$('.address_label').removeClass('text-danger');}

                            // if($('#address').val() !='' && $('#venue').val() !='' && a.includes("") != true && b.includes("") != true){
                                    $("#ticket_a").attr('disabled',false);
                                    $('#ticket_tab').removeClass('fade').addClass('active');
                                    $('#when_tab').removeClass('active').addClass('');
                                    $('#ticket').addClass('active');

                                    $('.address_label').removeClass('text-danger');
                                    $('.venue_label').removeClass('text-danger');

                                // ---------------------ke form--------------------
                                $('.start_form').val(JSON.stringify(a));
                                $('.end_form').val(JSON.stringify(b));
                                $('.venue_form').val($('#venue').val() );
                                $('.address_form').val($('#address').val());
                                $('.lat_form').val($('#lat').val());
                                $('.lng_form').val($('#lng').val());


                            // }
                            // $('#when').addClass('active')
                            // $('#custom').removeClass('active').addClass('');

                    });

            $('#custom_a').click(function(){
                $('#ticket').addClass('active')
                $('#when').addClass('active')
                $('#custom').addClass('active')
                });
            $('#custom_b').click(function(){

                        var schedule_name = document.getElementsByClassName( 'schedule_name' ),
                        schedule_name_val  = [].map.call(schedule_name, function( input ) {
                                return input.value;
                            }).join( '|' );
                        var start_schedule = document.getElementsByClassName( 'start_schedule' ),
                        start_schedule_val  = [].map.call(start_schedule, function( input ) {
                                return input.value;
                            }).join( '|' );
                        var end_schedule = document.getElementsByClassName( 'end_schedule' ),
                        end_schedule_val  = [].map.call(end_schedule, function( input ) {
                                return input.value;
                            }).join( '|' );
                            
                        var sc = schedule_name_val.split('|');
                        var stc = start_schedule_val.split('|');
                        var enc = end_schedule_val.split('|');
                        // console.log('panjang nya', arr);
                        var result_arr = [];
                        // console.log('panjang nya', sc.indexOf(NaN));

                        // if($('.form_schedule_paid').length == 0){
                        //     $('.schedule_class').removeClass('d-none').addClass('d-block');
                        // }else if($('.form_schedule_paid').length != 0){
                        //     $('.schedule_class').removeClass('d-block').addClass('d-none');
                        // }
                        // if(sc.includes("") == true || stc.includes("") == true || enc.includes("") == true){
                        //     // console.log('ikii');
                        //     for(i=0;i<sc.length;i++){
                        //         var newArray = arr.filter(function (el) {
                        //             return el.type_class == (i+1).toString();
                        //             });

                               
                        //         if(sc[i] == ""||stc[i] == ""||enc[i] == ""||newArray.length == 0){
                        //             // console.log('kk', i)
                                    
                        //             $('.validation'+(i+1)).removeClass('border-0').addClass('border-danger');
                        //         }else if(sc[i] != "" && stc[i] != "" && enc[i] != "" && newArray.length != 0){$('.validation'+(i+1)).removeClass('border-danger').addClass('border-0');}
                                
                        //         // console.log('panjang nya', arr);
                        //         // var newArray = arr.filter(function (el) {
                        //         //     return el.type_class == (i+1).toString();
                        //         //     });
                        //         //     console.log('hasil', newArray.length);


                        //         // for(ii=0; ii<arr.length; ii++){
                        //                 // console.log('dalam betul', arr[ii]['type_class']);
                        //             // if(arr[ii]['type_class'] == (i+1)){

                        //             // }
                        //         // }
                        //     }
                        // }
                        // else if(sc.includes("") == false){
                        //     $('.form_schedule_paid').removeClass('border-danger').addClass('border-0');
                        // }
                        for(i=0;i<sc.length;i++){
                                var newArray2 = arr.filter(function (el) {
                                    return el.type_class == (i+1).toString();
                                    });
                                result_arr.push(newArray2.length);

                        }

                                
                        // console.log('fa', result_arr.includes(0));
                        // console.log('fax', result_arr);

                        // if($('.form_schedule_paid').length != 0 &&
                        // sc.includes("") == false &&
                        // stc.includes("") == false &&
                        // enc.includes("") == false &&
                        // result_arr.includes(0) == false
                        // ){
                            $("#custom_a").attr('disabled',false);
                            $('#custom_tab').removeClass('fade').addClass('active');
                            $('#ticket_tab').removeClass('active').addClass('');
                            $('#custom').addClass('active');

                            // ---------------------ke form--------------------
                            $('.schedule_name_form').val(JSON.stringify(sc));
                                $('.start_schedule_form').val(JSON.stringify(stc));
                                $('.end_schedule_form').val(JSON.stringify(enc));

                            // $('.address_label').removeClass('text-danger');
                            // $('.venue_label').removeClass('text-danger');


                            // $('#ticket').addClass('active')
                            // $('#when').addClass('active')
                            // $('#custom').addClass('active')
                        // }

                
                });
        // });
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

<!-- -----------------------------------when--------------------------------- -->

<script>
     $('#menuEvent').addClass('active');
     $('#basic').addClass('active');
    //  $('#when').addClass('active');
    //  $("#when_a").attr('disabled',false);

    
     $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');
    </script>
    
     
    
    
    

    <script>
        $(document).ready( function () {
            // $('.date').datepicker();
            // $('.time').timepicker();
            $('.start').datetimepicker({
                dateFormat: "yy-mm-dd HH:ii:ss",
                // minDate:"2020/02/11"
            }).change(function(){
                // var date_st = $(this).datepicker('getDate');
                // console.log('asss', date_st);
            });;
            
            
            $('.end').datetimepicker({
                dateFormat: "yy-mm-dd HH:ii:ss"
                // minDate: $('.start').val()
            
            });

            $('.start_schedule').datetimepicker({dateFormat: "yy-mm-dd HH:ii:ss"});
            $('.end_schedule').datetimepicker({dateFormat: "yy-mm-dd HH:ii:ss"});

            var event_time = {!! json_encode($data->event_time) !!}
            console.log('et', event_time)

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


            // ----------add paid schedule--------------------
            
            $('.add_paid_schedule').on('click',function(){
                // console.log('as');

                console.log($('.form_schedule_paid').length);
                var id_form = ($('.form_schedule_paid').length + 1);
                // $('.form_schedule_paid').clone().removeClass('d-none').removeClass('form_schedule_paid').addClass('form_schedule_paid_clone').appendTo($('.schedule_list')).find('.add_ticket_btn').addClass('add_ticket_btn2')
                $('.schedule_list').append(

                
                '<div class="card mb-4 border-0 bg-white shadow-sm form_schedule_paid validation'+id_form+'">'+
                        '<div class="d-flex flex-row py-4 px-5 border-bottom">'+
                            '<h5 class="mb-0">Schedule</h5>'+
                            '<button class="btn ml-auto mr-n4 btn-circle-light btn_delete_schedule" type="button">&times;</button>'+
                        '</div>'+
                        '<div class="card-body p-5">'+
                            '<div class="row">'+
                               ' <div class="col">'+
                                    '<div class="form-group">'+
                                        '<input name="schedule_name" id="schedule_name" class="form-control schedule_name" placeholder="Schedule Name">'+
                                        // '<select name="schedule_name" id="schedule_name" class="form-control schedule_name"></select>'+
 
                                            
                                    '</div>'+
                                '</div>'+
                               
                            '</div>'+
                            '<div class="row">'+
                                '<div class="col-md-6">'+
                                    '<div class="form-group">'+
                                        '<label for="">Start</label>'+
                                        '<div class="input-group">'+
                                            '<input type="text" id="start_schedule" class="form-control start start_schedule">'+
                                            
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                    '<div class="form-group">'+
                                        '<label for="">End</label>'+
                                       ' <div class="input-group">'+
                                            '<input type="text" id="end_schedule" class="form-control end end_schedule">'+
                                            
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            
                            '<div class="row">'+
                                '<div class="col-md-9">'+
                                    '<div class="form-group">'+
                                        '<label for="" class="d-none d-md-block">&nbsp;</label>'+
                                        '<div class="row">'+
                                            '<div class="col-md-3">'+
                                                '<div class="form-group">'+
                                                    '<label for="">Name</label>'+
                                                    // '<input type="text" name="" id="name_schedule'+id_form+'" class="form-control name_schedule">'+
                                                    '<div class="input-group">'+
                                                        '<select name="name_schedule" id="name_schedule'+id_form+'" class="form-control name_schedule"></select>'+
                                                        ' <div class="input-group-prepend">'+
                                                            '<button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#exampleModal">Add </button>'+
                                                        '</div>'+
                                                    '</div>'+
                                                        
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-md-5">'+
                                                '<div class="form-group">'+
                                                    '<label for="">Event Time</label>'+
                                                    // '<input type="text" id="event_time'+id_form+'" class="form-control event_time">'+
                                                    '<select name="event_time" id="event_time'+id_form+'" class="form-control event_time"></select>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-md-2">'+
                                                '<div class="form-group">'+
                                                    '<label for="">Quantity</label>'+
                                                    '<input type="text" id="quantity'+id_form+'" class="form-control quantity" onkeydown="isNumberKey(event)">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-md-2">'+
                                                '<div class="form-group">'+
                                                    '<label for="">Price</label>'+
                                                    '<input type="text" id="price'+id_form+'" class="form-control price" onkeydown="isNumberKey(event)">'+
                                                '</div>'+
                                            '</div>'+
                                            
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-3">'+
                                    '<div class="form-group">'+
                                        '<label for="" >Ticket per order</label>'+
                                        '<div class="row">'+
                                            // '<div class="col-md-7">'+
                                            //     '<div class="form-group">'+
                                            //     '<label for="">Relese Ticket</label>'+
                                            //         '<select name="" id="relese" class="form-control">'+
                                            //             '<option value="">Immediately after purchase</option>'+
                                            //             '<option value="">1 days before event</option>'+
                                            //             '<option value="">2 days before event</option>'+
                                            //             '<option value="">3 days before event</option>'+
                                            //         '</select>'+
                                            //     '</div>'+
                                            // '</div>'+
                                            
                                            '<div class="col-md-5">'+
                                                '<div class="form-group">'+
                                                    '<label for="">Min</label>'+
                                                    '<input type="text" id="min'+id_form+'" class="form-control min" onkeydown="isNumberKey(event)">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-md-5">'+
                                                '<div class="form-group">'+
                                                    '<label for="">Max</label>'+
                                                    '<input type="text" id="max'+id_form+'" class="form-control max" onkeydown="isNumberKey(event)">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-md-2">'+
                                                '<div class="form-group">'+
                                                    '<label for="">action</label>'+
                                                    '<a class="btn btn-circle-light add_ticket_btn" id="add_btn_det'+id_form+'"><i class="fa fa-plus"></i></a>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<table  id="userTable" class="table table-striped table-bordered table_parent" >'+
                               ' <thead>'+
                                    '<tr>'+
                                        
                                        '<th >Name</th>'+
                                        '<th >Event Time</th>'+
                                        '<th >Quantity</th>'+
                                        '<th >Price</th>' +
                                        '<th >Min</th>'+
                                        '<th >Max</th>'+
                                        
                                        '<th ></th>'+
                                        
                                    '</tr>'+
                                '</thead>'+
                                '<tbody class="input_ticket'+id_form+'">'+
                                
                                    
                                '</tbody>'+
                            '</table>'+

                        '</div>'+
                    '</div>'+
                    // <!-- Modal -->
                            '<div class="modal fade exampleModal" id="exampleModal" >'+
                                '<div class="modal-dialog" role="document">'+
                                    '<div class="modal-content">'+
                                    '<div class="modal-header">'+
                                        '<h5 class="modal-title" id="exampleModalLabel">Add Class</h5>'+
                                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                        '<span aria-hidden="true">&times;</span>'+
                                        '</button>'+
                                    '</div>'+
                                    '<div class="modal-body">'+
                                        // '<form>'+
                                        '<div class="form-group">'+
                                            '<label for="recipient-name" class="col-form-label">Recipient:</label>'+
                                            '<input type="text" class="form-control class_name" id="class_name">'+
                                        '</div>'+
                                        // '</form>'+
                                    '</div>'+
                                    '<div class="modal-footer">'+
                                        '<button type="button" class="btn btn-secondary" >Close</button>'+
                                        '<button type="button" class="btn btn-primary submit_class" data-dismiss="modal">Submit</button>'+
                                    '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                    ).append(function(){
                        for(i=0; i<class_arr.length; i++){
                            $('#name_schedule'+id_form).append('<option value="'+ class_arr[i]['id'] +'|'+class_arr[i]['name']+'">'+  class_arr[i]['name'] +'</option>');
                       
                        };})
                        .append(function(){
                        for(i=0; i<event_time_start_arr[0].length; i++){
                            $('#event_time'+id_form).append('<option value="'+ event_time_start_arr[0][i] +'-'+event_time_end_arr[0][i]+'">'+  event_time_start_arr[0][i] +'-'+event_time_end_arr[0][i]+'</option>');
                       
                        };});
                    
            $('.start_schedule').datetimepicker({dateFormat: "yy-mm-dd HH:ii:ss"});
            $('.end_schedule').datetimepicker({dateFormat: "yy-mm-dd HH:ii:ss"});
            console.log('var a', event_time_start_arr);
                
            });
            $(document).on('click','.btn_delete_schedule',function(){
                $(this).parents('.form_schedule_paid').remove();
                
            });
            $(document).on('click','.delete_detail',function(){
                // var id_form = $('.form_schedule_paid').length;
                var i =($(this).attr('id'));
                // var i_arr = i.split("#");
                // $(this).parents('.parent_table').remove();
                
                // console.log('hapus', i_arr[0]);
                $.ajax({
                    type:'POST',
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "id_date": i,
                        // "id_ticket":i_arr[0],
                        // "id_event":i_arr[1]
                    },
                    dataType: 'JSON',
                    url:"{!! route('event.ticket_delete') !!}",
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data) {
                        // $(this).parents('.parent_table').remove();
                        $(this).parents('.parent_table').remove();
                        console.log(data);
                     
                    // setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
                    
                    }
                });
                $(this).parents('.parent_table').remove();

                
            });


            // -------------------------------------------free---------------------------
            $('.add_free_schedule').on('click',function(){
                // console.log('as');

                console.log($('.form_schedule_paid').length);
                var id_form = ($('.form_schedule_paid').length + 1);
                // $('.form_schedule_paid').clone().removeClass('d-none').removeClass('form_schedule_paid').addClass('form_schedule_paid_clone').appendTo($('.schedule_list')).find('.add_ticket_btn').addClass('add_ticket_btn2')
                $('.schedule_list').append(

                
                '<div class="card mb-4 border-0 bg-white shadow-sm form_schedule_paid">'+
                        '<div class="d-flex flex-row py-4 px-5 border-bottom">'+
                            '<h5 class="mb-0">Schedule Free</h5>'+
                            '<button class="btn ml-auto mr-n4 btn-circle-light btn_delete_schedule" type="button">&times;</button>'+
                        '</div>'+
                        '<div class="card-body p-5">'+
                            '<div class="row">'+
                               ' <div class="col">'+
                                    '<div class="form-group">'+
                                        '<input name="schedule_name" id="schedule_name" class="form-control schedule_name" placeholder="Schedule Name">'+
                                        // '<select name="schedule_name" id="schedule_name" class="form-control schedule_name"></select>'+
 
                                            
                                    '</div>'+
                                '</div>'+
                               
                            '</div>'+
                            '<div class="row">'+
                                '<div class="col-md-6">'+
                                    '<div class="form-group">'+
                                        '<label for="">Start</label>'+
                                        '<div class="input-group">'+
                                            '<input type="text" id="start_schedule" class="form-control start start_schedule">'+
                                            
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                    '<div class="form-group">'+
                                        '<label for="">End</label>'+
                                       ' <div class="input-group">'+
                                            '<input type="text" id="end_schedule" class="form-control end end_schedule">'+
                                            
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            
                            '<div class="row">'+
                                '<div class="col-md-9">'+
                                    '<div class="form-group">'+
                                        '<label for="" class="d-none d-md-block">&nbsp;</label>'+
                                        '<div class="row">'+
                                            '<div class="col-md-3">'+
                                                '<div class="form-group">'+
                                                    '<label for="">Name</label>'+
                                                    // '<input type="text" name="" id="name_schedule'+id_form+'" class="form-control name_schedule">'+
                                                    '<div class="input-group">'+
                                                        '<select name="name_schedule" id="name_schedule'+id_form+'" class="form-control name_schedule"></select>'+
                                                        ' <div class="input-group-prepend">'+
                                                            '<button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#exampleModal">Add </button>'+
                                                        '</div>'+
                                                    '</div>'+
                                                        
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-md-5">'+
                                                '<div class="form-group">'+
                                                    '<label for="">Event Time</label>'+
                                                    // '<input type="text" id="event_time'+id_form+'" class="form-control event_time">'+
                                                    '<select name="event_time" id="event_time'+id_form+'" class="form-control event_time"></select>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-md-2">'+
                                                '<div class="form-group">'+
                                                    '<label for="">Quantity</label>'+
                                                    '<input type="text" id="quantity'+id_form+'" class="form-control quantity" onkeydown="isNumberKey(event)">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-md-2">'+
                                                '<div class="form-group">'+
                                                    '<label for="">Price</label>'+
                                                    '<input type="text" value="0" id="price'+id_form+'" class="form-control price" onkeydown="isNumberKey(event)" disabled>'+
                                                '</div>'+
                                            '</div>'+
                                            
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-3">'+
                                    '<div class="form-group">'+
                                        '<label for="" >Ticket per order</label>'+
                                        '<div class="row">'+
                                            // '<div class="col-md-7">'+
                                            //     '<div class="form-group">'+
                                            //     '<label for="">Relese Ticket</label>'+
                                            //         '<select name="" id="relese" class="form-control">'+
                                            //             '<option value="">Immediately after purchase</option>'+
                                            //             '<option value="">1 days before event</option>'+
                                            //             '<option value="">2 days before event</option>'+
                                            //             '<option value="">3 days before event</option>'+
                                            //         '</select>'+
                                            //     '</div>'+
                                            // '</div>'+
                                            
                                            '<div class="col-md-5">'+
                                                '<div class="form-group">'+
                                                    '<label for="">Min</label>'+
                                                    '<input type="text" id="min'+id_form+'" class="form-control min" onkeydown="isNumberKey(event)">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-md-5">'+
                                                '<div class="form-group">'+
                                                    '<label for="">Max</label>'+
                                                    '<input type="text" id="max'+id_form+'" class="form-control max" onkeydown="isNumberKey(event)">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col-md-2">'+
                                                '<div class="form-group">'+
                                                    '<label for="">action</label>'+
                                                    '<a class="btn btn-circle-light add_ticket_btn" id="add_btn_det'+id_form+'"><i class="fa fa-plus"></i></a>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '<table  id="userTable" class="table table-striped table-bordered table_parent" >'+
                               ' <thead>'+
                                    '<tr>'+
                                        
                                        '<th >Name</th>'+
                                        '<th >Event Time</th>'+
                                        '<th >Quantity</th>'+
                                        '<th >Price</th>' +
                                        '<th >Min</th>'+
                                        '<th >Max</th>'+
                                        
                                        '<th ></th>'+
                                        
                                    '</tr>'+
                                '</thead>'+
                                '<tbody class="input_ticket'+id_form+'">'+
                                
                                    
                                '</tbody>'+
                            '</table>'+

                        '</div>'+
                    '</div>'+
                    // <!-- Modal -->
                            '<div class="modal fade exampleModal" id="exampleModal" >'+
                                '<div class="modal-dialog" role="document">'+
                                    '<div class="modal-content">'+
                                    '<div class="modal-header">'+
                                        '<h5 class="modal-title" id="exampleModalLabel">Add Class</h5>'+
                                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                        '<span aria-hidden="true">&times;</span>'+
                                        '</button>'+
                                    '</div>'+
                                    '<div class="modal-body">'+
                                        // '<form>'+
                                        '<div class="form-group">'+
                                            '<label for="recipient-name" class="col-form-label">Recipient:</label>'+
                                            '<input type="text" class="form-control class_name" id="class_name">'+
                                        '</div>'+
                                        // '</form>'+
                                    '</div>'+
                                    '<div class="modal-footer">'+
                                        '<button type="button" class="btn btn-secondary" >Close</button>'+
                                        '<button type="button" class="btn btn-primary submit_class" data-dismiss="modal">Submit</button>'+
                                    '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                    ).append(function(){
                        for(i=0; i<class_arr.length; i++){
                            $('#name_schedule'+id_form).append('<option value="'+ class_arr[i]['id'] +'|'+class_arr[i]['name']+'">'+  class_arr[i]['name'] +'</option>');
                       
                        };})
                        .append(function(){
                        for(i=0; i<event_time_start_arr[0].length; i++){
                            $('#event_time'+id_form).append('<option value="'+ event_time_start_arr[0][i] +'-'+event_time_end_arr[0][i]+'">'+  event_time_start_arr[0][i] +'-'+event_time_end_arr[0][i]+'</option>');
                       
                        };});
                    
            $('.start_schedule').datetimepicker({dateFormat: "yy-mm-dd HH:ii:ss"});
            $('.end_schedule').datetimepicker({dateFormat: "yy-mm-dd HH:ii:ss"});
            console.log('var a', event_time_start_arr);
                
            });
            
            
                
                $(document).on('click','.add_ticket_btn',function(){
                    var i =$(this).attr('id').slice(11);
                    var banyak = ($('.parent_table').length + 1);
                    var aa = $('#name_schedule'+i).val();

                    var aa_split = aa.split('|');
                    console.log('split', aa_split[0] );

                    $('.input_ticket'+i).append(
                    
                    '<tr class="parent_table">'+
                    '<td>'+aa_split[1]+'</td>'+
                    
                    '<td>'+$('#event_time'+i).val()+'</td>'+

                    '<td>'+$('#quantity'+i).val()+'</td>'+
                    '<td>'+$('#price'+i).val()+'</td>'+
                    
                    '<td>'+$('#min'+i).val()+'</td>'+
                    '<td>'+$('#max'+i).val()+'</td>'+
                    '<td><a href="#" class="btn btn-circle-light delete_detail" id="btn_delete_tic'+banyak+'"><i class="fa fa-times"></i></a></td>'+
                    '</tr>'
                );
                console.log('banyak', banyak );
                console.log('kamu2', i);
                     arr.push({
                         
                    
                        'type_class' : i,
                        'name_schedule' : aa_split[0],
                        
                        'event_time' :$('#event_time'+i).val(),

                    'quantity' :$('#quantity'+i).val(),
                    'price' :$('#price'+i).val(),
                    'min' :$('#min'+i).val(),
                    'max' :$('#max'+i).val()

                
                })
                console.log('asda', JSON.stringify(arr));
                $('.arr_all').val(JSON.stringify(arr));
                // var arr_all = arr;
                
                });
            // }
            // console.log('asda22222222222222222222222', arr);

// -----------------------------custom------------------------------
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                // $('#profile-img-tag').attr('src', e.target.result);
                $('#profile-img-tag2').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile_img").change(function(){
        readURL(this);
    });

function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                // $('#profile-img-tag').attr('src', e.target.result);
                $('#profile-img-tag3').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile_img3").change(function(){
        readURL2(this);
    });
            
            
            
        } );
    </script>

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIodrOUURx340AjXZCIBcILoBUjxz2nlQ&callback=initMap"></script> -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIodrOUURx340AjXZCIBcILoBUjxz2nlQ&libraries=places"></script>
    <script>
            

        </script>
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



            $(document).on('click','.submit_class', function(e) {
                e.preventDefault();
                var name = $(".class_name").val(); 
                console.log('data', name);
                // var last_name = $("#last_name").val();
                // var dataString = 'name='+name+'&last_name='+last_name;
                $.ajax({
                    type:'POST',
                    // data:name,
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "name": name,
                        "id_vendor": $('#vendor_id').val()
                        },
                    dataType: 'JSON',
                    url:"{!! route('event.class_store') !!}",
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data) {
                        console.log(data);
                        $('.name_schedule').append('<option value="'+ data['id'] +'">'+  data['name'] +'</option>');
                        class_arr.push({
                                'id' : data['id'],
                                'name' : data['name']
                            })
                    // alert(data);
                    }
                });
                });


                $(".vendor_id").on('change', function(e) {
                e.preventDefault();
                // console.log('data');
                var vendor = $('#vendor_id').val(); 
                // var last_name = $("#last_name").val();
                // var dataString = 'name='+name+'&last_name='+last_name;
                $.ajax({
                    type:'GET',
                    // data:name,
                    // data: {
                    //     "_token": "{!! csrf_token() !!}",
                    //     "data_saya": vendor
                    //     },
                    dataType: "json",
                    url:"/event/event_class/"+vendor,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data) {
                        // console.log(data[0]['id']);
                        for(i=0; i<data.length; i++){
                            // $('select[name="name_schedule"]').append('<option value="'+ data[i]['id'] +'">'+  data[i]['name'] +'</option>');
                            // console.log(data[i]['id'], data[i]['name'])
                            class_arr.push({
                                'id' : data[i]['id'],
                                'name' : data[i]['name']
                            }) 
                        }
                        
                    // alert(data);
                    }
                });
                });



                $('#status').on('change', function() {
                    var isChecked = $(this).is(':checked');
                    var selectedData;
                    var $switchLabel = $('.switch-label');
                    console.log('isChecked: ' + isChecked); 
                    $('.loading_status').removeClass('d-none');

                    $.ajax({
                    type:'PUT',
                    // data:name,
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "pub": isChecked ? 1 :0,
                        "id_event": {!! json_encode($data->id) !!}
                        },
                    dataType: 'JSON',
                    url:"{!! route('event.status_update') !!}",
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data) {
                        console.log(data);
                        // $('.name_schedule').append('<option value="'+ data['id'] +'|'+data['name']+'">'+  data['name'] +'</option>');
                        // class_arr.push({
                        //         'id' : data['id'],
                        //         'name' : data['name']
                        //     })
                    // alert(data);
                    setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
                    
                    }
                });



                    if(isChecked) {
                        selectedData = $switchLabel.attr('data-on');
                    } else {
                        selectedData = $switchLabel.attr('data-off');
                    }

                    console.log('Selected data: ' + selectedData);

                    // console.log('keluar coy');
                })




                $('#update_first').click(function(){
                    var editor_content = quill.root.innerHTML
                    console.log(editor_content);
                    $('#detail_update').val(editor_content);

                });

                $(document).on('click','.btn_edit_date',function(){
                // var id_form = $('.form_schedule_paid').length;
                console.log('waaaaa', $(this).attr('id').slice(5));
                var id_date = $(this).attr('id').slice(5);
                $.ajax({
                    type:'POST',
                    // data:name,
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "id_date": id_date
                        },
                    dataType: 'JSON',
                    url:"{!! route('event.date_edit') !!}",
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data) {
                        console.log(data);
                        $('#date_start_modal').val(data['event_date_start']);
                        $('#date_end_modal').val(data['event_date_end']);
                        $('#id_date').val(id_date);

                        
                        // $('.name_schedule').append('<option value="'+ data['id'] +'|'+data['name']+'">'+  data['name'] +'</option>');
                        // class_arr.push({
                        //         'id' : data['id'],
                        //         'name' : data['name']
                        //     })
                    // alert(data);
                    setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
                    
                    }
                });

                


                $(this).parents('.parent_table').remove();
                var i =($(this).attr('id').slice(4)-1);
                delete arr.splice(i, 1); 
                console.log('hapus', arr);
                
            });


            $(document).on('click','.add_date',function(){
                // var id_form = $('.form_schedule_paid').length;
                console.log('waaaaa');
                var start_date = $('#date_start_modal_add').val();
                var end_date = $('#date_end_modal_add').val();
                var id_add = $('#id_modal_add').val();

                

                // date_start_modal_add
                // date_end_modal_add
                $.ajax({
                    type:'POST',
                    // data:name,
                    data: {
                        "_token": "{!! csrf_token() !!}",
                        "start_date": start_date,
                        "end_date": end_date,
                        "id_add": id_add
                        },
                    dataType: 'JSON',
                    url:"{!! route('event.date_add_modal') !!}",
                    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data) {
                        console.log(data);
                        // $('#date_start_modal').val(data['event_date_start']);
                        // $('#date_end_modal').val(data['event_date_end']);
                        // $('#id_date').val(id_date);

                        
                        $('.date_list').append(
                            '<div class="row row-event-date position-relative">'+
                                        '<div class="col-md-5">'+
                                            '<div class="form-group">'+
                                                '<label for="" class="start_label">Start <span class="text-danger">*</span></label>'+
                                                '<div class="input-group">'+
                                                    '<input type="text" class="form-control "  id="start" value="'+start_date+'" disabled>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-5">'+
                                            '<div class="form-group">'+
                                                '<label for="" class="end_label">End <span class="text-danger">*</span></label>'+
                                               '<div class="input-group">'+
                                                    '<input type="text" class="form-control"  id="end" value="'+end_date+'" disabled>'+
                                                    
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                 
                                    '</div>'
                            );
                       
                    // alert(data);
                    // setTimeout(function(){ $('.loading_status').addClass('d-none'); }, 3000);
                    
                    }
                });

                


                
            });


            $(document).on("click", ".delete_sc", function(event) {
                event.preventDefault();
                document.getElementsByName("status").value = 0;
                var $href = $(this).attr("href");
                // var $form = $(this).closest('form');
                // var $el = $(this);
                swal({
                    title: "Are You Sure?",
                    text: "Delete this data.",
                    icon: "",
                    buttons: true,
                    dangerMode: true
                }).then(willDelete => {
                    if (willDelete) {
                        window.location.href = $href;
                    }
                });
            });
        </script>

@endsection