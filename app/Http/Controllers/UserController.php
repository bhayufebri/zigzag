<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;

use App\Models\Group;

use Illuminate\Support\Facades\Auth;
use Validator, DataTables;
use Illuminate\Support\Facades\Hash;
use PDF,QrCode,DB;



class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
   
    }
    public function index()
    {   
        $user = User::with('group', 'user_detail')->where('email', Auth::user()->email)->get();
        $member = Member::get();
        // return json_encode($member);
        $group = Group::get();
        return view('dashboard.user.index', compact('group'));
    }

    public function indexData(Request $request){
        $data = Member::get();


        // $data = User::with('group')->whereHas('user_detail');

        return Datatables::of($data)
                
                ->editColumn('action', function($data){ return view('dashboard.user.index-action', compact('data'));})
                // ->editColumn('group', function ($data) {
                //         // return $data->group; 


                //     foreach($data->group as $item) {
                //         // $sum += $item['jml'];
                //         return $item['name']; 

                //     }


                //     // if($data->group){
                //     //     return $data->group['name']; 
                //     // }else{
                //     //     return '';
                //     // }
                //        })
                ->rawColumns(['action'])
                ->make(true); 

    }
    public function lihat(Request $id)
    {
        // $data = User::with('group', 'user_detail')->find($id);
        $member = Member::find($id);
        return $member[0];
        // if(empty($data))  {
        //     flash('Empty record.')->error();
        //     return redirect('/user');
        // } 
        // return view('dashboard.user.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = User::with('group', 'user_detail')->find($id);

        if(empty($data))  {
            flash('Empty record.')->error();
            return redirect('/user');
        } 

        return view('dashboard.user.edit', compact('data'));
     }

    public function update(Request $request)
    {

        // return json_encode($request->all());
        $this->validate($request,[
            // 'is_verified' => 'required',
            // 'password' => 'required'
            'nama' => 'required',
            'nik' => 'required',
            'lembaga' => 'required',
            'bank' => 'required',
            'rekening' => 'required',
            'alamat' => 'required',      
            'tanggal_lahir' => 'required',
            'no_handphone' => 'required',
            ]);

        
            // dd($request->password);
    
        $member = Member::find($request->id);
        if (empty($member)) {
            flash('ERROR')->error();
            return redirect('/user');
            }
        $member->nama = $request->nama;
        $member->nik = $request->nik;
        $member->lembaga = $request->lembaga;
        $member->bank = $request->bank;
        $member->rekening = $request->rekening;
        $member->alamat = $request->alamat;
        $member->tanggal_lahir = $request->tanggal_lahir;
        $member->no_handphone = $request->no_handphone;
        $member->save();

        flash('Data success changed!')->success();
        return redirect('/user' );
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            // 'is_verified' => 'required',
            // 'password' => 'required'
            'nama' => 'required',
            'nik' => 'required',
            'lembaga' => 'required',
            'bank' => 'required',
            'rekening' => 'required',
            'alamat' => 'required',      
            'tanggal_lahir' => 'required',
            'no_handphone' => 'required',
            ]);
            
            // return json_encode('asdfad');
            // dd($request->password);

            Member::create([
                'nama' => $request['nama'],
                'nik' => $request['nik'],
                'lembaga' => $request['lembaga'],
                'bank' => $request['bank'],
                'rekening' => $request['rekening'],
                'alamat' => $request['alamat'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'no_handphone' => $request['no_handphone'],
                'password' => Hash::make('12345')

       
            ]);
    
        
        flash('Data success changed!')->success();
        return redirect('/user');
    }

    public function delete(Request $request)
    {
        $member = Member::find($request->id);
        // dd($event_time);
        $member->delete();
        return $member;

    }
    public function cetak_pdf($id)
    {
        // $user_ticket = User_ticket::with('invoice_detail.invoice.event', 'invoice_detail.ticket.event_time', 'buyer')->where('id',$id)->get();
        // // dd($user_ticket[0]->ticket_number);
        $member = Member::where('id', $id)->get();

        // return json_encode($member);
        $qr = QrCode::size(300)->generate('A basic example of QR code!');
 
    	$pdf = PDF::loadview('invoice',['member'=>$member[0], 'qr'=>$qr] );
    	return $pdf->download('invoice.pdf');
    }
}
