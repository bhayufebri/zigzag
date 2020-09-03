@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item">USER</li>
<li class="breadcrumb-item active">DETAIL</li>

@endsection

@section('content')

            <h2 class="text-dark m-0 mb-3"> EDIT ORDER</h2>
<form action="{{ route('order.update', $data[0]->id) }}" method="post" >
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
            <div class="card border-0">
            <div class="card-header bg-info">
                      <h4 class="text-white">Invoice #{{$data[0]->invoice_no ? $data[0]->invoice_no : $data[0]->invoice_number}}</h4>
            
            </div>
            
                <div class="card-body p-5">
                
                <div class="form-group row ">
                    <label class="col-form-label col-md-2">Name : </label>
                    <div class="col-md-10">
                        <input name="name" value="{{$data[0]->user->first_name}} {{$data[0]->user->last_name}}"  class="form-control" style="width:100%" readonly>
                            
                    </div>
                </div>   
                <div class="form-group row ">
                    <label class="col-form-label col-md-2">Total : </label>
                    <div class="col-md-10">
                        <input name="total" value="{{$data[0]->total}}"  class="form-control" style="width:100%" readonly>
                            
                    </div>
                </div>   
                <div class="form-group row ">
                    <label class="col-form-label col-md-2">Payment Method : </label>
                    <div class="col-md-10">
                        <input name="method" value="{{$data[0]->payment_method ? $data[0]->payment_method->name : '-'}}"  class="form-control" style="width:100%" readonly>
                            
                    </div>
                </div>
                <div class="form-group row ">
                                        <label class="col-form-label col-md-2">Event : {{$data[0]->invoice_no}}</label>
                                        <div class="col-md-10">
                                            <select name="status" id="event" class="form-control select2" style="width:100%">
                                                
                                                
                                                @forelse ($invoice as $items)
                                                                    <option value="{{$items->status}}" {{$items->status == $data[0]->status ? 'selected' : ''}} 
                                                                    {{$items->status == 'Waiting' || $items->status == 'Failed' || $items->status == 'Pending' ? 'disabled' : ''}}
                                                                    {{$data[0]->status == 'Waiting' && $items->status == 'Paid' ? 'disabled' : ''}}
                                                                    >{{$items->status}} 
                                                                    </option>
                                                                    @empty
                                                                    <option value="" >-</option>
                                                                    @endforelse
                                                
                                            </select>
                                        </div>
                        <input name="invoice_no" value="{{$data[0]->invoice_no}}" type="hidden">
                        <input name="id_invo" value="{{$data[0]->id}}" type="hidden">
                </div>
                       
                        

                        
                        
                    
                </div>
                
            </div>
            <br/>
            
            <a href="{{ route('order.index') }}" class="btn bg-secondary text-white px-4 d-block d-md-inline-block">Back</a>
            
            <button class="btn bg-warning text-white px-4 d-block d-md-inline-block" type="submit"> Update</button>
            
                    
                   
            </form>
@endsection
@section('customjs')
    <script>
     $('#menuOrder').addClass('active');
    
    //  $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');
    </script>
@endsection