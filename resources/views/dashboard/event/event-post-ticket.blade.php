@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item">EVENT</li>
<li class="breadcrumb-item active">DETAIL</li>

@endsection

@section('content')

            <h2 class="text-dark m-0 mb-3"> POST EVENT</h2>
            @include('layouts.header-event')
            
            <div class="card border-0 mb-4 bg-white shadow-sm">
                <div class="card-body p-5">
                    <h3 class="mb-5">Ticket</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-outline-success btn-block py-3"><i class="fa fa-plus"></i> Paid Ticket</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-outline-success btn-block py-3"><i class="fa fa-plus"></i> Free Ticket</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 border-0 bg-white shadow-sm">
                <div class="d-flex flex-row py-4 px-5 border-bottom">
                    <h5 class="mb-0">Schedule</h5>
                    <button class="btn ml-auto mr-n4 btn-circle-light" type="button">&times;</button>
                </div>
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="">Early Bird</option>
                                    <option value="">Presale</option>
                                    <option value="">Regular/ Normal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="form-group">
                                <button class="btn bg-accent text-white px-4" type="button">Add Ticket</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Start</label>
                                <div class="input-group">
                                    <input type="text" class="form-control date">
                                    <input type="text" class="form-control date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">End</label>
                                <div class="input-group">
                                    <input type="text" class="form-control date">
                                    <input type="text" class="form-control date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Festival</option>
                                    <option value="">Tribun</option>
                                    <option value="">VIP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Action</label><br/>
                                <a href="#" class="btn btn-circle-light"><i class="fa fa-copy"></i></a>
                                <a href="#" class="btn btn-circle-light"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="d-none d-md-block">&nbsp;</label>
                                <label for="">Relese Ticket</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Immediately after purchase</option>
                                    <option value="">1 days before event</option>
                                    <option value="">2 days before event</option>
                                    <option value="">3 days before event</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Ticket per order</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Min</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Max</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center text-md-right mt-5">
                <a href="{{ route('event.event_post_custom') }}" class="btn bg-accent text-white py-3 px-4 shadow-lg">Continue to Customize <i class="fa fa-angle-right ml-3"></i></a>
            </div>
@endsection
@section('customjs')
    <script>
     $('#menuEvent').addClass('active');
     $('#basic').addClass('active');
     $('#when').addClass('active');
     $("#when_a").attr('disabled',false);
     $('#ticket').addClass('active');
     $("#ticket_a").attr('disabled',false);

    
     $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');
    </script>
    
     <!-- DATEPICKER -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready( function () {
            $('.date').datepicker();
        } );
    </script>
@endsection