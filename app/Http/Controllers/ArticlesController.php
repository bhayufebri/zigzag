<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Session, Config, DataTables, Validator, Cache, Artisan, File;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $data = Page::whereIn('page_type', ['article'])->orderBy('id', 'desc')->get();
        return view('dashboard.articles.index', ['data' => $data]);
    }

    public function indexData(Request $request){
        $data = Page::with('user')->whereIn('page_type', ['article']);

        return Datatables::of($data)
            ->editColumn('action', function($data){ return view('dashboard.articles.index-action', compact('data'));})
            ->rawColumns(['action'])
            ->make(true);
    }


    public function create()
    {
        $page_type = Page::where('page_type', 'article')->get();
        $categories = Category::where('type', 'article')->get();

        return view('dashboard.articles.create', ['page_type' => $page_type, 'categories' => $categories ]);
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $this->validate($request,[
                'title' => 'required',
                'title_idn' => 'required',
                'slug' => 'required',
                'slug_idn' => 'required',
                'description' => 'required',
                'description_idn' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keyword' => 'required',
                'category_id' => 'required',
            ]);
            $data = $request->except('_token');
            $article = new Page;
            $article->user_id = Auth::user()->id;
            $article->title = $data['title'];
            $article->title_idn = $data['title_idn'];
            $article->slug = $data['slug'];
            $article->slug_idn = $data['slug_idn'];
            $article->description	= $data['description'];
            $article->description_idn	= $data['description_idn'];
            $article->meta_title= $data['meta_title'];
            $article->meta_description = $data['meta_description'];
            $article->meta_keyword  = $data['meta_keyword'];
            $article->is_publish = $data['is_publish'];
            $article->page_type = "article";
            //$article->parent_id = $data['parent_id'];
            $article->category_id = $data['category_id'];
            if($request->hasFile('image'))
            {
                $article->image = $this->saveImage($request->file('image'));
            }
            $article->save();

        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();
        flash('Add Article Success!')->success();
        return redirect()->route('articles.index');

    }


    public function saveImage(UploadedFile $photo)
    {
        $fileName= Str::random(40).'.'.$photo->guessClientExtension();
        $destinationPath=public_path().'/uploads/image/articles';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }


    public function edit($id)
    {
        $categories = Category::where('type', 'article')->get();
        $pages = Page::findOrFail($id);

        return view('dashboard.articles.edit', ['pages' => $pages, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $this->validate($request,[
                'title' => 'required',
                'title_idn' => 'required',
                'slug' => 'required',
                'slug_idn' => 'required',
                'description' => 'required',
                'description_idn' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keyword' => 'required',
                'category_id' => 'required',
            ]);
            $data = $request->except('_token');
            $article = Page::findOrFail($id);
            $article->user_id = Auth::user()->id;
            $article->title = $data['title'];
            $article->title_idn = $data['title_idn'];
            $article->slug = $data['slug'];
            $article->slug_idn = $data['slug_idn'];
            $article->description	= $data['description'];
            $article->description_idn	= $data['description_idn'];
            $article->meta_title = $data['meta_title'];
            $article->meta_description = $data['meta_description'];
            $article->meta_keyword  = $data['meta_keyword'];
            $article->is_publish = $data['is_publish'];
            $article->page_type = "article";
            $article->category_id = $data['category_id'];
            if($request->hasFile('image'))
            {
                $article->image = $this->saveImage($request->file('image'));
            }
            $article->save();

        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();
        flash('Edit Article Success!')->success();
        return redirect()->route('articles.index');

    }

    public function detail($id)
    {
        $user = User::with('group', 'user_detail')->where('email', Auth::user()->email)->get();
        $page = Page::findOrFail($id);
            if(empty($page))  {
                flash('Empty record.')->error();
                return redirect('/articles');
            }
        return view('dashboard.articles.detail', ['user' => $user, 'page' => $page ]);
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $product = Page::findOrFail($id);
            $imagePath = public_path()."/uploads/image/articles/".$product->image;
            if(File::exists($imagePath))
            {
                File::delete($imagePath);
            }
            $product->delete();
        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();
        flash('Delete Articles Success')->success();
        return redirect()->route('articles.index');
    }
}
