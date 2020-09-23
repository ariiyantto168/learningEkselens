<?php

namespace App\Http\Controllers;
use App\Models\Categories;

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
        ]);

        $saveCategories = new Categories;
        $saveCategories->name = $request->name;
        $saveCategories->save();
        return redirect('lecture/categories');
    }
}
