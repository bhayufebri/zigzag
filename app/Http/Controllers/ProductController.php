<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_product;
use App\Models\Product;
use App\Models\Detail_product;
use App\Models\Order_detail;
use App\Models\Order;
use App\Models\Midtrans_detail;



use Validator, DataTables, Str;


class ProductController extends Controller
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
        $category_product = Category_product::all();
        // return json_encode($product);
        return view('dashboard.product.index', compact('category_product'));
    }
    public function indexData(Request $request){

        $data = Product::with('category_product');
        // return json_encode($data);

        return Datatables::of($data)
                
                ->editColumn('action', function($data){ return view('dashboard.product.index-action', compact('data'));})
                ->editColumn('is_show', function ($data) {
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
        // $this->validate($request,[
        //        "category_name" => 'required',
        //      ]);

        //      Category_product::create([
        //     'category_name' => $request['category_name'],
        //     'is_show' => '0',
        // ]);

        // flash('Category created!')->success();
        // return redirect('/product/index' );
    }
    public function edit(Request $request)
    {
        $category_product = Product::find($request->id);
        return $category_product;
    }
    public function update(Request $request)
    {
        // return json_encode($request->all());
        $this->validate($request,[
            "product_name" => 'required',
            "category_product_id" => 'required',
            "detail" => 'required',
            "is_show" => 'required',
            "price" => 'required',
            'date_acara' => 'required',
            "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          ]);
        $product = Product::find($request->id);
        if ($request->hasFile('image')) {
            $request['image']->move(public_path('uploads/products'), $request['image']->getClientOriginalName());
            $product->image = $request->image->getClientOriginalName();
        }

        $product->product_name = $request->product_name;
        $product->detail = $request->detail;
        $product->is_show = $request->is_show;
        $product->date_acara = $request->date_acara;

        $product->price = $request->price;
        
        $product->save();

        
        flash('Product updated!')->success();
        return redirect('/product/index' );
        // return $product;

    }
    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        // dd($event_time);
        $product->delete();
        return $product;

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
        // return json_encode($request->all());
        $this->validate($request,[
            "product_name" => 'required',
            "category_product_id" => 'required',
            "detail" => 'required',
            "is_show" => 'required',
            "price" => 'required',
            "date_acara" => 'required',

            "image" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          ]);

          Product::create([
         'product_name' => $request['product_name'],
         'category_product_id' => $request['category_product_id'],
         'detail' => $request['detail'],
         'is_show' => $request['is_show'],
         'price' => $request['price'],
         'date_acara' => $request['date_acara'],

         'image' => $request['image']->getClientOriginalName()
     ]);
     $request['image']->move(public_path('uploads/products'), $request['image']->getClientOriginalName());

     flash('Product created!')->success();
     return redirect('/product/index' );
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
        $product = Product::with('category_product','detail_product')->findOrFail($id);
        $order_detail =Order_detail::with('order.user:id,first_name,email', 'order:id,status,user_id,qr_code,link_sertifikat', 'order.user.user_detail:id,user_id,phone', 'order.midtrans_detail:id,order_id,payment_method,status,created_at')
                    ->select('id','product_id', 'order_id')
                    ->where('product_id', $id)->get();

        $category_product = Category_product::all();
        // return json_encode($order_detail);
        return view('dashboard.product.stock', compact('category_product','product', 'order_detail'));
    
    }
    public function stock_store(Request $request)
    {
        //
        // return json_encode($request->all());
        $this->validate($request,[
            "detail_product_name" => 'required',
            "product_id" => 'required',
            "stock" => 'required'
          ]);

          Detail_product::create([
         'detail_product_name' => $request['detail_product_name'],
         'product_id' => $request['product_id'],
         'stock' => $request['stock']
     ]);
     

     flash('Stock created!')->success();
     return redirect('/product/show/'.$request['product_id'] );
    }
    public function stock_update(Request $request)
    {
        // return json_encode($request->all());
        $this->validate($request,[
            "detail_product_name" => 'required',
            "product_id" => 'required',
            "stock" => 'required'
          ]);
        $detail_product = Detail_product::find($request->id);
        $detail_product->detail_product_name = $request->detail_product_name;
        $detail_product->stock = $request->stock;
        $detail_product->save();

        flash('Stock updated!')->success();
        return redirect('/product/show/'.$request['product_id'] );
        // return $product;

    }
    public function stock_edit(Request $request)
    {
        $detail_product = Detail_product::find($request->id);
        return $detail_product;
    }
    public function stock_delete(Request $request)
    {
        // return json_encode($request->all());

        $order = Order::find($request->id);
        $order->status = 'new';
        $order->save();


        // $detail_product = Detail_product::find($request->id);
        // dd($event_time);
        // $detail_product->delete();

        flash('Status diubah new!')->success();
        return redirect('/product/show/'.$request->id_parent );
        // return $detail_product;

    }
    public function stock_success(Request $request)
    {
        // return json_encode($request->all());

        $order = Order::find($request->id);
        do{
            $filename=Str::random(32);
            $checkuniq = Order::where('qr_code', $filename)->first();
        }while(!empty($checkuniq));

        $order->qr_code = $filename;
        $order->status = 'success';
        $order->save();


        // $detail_product = Detail_product::find($request->id);
        // dd($event_time);
        // $detail_product->delete();

        flash('Status diubah success!')->success();
        return redirect('/product/show/'.$request->id_parent );
        // return $detail_product;

    }
    public function stock_hadir(Request $request)
    {
        // return json_encode($request->all());

        $order = Order::find($request->id);
        $order->status = 'hadir';
        $order->save();


        // $detail_product = Detail_product::find($request->id);
        // dd($event_time);
        // $detail_product->delete();

        flash('Status diubah hadir!')->success();
        return redirect('/product/show/'.$request->id_parent );
        // return $detail_product;

    }

    public function stock_kirim(Request $request)
    {
        // return json_encode($request->all());

        $order = Order::find($request->id);
        $order->link_sertifikat = $request->link_sertifikat;
        $order->status = 'terkirim';

        $order->save();


        // $detail_product = Detail_product::find($request->id);
        // dd($event_time);
        // $detail_product->delete();

        flash('Status diubah kirim!')->success();
        return redirect('/product/show/'.$request->id_parent );
        // return $detail_product;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

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
    public function histori(Request $request)
    {
        
        $midtrans_detail = Midtrans_detail::where('order_id', $request->id)->get();
        return json_encode($midtrans_detail);
        // $order->link_sertifikat = $request->link_sertifikat;
        // $order->status = 'terkirim';

        // $order->save();


        // $detail_product = Detail_product::find($request->id);
        // dd($event_time);
        // $detail_product->delete();

        // flash('Status diubah kirim!')->success();
        // return redirect('/product/show/'.$request->id_parent );
        // return $detail_product;

    }
}
