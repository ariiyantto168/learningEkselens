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
        
        $pagecontent = view('contents.categories.index', $contents);

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
        $pagecontent = view('contents.categories.create', $content);

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
            $cdnpath =  env('CDN_URL').'class/';
            $images->move($cdnpath,$filename);
        }

        $saveCategories = new Categories;
        $saveCategories->name = $request->name;
        $saveCategories->images = $filename;
        $saveCategories->save();
        return redirect('lecture/categories');
    }
}
