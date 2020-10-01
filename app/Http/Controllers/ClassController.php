<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Subclass;
use App\Models\Hilights;
use App\Models\Materies;
use App\Models\Classes;
use App\Models\Categories;
use Image;
use File;

class ClassController extends Controller
{
    public function index()
    {
        $contents = [
            'classes' => Classes::with('categories','subclass','materies','hilights')->get(),
        ];

        // return $contents;
        
        $pagecontent = view('contents.class.index', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Class',
            'menu' => 'lecture',
            'submenu' => 'class',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }
    public function create_page()
    {
        $content = [
            'categories' => Categories::all(),
        ];
        $pagecontent = view('contents.class.create', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'Class',
            'menu' => 'lecture',
            'submenu' => 'class',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_save(Classes $classes, Request $request)
    {
        // return $request->all();
        // return $request->file('images');

        $request->validate([
            'name' => 'required',
            'images' => 'required | max:200000',
            // 'demo' => 'required',
        ]);

        

        $filename = NULL;
        if($request->has('images')){
            $images = $request->file('images');
            $filename = Str::random(20).'.'.$images->getClientOriginalExtension();
            $cdnpath =  env('CDN_PATH').'images/class/';
            $images->move($cdnpath,$filename);
        }

        $filevideo = NULL;
        if($request->has('demo')){
            $video = $request->file('demo');
            $filevideo = Str::random(20).'.'.$video->getClientOriginalExtension();
            $cdnvideo =  env('CDN_PATH').'demo/';
            $video->move($cdnvideo,$filevideo);
        }
        // http://cdn.local/demo/Lr72kRIl7heVERSV0lrY.mp4
        $saveClasses = new Classes;
        $saveClasses->name = $request->name;
        $saveClasses->duration = $request->duration;
        $saveClasses->idcategories = $request->idcategories;
        $saveClasses->images = $filename;
        $saveClasses->demo = $filevideo;
        $saveClasses->tutor = $request->tutor;
        $saveClasses->description = $request->description;
        // return $saveClasses;
        $saveClasses->save();

        // $saveSubclass = new Subclass;
        // $saveSubclass->idclass = $saveClasses->idclass;
        // $saveSubclass->headmateri = $request->headmateri;
        // // return $saveSubclass;
        // $saveSubclass->save();

        // $saveMateries = new Materies;
        // $saveMateries->idsubclass = $saveSubclass->idsubclass;
        // $saveMateries->materi = $request->materi;
        // // return $saveMateries;
        // $saveMateries->save();

        $hmateri = count($request->headmateri);
        for ($j=0; $j < $hmateri; $j++) { 
            $saveSubclass = new Subclass;
            $saveSubclass->idclass = $saveClasses->idclass;
            $saveSubclass->headmateri = $request->headmateri[$j];
            // return $saveSubclass;
            $saveSubclass->save();

            $saveMateries = new Materies;
            $saveMateries->idsubclass = $saveSubclass->idsubclass;
            $saveMateries->materi = $request->materi[$j];
            $saveMateries->save();
          
        }
        // for ($j=0; $j < $hmateri; $j++) { 
        //     $saveSubclass = new Subclass;
        //     $saveSubclass->idclass = $saveClasses->idclass;
        //     $saveSubclass->headmateri = $request->headmateri[$j];
        //     // return $saveSubclass;
        //     $saveSubclass->save();
        
        //     $saveMateries = new Materies;
        //     $saveMateries->idsubclass = $saveSubclass->idsubclass;
        //     $saveMateries->materi = $request->materi[$j];
        //     // return $saveMateries;
        //     $saveMateries->save();
        // }


        $count = count($request->namehilights);
        for ($i=0; $i < $count ; $i++) { 
            $saveHilights = new Hilights;
            $saveHilights->idclass = $saveClasses->idclass;
            $saveHilights->namehilights = $request->namehilights[$i];
            $saveHilights->save();
        }


        return redirect('lecture/class');
    }

    public function update_page()
    {

    }

    public function view_page(Classes $classes)
    {
        $contents = [
            'classes' => Classes::find($classes->idclass),
        ];
        $pagecontent = view('contents.class.view', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'View Class',
            'menu' => 'lecture',
            'submenu' => 'class',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }
}
