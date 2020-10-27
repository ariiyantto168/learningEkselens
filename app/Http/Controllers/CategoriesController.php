<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Support\Str;
use Image;
use File;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $contents = [
            'categories' => Categories::all()
        ];

        // return $contents;
        
        $pagecontent = view('contents.class.categories.index', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Categories',
            'menu' => 'lecture',
            'submenu' => 'categories',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_page()
    {
        $content = [
        ];
        $pagecontent = view('contents.class.categories.create', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'Categories',
            'menu' => 'lecture',
            'submenu' => 'categories',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_save(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'images' => 'required | max:200000',
        ]);

        $filename = NULL;
        if($request->has('images')){
            $images = $request->file('images');
            $filename = Str::random(20).'.'.$images->getClientOriginalExtension();
            $cdnpath =  env('CDN_URL').'image/';
            $images->move($cdnpath,$filename);
        }

        $saveCategories = new Categories;
        $saveCategories->name = $request->name;
        $saveCategories->slug =  $slug = Str::slug($request->name, '-');
        $saveCategories->images = $filename;
        $saveCategories->save();
        return redirect('lecture/categories');
    }

    public function update_page(Categories $categories)
    {
        $contents = [
            'categories' => Categories::find($categories->idcategories)
        ];

        // return $content;

        $pagecontent = view('contents.class.categories.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Categories',
            'menu' => 'lecture',
            'submenu' => 'categories',
            'pagecontent' => $pagecontent
        );

        return view('contents.masterpage', $pagemain);
    }

        public function update_save(Request $request,Categories $categories)
        {

            // $request->validate([
            //     'name' => 'required',
            // ]);


            if (!empty($categories->images)) {
                if (!empty($request->images)) {
                    $path_image = env('CDN_URL').'image/'.$categories->images; 
                    if(File::exists($path_image)){
                        $images = $request->file('images');
                        $filename = Str::random(20).'.'.$images->getClientOriginalExtension();
                        $cdnpath =  env('CDN_URL').'image/';
                        $images->move($cdnpath,$filename);
                    }
                    File::delete($path_image);
                    
                }else{
                    $filename = $categories->images;
                }
            }

         
            $updateCategories = Categories::find($categories->idcategories);
            $updateCategories->name = $request->name;
            $updateCategories->images = $filename;
            $updateCategories->save();
            return redirect('lecture/categories');
            // return redirect('categories')->with('status_success','Update categories');
        }
    
    public function delete(Categories $categories, Request $request)
    {
        $deleteCategories = Categories::find($categories->idcategories);
        if (!empty($categories->images)) {
            $path_image = env('CDN_URL').'image/'.$categories->images; 
            if(File::exists($path_iamge)){
                File::delete($path_image); 
            }
        }
        // return $deleteCategories;
        $deleteCategories->delete();
        return redirect('lecture/categories');
    }
}
