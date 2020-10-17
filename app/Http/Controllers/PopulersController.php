<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Populers;
use App\Models\Classes;
use Image;
use File;




class PopulersController extends Controller
{
    public function index()
    {
        $contents = [
            'populers' => Populers::with('classes')->get(),
        ];

        // return $contents;
        
        $pagecontent = view('contents.trandings.populers.index', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Class populers',
            'menu' => 'trandings',
            'submenu' => 'populers',
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

        $pagecontent = view('contents.trandings.populers.create', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Class populers',
            'menu' => 'trandings',
            'submenu' => 'populers',
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


        $savePopulers = new Populers;
        $savePopulers->name = $request->name;
        $savePopulers->idclass = $request->idclass;
        $savePopulers->save();
        return redirect('trandings/populers');
    }

    public function update_page(Populers $populers)
    {

        $contents = [
            'classes' => Classes::all(),
            'populers' => Populers::find($populers->idpopulers)
        ];

        // return $content;

        $pagecontent = view('contents.trandings.populers.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Update Kelas Populers',
            'menu' => 'trandings',
            'submenu' => 'populers',
            'pagecontent' => $pagecontent
        );

        return view('contents.masterpage', $pagemain);
    }

    public function update_save(Request $request,Populers $populers)
    {

        // $request->validate([
        //     'name' => 'required',
        // ]);

         
            $updatePopulers = Populers::find($populers->idpopulers);
            $updatePopulers->name = $request->name;
            $updatePopulers->idclass = $request->idclass;
            $updatePopulers->save();
            return redirect('trandings/populers');
            // return redirect('categories')->with('status_success','Update categories');
    }
}
