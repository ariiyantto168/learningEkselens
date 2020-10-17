<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonies;
use App\Models\Classes;
use Illuminate\Support\Str;
use Image;
use File;


class TestimoniesController extends Controller
{
    public function index()
    {
        $contents = [
            'testimonies' => Testimonies::with('classes')->get(),
        ];

        // return $contents;
        
        $pagecontent = view('contents.class.testimonies.index', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Testimonies Users',
            'menu' => 'lecture',
            'submenu' => 'testimonies',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_page()
    {
        $clas = Classes::all();

        $contents = [
            'classes' => $clas,
        ];
        
        $pagecontent = view('contents.class.testimonies.create', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Created Testimonies Users',
            'menu' => 'lecture',
            'submenu' => 'testimonies',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_save(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $filename = NULL;
        if($request->has('images')){
            $images = $request->file('images');
            $filename = Str::random(20).'.'.$images->getClientOriginalExtension();
            $cdnpath =  env('CDN_URL').'testiusers/';
            $images->move($cdnpath,$filename);
        }

        $testUsers = new Testimonies;
        $testUsers->name = $request->name;
        $testUsers->jobrole = $request->jobrole;
        $testUsers->idclass = $request->idclass;
        $testUsers->description = $request->description;
        $testUsers->images = $filename;
        $testUsers->save();
        return redirect('lecture/testimonies');
    }
}


