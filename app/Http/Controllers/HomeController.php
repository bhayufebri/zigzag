<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users_group;
use App\Models\Event;
use App\Models\Invoice;


use View,DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
     
        

    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    {    
        $event = Event::select('id')->get();
        $count_event = count($event);
        $invoice = Invoice::select('id')->get();
        $count_invoice = number_format(count($invoice), 0, ',', '.');
        // $invoice_group = Invoice::with('invoice_detail', 'invoice_history', 'invoice_detail.user_ticket', 'event', 'user', 'payment_method')->groupBy('event_id')->get();
        $invoice_group = Invoice::with('event:id,name')->groupBy('event_id')->selectRaw('event_id, sum(total) as sum, count(id) as sum_id')->get();


        
        // return json_encode($invoice_group);
        return view('home', compact( 'count_event', 'count_invoice', 'invoice_group' ));
    }
}
