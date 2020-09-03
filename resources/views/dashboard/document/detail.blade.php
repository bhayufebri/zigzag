@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item">LEGAL DOCUMENT</li>
<li class="breadcrumb-item active">DETAIL</li>

@endsection

@section('content')

<h2 class="text-dark m-0 mb-3"> DETAIL LEGAL DOCUMENT</h2>
<div class="clearfix">
    @include('flash::message')
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif  
</div>
<div class="card border-0">
    <div class="card-body p-5">
       <div class="row"> 
        <div class="col-md-12 mb-4">
                <h2>Vendor Name: {{$legal->vendor->name_cp}}</h2>
        </div>
        </div>
       <div class="row">
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <img src="{{ $get_image_ktp }}" alt="" width="370" class="object-fit-cover radius-5 d-flex align-items-center" id="ktp-img-tag">
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label">ID Number (KTP)<span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext " value="{{$legal->ktp_number}}" readonly>
                    </div> 
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label" >Fullname (KTP)<span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" name="ktp_name" value="{{ $legal->ktp_name }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label" >Address (KTP)<span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" name="ktp_address" value="{{ $legal->ktp_address }}" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <img src="{{ $get_image_npwp }}" alt="" width="370" class="object-fit-cover radius-5 d-flex align-items-center" id="npwp-img-tag">
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label" >ID Number NPWP<span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" name="npwp_number" value="{{ $legal->npwp_number }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label" >Fullname (NPWP)<span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" name="npwp_name" value="{{ $legal->npwp_name }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label" >Address (NPWP)<span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control-plaintext" name="npwp_address" value="{{ $legal->npwp_address }}" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-12">
                @if ($legal->status == 0)
                    <form  name=form1 role="form" action="{{ route('document.setVerified',$legal->id) }}" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <button type="submit" class="btn bg-warning text-dark py-3 px-5" style="display:block;" id='myBtn'>
                            SET VERIFY
                        </button>
                    </form>
                @else
                <span class="btn bg-accent text-white py-3 px-5" style="display:block;"><b>DOCUMENT HAS VERIFIED</b></span>
                @endif
            </div>
        </div>
    </div>             
</div>
<br/>
<a href="{{ route('document.index') }}" class="btn bg-secondary text-white px-4 d-block d-md-inline-block">Back</a>
@endsection
@section('customjs')
<script>
 $('#menuLegal').addClass('active');
</script>
@endsection