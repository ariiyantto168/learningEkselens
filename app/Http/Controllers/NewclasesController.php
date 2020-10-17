<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Newclases;
use App\Models\Classes;
use Image;
use File;

class NewclasesController extends Controller
{
    public function index()
    {
        $contents = [
            'newclases' => Newclases::with('classes')->get(),
        ];

        // return $contents;
        
        $pagecontent = view('contents.trandings.newclass.index', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'New Class',
            'menu' => 'trandings',
            'submenu' => 'newclass',
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
        $pagecontent = view('contents.trandings.newclass.create', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'New Class',
            'menu' => 'trandings',
            'submenu' => 'newclass',
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


        $saveNclass = new Newclases;
        $saveNclass->name = $request->name;
        $saveNclass->idclass = $request->idclass;
        $saveNclass->save();
        return redirect('trandings/newclass');
    }

    public function update_page(Newclases $newclass)
    {

        $contents = [
            'classes' => Classes::all(),
            'newclass' => Newclases::find($newclass->idnewclass)
        ];

        // return $content;

        $pagecontent = view('contents.trandings.newclass.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Update New Class',
            'menu' => 'trandings',
            'submenu' => 'newclass',
            'pagecontent' => $pagecontent
        );

        return view('contents.masterpage', $pagemain);
    }

    public function update_save(Request $request,Newclases $newclass)
    {

        // $request->validate([
        //     'name' => 'required',
        // ]);

         
            $updateNewclass = Newclases::find($newclass->idnewclass);
            $updateNewclass->name = $request->name;
            $updateNewclass->idclass = $request->idclass;
            $updateNewclass->save();
            return redirect('trandings/newclass');
            // return redirect('categories')->with('status_success','Update categories');
    }
}
