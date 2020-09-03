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
                    <h3 class="mb-5">Customize (optional)</h3>
                    <div class="form border-bottom pb-4 mb-4 mx-n5 px-5">
                        <div class="form-group">
                            <label for="" class="mb-2">Contact Details</label>
                            <div class="form-text text-muted mb-3 mt-0">
                                <small>Your contact information is kept private and shown only to attendees who book a ticket</small>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter an email address or phone number">
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2">Additional order message</label>
                            <div class="form-text text-muted mb-3 mt-0">
                                <small>This message will appear on the ticket confirmation email and on the ticket itself</small>
                            </div>
                            <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Enter additional order message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <a href="#" class="card bg-light border-dashed h-100" style="background:#f5f5f5!important;" data-toggle="modal" data-target="#modal-explorer">
                                <div class="card-body text-center d-flex align-items-center justify-content-center">
                                    <div class="text p-3" style="color:#ccc;">
                                        <i class="fa fa-arrow-circle-o-up fa-2x"></i>
                                        <br/>
                                        <small>Add social media photo<br/>min 100x100 px, max 2mb</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-8 mb-4">
                            <a href="#" class="card bg-light border-dashed h-100" style="background:#f5f5f5!important;" data-toggle="modal" data-target="#modal-explorer">
                                <div class="card-body text-center d-flex align-items-center justify-content-center">
                                    <div class="text p-3" style="color:#ccc;">
                                        <i class="fa fa-arrow-circle-o-up fa-2x"></i>
                                        <br/>
                                        <small>Add event page cover image<br/>min 1110x444 px, max 5mb. Including any text on the photo</small>
                                    </div>
                                </div>
                            </a>
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
                <a href="#" class="btn bg-accent text-white py-3 px-4 ml-3 mb-3">Publish Now</a>
                <a href="#" class="btn border-accent bg-white text-accent py-3 px-4 ml-3 mb-3" data-toggle="modal" data-target="#modal-schedule">Schedule</a>
                <a href="#" class="btn border-accent bg-white text-accent py-3 px-4 ml-3 mb-3">Save as Draft</a>
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
                                <li class="nav-item"><a href="#camera" class="nav-link" data-toggle="tab"><i class="fa fa-fw fa-link"></i> Direct Link</a></li>
                                <li class="nav-item"><a href="#camera" class="nav-link" data-toggle="tab"><i class="fa fa-fw fa-facebook"></i> Facebook</a></li>
                                <li class="nav-item"><a href="#camera" class="nav-link" data-toggle="tab">
                                    <svg style="width:14px;height:14px;margin-right:2px" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-drive" class="svg-inline--fa fa-google-drive fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M339 314.9L175.4 32h161.2l163.6 282.9H339zm-137.5 23.6L120.9 480h310.5L512 338.5H201.5zM154.1 67.4L0 338.5 80.6 480 237 208.8 154.1 67.4z"></path></svg>
                                Google Drive</a></li>
                                <li class="nav-item"><a href="#camera" class="nav-link" data-toggle="tab"><i class="fa fa-fw fa-dropbox"></i> Dropbox</a></li>
                                <li class="nav-item"><a href="#camera" class="nav-link" data-toggle="tab"><i class="fa fa-fw fa-instagram"></i> Instagram</a></li>
                                <li class="nav-item"><a href="#camera" class="nav-link" data-toggle="tab"><i class="fa fa-fw fa-flickr"></i> Flickr</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content h-100">
                            <div class="tab-pane active h-100 p-5" id="local-files">
                                <div class="d-flex align-items-center justify-content-center h-100">
                                    <div class="text text-center">
                                        <div class="h3 m-0 font-weight-light">drag & drop<br/>any files</div>
                                        <div><small>or</small></div>
                                        <input type="file" style="display:none">
                                        <button type="button" class="btn btn-primary" onclick="$(this).prev().trigger('click');">Choose local file</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
     $('#custom').addClass('active');
     $("#custom_a").attr('disabled',false);

    
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

    </script>
@endsection