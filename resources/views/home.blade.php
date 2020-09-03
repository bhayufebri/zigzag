@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item active" >DASHBOARD</li>

@endsection

@section('content')

            <h2 class="text-dark m-0 mb-4"> DASHBOARD</h2>
            
            <div class="row">
                <div class="col-md-7">
                    <div class="card bg-accent border-0 text-white mb-4">
                        <div class="card-body p-4">
                            <div><small>TOTAL SALES THIS MONTH</small></div>
                            <div class="h2 mb-2">Rp 225.000.000</div>
                            <div class="row mb-4">
                                <div class="col-auto">
                                    <div class="badge badge-warning radius-50 px-3 py-2 text-white">SUCCESS</div>
                                </div>
                                <div class="col-auto">1200 Transaction</div>
                            </div>
                            <div data-simplebar>
                                <div class="row flex-nowrap">

                                    @forelse ($invoice_group as $items)
                                    <div class="col-auto">
                                        <div class="card bg-white-25 border-0" style="width:180px;">
                                            <div class="card-body py-3 px-4">
                                                <div class="badge badge-warning radius-50 px-3 py-1 text-white text-wrap" style="background:#5AAAFB;">{{$items->event ? $items->event->name : '-'}}</div>
                                                <div class="h5 m-0 mt-4">RP {{ number_format($items->sum, 0, ',', '.')}}</div>
                                                <div><small>{{ number_format($items->sum_id, 0, ',', '.')}} Transaction</small></div>
                                            </div>
                                        </div>
                                    </div>                                                                   
                                    @empty
                                    @endforelse
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col d-flex align-items-center"><h5 class="text-dark m-0">Last Transaction</h5></div>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <input type="date" class="form-control bg-light border-0" style="width:120px;">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-light border-0"><i class="feather-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn bg-accent text-white">View All Transaction</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Merchant</th>
                                            <th>Payment Via</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>38922114</td>
                                            <td>Fastabica Travel</td>
                                            <td>LinkAja</td>
                                            <td>2019-09-17 15:44:22</td>
                                        </tr>
                                        <tr>
                                            <td>38922114</td>
                                            <td>Fastabica Travel</td>
                                            <td>LinkAja</td>
                                            <td>2019-09-17 15:44:22</td>
                                        </tr>
                                        <tr>
                                            <td>38922114</td>
                                            <td>Fastabica Travel</td>
                                            <td>LinkAja</td>
                                            <td>2019-09-17 15:44:22</td>
                                        </tr>
                                        <tr>
                                            <td>38922114</td>
                                            <td>Fastabica Travel</td>
                                            <td>LinkAja</td>
                                            <td>2019-09-17 15:44:22</td>
                                        </tr>
                                        <tr>
                                            <td>38922114</td>
                                            <td>Fastabica Travel</td>
                                            <td>LinkAja</td>
                                            <td>2019-09-17 15:44:22</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row mb-4">
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto d-flex align-items-center border-right border-light"><i class="feather-user h1"></i></div>
                                        <div class="col text-center">
                                            <div class="h1 m-0">{{$count_event}}</div>
                                            <div class="text-muted mt-n2"><small>Total Event</small></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto d-flex align-items-center border-right border-light"><i class="feather-credit-card h1"></i></div>
                                        <div class="col text-center">
                                            <div class="h1 m-0">{{$count_invoice}}</div>
                                            <div class="text-muted mt-n2"><small>Invoice</small></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0 p-4">
                        <div id="chart" style="height:515px;"></div>
                    </div>
                </div>
            </div>
                
            

            


@endsection
@section('customjs')
    <script>
     $('#menuHome').addClass('active');
     
    </script>
    
    <style>
        .simplebar-scrollbar:before {
            background:#fff!important;

        }
        
    </style>

 
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css"/>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
    

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chart', {
            chart: {
                type: 'area'
            },
            title: {
                text: 'USER VS TRANSACTION',
                style:{
                    fontFamily:'Ruda, sans-serif',
                    color:'#333'
                }
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'Mei',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sept',
                    'Okt',
                    'Nov',
                    'Des'
                ],
                gridLineWidth:1,
                labels:{
                    style:{
                        color:'#333',
                        fontFamily:'norpeth, sans-serif;',
                        fontSize:10
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                },
                gridLineWidth:1
            },
            legend:{
                enabled:false
            },
            credits:false,
            
            plotOptions: {
                area: {
                    marker:{
                        enabled:false
                    },
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [
                {
                    name: 'Transaksi',
                    color:'#5BFF6B',
                    data: [40,60,50,30,35,45,40,60,20,45,50,60],
                },
                {
                    name: 'User',
                    color:'#5BB3FF',
                    data: [30,35,45,40,60,20,40,60,50,45,50,60],
                }
            ]
        });
    </script>
@endsection