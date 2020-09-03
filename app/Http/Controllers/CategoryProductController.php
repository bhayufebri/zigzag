<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_product;
use Validator, DataTables;


class CategoryProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $category_product = Category_product::all();
        // return json_encode($category_product);
        return view('dashboard.category.index');
    }
    public function indexData(Request $request){

        $data = Category_product::all();
        // return json_encode($data);

        return Datatables::of($data)
                
                ->editColumn('action', function($data){ return view('dashboard.category.index-action', compact('data'));})
                ->editColumn('is_show', function ($data) {
                        // return $data->group; 


                    // foreach($data->group as $item) {
                    //     // $sum += $item['jml'];
                    //     return $item['name']; 

                    // }


                    if($data->is_show == 1){
                        return 'SHOW'; 
                    }else{
                        return 'HIDDEN';
                    }
                       })
                ->rawColumns(['action', 'is_show'])
                ->make(true); 

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $this->validate($request,[
               "category_name" => 'required',
             ]);

             Category_product::create([
            'category_name' => $request['category_name'],
            'is_show' => '0',
        ]);

        flash('Category created!')->success();
        return redirect('/category_product/index' );
    }
    public function edit_category(Request $request)
    {
        $category_product = Category_product::find($request->id);
        return $category_product;
    }
    public function update_category(Request $request)
    {
        $category_product = Category_product::find($request->id);
        $category_product->category_name = $request->category_name;
        $category_product->is_show = $request->is_show;
        $category_product->save();

        return $category_product;

    }
    public function delete_category(Request $request)
    {
        $category_product = Category_product::find($request->id);
        // dd($event_time);
        $category_product->delete();
        return $category_product;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
