@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item">USER</li>
<li class="breadcrumb-item active">EDIT</li>

@endsection

@section('content')

            <h2 class="text-dark m-0 mb-3"> USER EDIT</h2>

            <div class="card border-0">
                <div class="card-body p-5">
                        <form action="{{ route('user.update', $data->id) }}" method="post" >
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                        <div class="form-group row border-bottom border-light">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control-plaintext text-lg-right" value="{{$data->first_name}}" readonly>
                            </div> 
                        </div>
                        <div class="form-group row border-bottom border-light">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control-plaintext text-lg-right" value="{{$data->email}}" readonly>
                            </div> 
                        </div>
                        <div class="form-group row border-bottom border-light">
                            <label class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control-plaintext text-lg-right" value="{{$data->user_detail->phone}}" readonly>
                            </div> 
                        </div>
                        <div class="form-group row border-bottom border-light">
                            <label class="col-sm-2 col-form-label">ID Card</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control-plaintext text-lg-right" value="{{$data->user_detail->id_card}}" readonly>
                            </div> 
                        </div>
                        <div class="form-group row border-bottom border-light">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-md-10">
                                <input type="text" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' :'' }}" value="" >
                                @error('password')
                                    <span class="text-danger form-error" >{{$message}}</span>
                                @enderror 
                            </div>
                            
                        </div>
                       
                        

                        
                        
                    
                </div>
                
            </div>
            <br/>
            
            <a href="{{ route('user.index') }}" class="btn bg-secondary text-white px-4 d-block d-md-inline-block">Back</a>
            
            <button class="btn bg-accent text-white px-4 d-block d-md-inline-block" type="submit">Submit</button>
            
                    
                   
            </form>
@endsection
@section('customjs')
    <script>
     $('#menuUser').addClass('active');
    
     $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');
    </script>
@endsection