@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item">USER</li>
<li class="breadcrumb-item active">DETAIL</li>

@endsection

@section('content')

            <h2 class="text-dark m-0 mb-3"> DETAIL ORDER</h2>

            <div class="card border-0">
                <div class="card-body p-5">
                        
                        <table  class="table table-striped table-bordered" >
                            
                            <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td>{{$data[0]->user->first_name}} {{$data[0]->user->last_name}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{$data[0]->user->email}}</td>
                                
                            </tr>
                           
                                
                            </tbody>
                        </table>
                <br/>
                        <table  class="table table-striped table-bordered" >
                            
                            <tbody>
                            <tr>
                                <th scope="row">Date</th>
                                <td>{{$data[0]->created_at}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Invoice</th>
                                <td>{{$data[0]->invoice_no ? $data[0]->invoice_no : $data[0]->invoice_number}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Event</th>
                                <td>{{$data[0]->event->name}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Total</th>
                                <td>{{$data[0]->total}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>{{$data[0]->status}}</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Payment Method</th>
                                <td>{{$data[0]->payment_method ? $data[0]->payment_method->name : '-'}}</td>
                                
                            </tr>
                           
                                
                            </tbody>
                        </table>
                       <br/>
                       <table  class="table table-striped table-bordered" >
                            <thead>
                            <tr>
                            <th>Judul</th>
                            <th>Judul</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>det</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($data[0]->invoice_detail as $items)

                            <tr>
                                
                                <td>{{$items->id}}</td>
                                <td>{{$items->ticket->detail}}</td>
                                <td>{{$items->jml}}</td>
                                <td>{{$items->ticket->price}}</td>
                                <td></td>
                                <td><table  class="table table-striped table-bordered" >
                                <tbody>
                                @forelse ($items->user_ticket as $item)
                            <tr>
                                
                                <td>{{$item->id}}</td>
                                <td>{{$item->ticket_number}}</td>
                                <td><a href="{{ route('order.cetak_pdf', $item->id) }}"><i class="feather-download mr-3"></i></a></td>
                                
                            </tr>
                            @empty
                                    <div >-</div>
                                @endforelse
                                </tbody>
                            </table>
                                </td>
                            </tr>
                            @empty
                                    <div >-</div>
                                @endforelse
                            
                                
                            </tbody>
                        </table>
                       <br/>
                       <table  class="table table-striped table-bordered" >
                            <thead>
                            <tr>
                            <th>Judul</th>
                            <th>Judul</th>
                            <th>Qty</th>
                            
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($data[0]->invoice_history as $map)

                            <tr>
                                
                                <td>{{$map->status}}</td>
                                <td>{{$map->created_at}}</td>
                                <td>{{$map->comment}}</td>
                               
                            </tr>
                            @empty
                                    <div >-</div>
                                @endforelse
                            
                                
                            </tbody>
                        </table>
                        

                        
                        
                    
                </div>
                
            </div>
            <br/>
            
            <a href="{{ route('order.index') }}" class="btn bg-secondary text-white px-4 d-block d-md-inline-block">Back</a>
            
            <a class="btn bg-warning text-white px-4 d-block d-md-inline-block" href="{{ $data[0]->id ? route('order.edit', $data[0]->id) : '#'}}"> Edit</a>
            
                    
                   
            <!-- </form> -->
@endsection
@section('customjs')
    <script>
     $('#menuOrder').addClass('active');
    
    //  $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');
    </script>
@endsection