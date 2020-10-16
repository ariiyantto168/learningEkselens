<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Careers;
use App\Models\Classes;
use Image;
use File;

class CareersControlller extends Controller
{
    public function index()
    {
        $contents = [
            'careers' => Careers::with('classes')->get(),
        ];

        // return $contents;
        
        $pagecontent = view('contents.careers.index', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Career Ready Program',
            'menu' => 'trandings',
            'submenu' => 'careers',
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
        
        $pagecontent = view('contents.careers.create', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Careers Ready Program',
            'menu' => 'trandings',
            'submenu' => 'careers',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_save(Request $request)
    {

        $request->validate([
            'name' => 'required',
            // 'images' => 'required | max:200000',
        ]);


        $saveCareers = new Careers;
        $saveCareers->name = $request->name;
        $saveCareers->idclass = $request->idclass;
        $saveCareers->save();
        return redirect('trandings/careers');
    }
}
