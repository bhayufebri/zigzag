<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;

use Illuminate\Support\Facades\Auth;
use Validator, DataTables;
use Illuminate\Support\Facades\Hash;



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
        // return json_encode($user[0]);
        $group = Group::get();
        return view('dashboard.user.index', compact('group'));
    }

    public function indexData(Request $request){

        $data = User::with('group')->whereHas('user_detail');

        return Datatables::of($data)
                
                ->editColumn('action', function($data){ return view('dashboard.user.index-action', compact('data'));})
                ->editColumn('group', function ($data) {
                        // return $data->group; 


                    foreach($data->group as $item) {
                        // $sum += $item['jml'];
                        return $item['name']; 

                    }


                    // if($data->group){
                    //     return $data->group['name']; 
                    // }else{
                    //     return '';
                    // }
                       })
                ->rawColumns(['action', 'group'])
                ->make(true); 

    }
    public function show($id)
    {
        $data = User::with('group', 'user_detail')->find($id);
        // return json_encode($data);
        if(empty($data))  {
            flash('Empty record.')->error();
            return redirect('/user');
        } 
        return view('dashboard.user.detail', compact('data'));
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

    public function update($id, Request $request)
    {
        $this->validate($request,[
            // 'is_verified' => 'required',
            'password' => 'required'
            ]);
        
            // dd($request->password);
    
        $user = User::find($id);
        if (empty($user)) {
            flash('ERROR')->error();
            return redirect('/user');
            }
        $user->password = Hash::make($request->password);
        $user->save();

        flash('Data success changed!')->success();
        return redirect('/user/detail/'.$id );
    }
}
