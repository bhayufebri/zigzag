<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Str;
use Session, Config, DataTables, Validator, Cache, Artisan, File;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $data = Page::whereIn('page_type', ['single-page', 'article-list'])->orderBy('id', 'desc')->get();
        return view('dashboard.pages.index', ['data' => $data]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.pages.create', ['categories' => $categories]);
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
                'page_type' => 'required',
            ]);
            $data = $request->except('_token');
            $page = new Page;
            $page->user_id = Auth::user()->id;
            $page->title = $data['title'];
            $page->title_idn = $data['title_idn'];
            $page->slug = $data['slug'];
            $page->slug_idn = $data['slug_idn'];
            $page->description	= $data['description'];
            $page->description_idn	= $data['description_idn'];
            $page->meta_title= $data['meta_title'];
            $page->meta_description = $data['meta_description'];
            $page->meta_keyword  = $data['meta_keyword'];
            $page->is_publish = $data['is_publish'];
            $page->page_type = $data['page_type'];
//            $page->category_id = $data['category_id'];
            if($request->hasFile('image'))
            {
                $page->image = $this->saveImage($request->file('image'));
            }
            $page->save();

        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();
        flash('Add Pages Success!')->success();
        return redirect()->route('pages.index');
    }


    public function saveImage(UploadedFile $photo)
    {
        $fileName= Str::random(40).'.'.$photo->guessClientExtension();
        $destinationPath=public_path().'/uploads/image/pages';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }


    public function edit($id)
    {
        $pages = Page::findOrFail($id);
        return view('dashboard.pages.edit', ['pages' => $pages]);
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
                'page_type' => 'required'
            ]);
            $data = $request->except('_token');

            $page = Page::findOrFail($id);
            $page->user_id = Auth::user()->id;
            $page->title = $data['title'];
            $page->title_idn = $data['title_idn'];
            $page->slug = $data['slug'];
            $page->slug_idn = $data['slug_idn'];
            $page->description	= $data['description'];
            $page->description_idn	= $data['description_idn'];
            $page->meta_title= $data['meta_title'];
            $page->meta_description = $data['meta_description'];
            $page->meta_keyword  = $data['meta_keyword'];
            $page->is_publish = $data['is_publish'];
            $page->page_type = $data['page_type'];
            if($request->hasFile('image'))
            {
                $imagePath = public_path()."/uploads/image/pages/".$page->image;
                if(File::exists($imagePath))
                {
                    File::delete($imagePath);
                }
                $page->image = $this->saveImage($request->file('image'));
            }
            $page->save();

        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();

        flash('Edit Product Success')->success();
        return redirect()->route('dashboard.pages.index');

    }

    public function detail($id)
    {
            $page = Page::findOrFail($id);
            if(empty($page))  {
                flash('Empty record.')->error();
                return redirect('/pages');
            }

        return view('dashboard.pages.detail', ['page' => $page ]);
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $product = Page::findOrFail($id);
            $imagePath = public_path()."/uploads/image/pages/".$product->image;
            if(File::exists($imagePath))
            {
                File::delete($imagePath);
            }
            $product->delete();
        }catch (\Exception $e){
            DB::rollBack();
        }
        DB::commit();
        flash('Delete Pages Success')->success();
        return redirect()->route('pages.index');
    }
}
