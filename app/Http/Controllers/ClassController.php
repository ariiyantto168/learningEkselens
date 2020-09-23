<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Classes;
use Image;
use File;

class ClassController extends Controller
{
    public function index()
    {
        $contents = [
            'classes' => Classes::all()
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

    public function create_save(Request $request)
    {
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
        $saveClasses->images = $filename;
        $saveClasses->demo = $filevideo;
        $saveClasses->save();
        return redirect('lecture/class');
    }
}
