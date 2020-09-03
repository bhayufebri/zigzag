<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use App\Models\User;
use App\Models\Legal;

use GuzzleHttp\Client;

use Validator, View, Image;
use DataTables;



class DocumentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
   
    }
    public function index()
    {   
        return view('dashboard.document.index');
    }

    public function indexData(Request $request){
  
        $data = Legal::with('vendor:id,name_cp')->get();      
        if (count($data) == 0){
            if($request->ajax()){
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('action', function($data){ 
                        return view('dashboard.document.index-action', compact('data'));
                        })
                    ->rawColumns(['Status'])
                    ->make(true);
            }else{
                flash('WARNING')->warning();
                return redirect('/document');
            } 
        }else {
            $vendor_name = $data[0]->vendor->name_cp;    
            if($request->ajax()){
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('Name', $vendor_name)
                    ->editColumn('action', function($data){ 
                        return view('dashboard.document.index-action', compact('data'));
                        })
                    ->rawColumns(['Status','Name'])
                    ->make(true); 
            } else {
                flash('WARNING')->warning();
                return redirect('/document');
            }
        }
    }

    public function detail($id)
    {
        $legal = Legal::with('vendor')->find($id);
        $get_image_ktp = env('BACKEND_IMAGE')."/uploads/images/vendor/document/ktp/". $legal->ktp_image;
        $get_image_npwp = env('BACKEND_IMAGE')."/uploads/images/vendor/document/npwp/". $legal->npwp_image;
        if(empty($legal))  {
            flash('Empty record.')->error();
            return redirect('/document');
        } 
        return view('dashboard.document.detail', ['legal' => $legal, 'get_image_ktp' => $get_image_ktp, 'get_image_npwp' => $get_image_npwp]);
    }

    public function setVerified(Request $request, $id)
    {
        $item = Legal::findOrFail($id);
        $item->status = 1;
        $item->save();
        return redirect()->route('document.detail', $id)->with('message','Document has been Verified.');
    }
}
