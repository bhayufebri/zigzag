<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Session, Config, DataTables, Validator, Cache, Artisan, File;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $user = User::with('group', 'user_detail')->where('email', Auth::user()->email)->get();
        return view('dashboard.categories.index', ['user' => $user]);
    }

    public function indexData(Request $request){
        $data = Category::all();

        return Datatables::of($data)
            ->editColumn('action', function($data){ return view('dashboard.categories.index-action', compact('data'));})
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        DB::beginTransaction();
        try{
            $user = User::with('group', 'user_detail')->where('email', Auth::user()->email)->get();
            $categories = Category::where('type', 'article')->get();

        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();
        return view('dashboard.categories.create', ['user' => $user, 'categories' => $categories ]);
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $this->validate($request,[
                'title' => 'required',
            ]);
            $data = $request->except('_token');
            $category = new Category;
            $category->title = $data['title'];
            $category->type = 'article';
            $category->save();

        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();
        flash('Add Category Success!')->success();
        return redirect()->route('categories.index');

    }

    public function edit($id)
    {
        DB::beginTransaction();
        try{
            $categories = Category::findOrFail($id);
            $user = User::with('group', 'user_detail')->where('email', Auth::user()->email)->get();
        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();
        return view('dashboard.categories.edit', ['user' => $user, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $this->validate($request,[
                'title' => 'required'
            ]);
            $data = $request->except('_token');
            $article = Category::findOrFail($id);
            $article->title = $data['title'];
            $article->type = 'article';

            $article->save();

        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();

        flash('Edit Category Success')->success();
        return redirect()->route('categories.index');
    }

    public function detail($id)
    {
        DB::beginTransaction();

        $user = User::with('group', 'user_detail')->where('email', Auth::user()->email)->get();
        try{
            $page = Page::findOrFail($id);
            if(empty($page))  {
                flash('Empty record.')->error();
                return redirect('/articles');
            }

        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();
        return view('dashboard.articles.detail', ['user' => $user, 'page' => $page ]);
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $category = Category::findOrFail($id);
            $category->delete();
        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();
        flash('Delete Category Success')->success();
        return redirect()->route('categories.index');
    }
}
