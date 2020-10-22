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
            'classes' => Classes::all(),
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
        $contents = [
            'categories' => Categories::all(),
        ];
        $pagecontent = view('contents.class.create', $contents);

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
        // // return $request->all();
        // $request->validate([
        //     'name' => 'required',
        //     'tutor' => 'required',
        //     'description' => 'required',
        //     'images' => 'required|file|mimes:jpg,jpeg,png|max:50000',
        //     'demo' => 'required|file|mimes:mp4',
        // ]);

        // $getsize = filesize($request->file('demo'));
        // if ($getsize < 31500000) {
        //     return redirect()->back()->with('status_error','Demo video is too large');
        //     // 'validate';
        // }

        // // return $getsize;
        // if($request->hasFile('images')){
        //     $file = $request->file('images');
        //     $filename = time()."_".$file->getClientOriginalName();
        //     $destinasi = env('CDN_URL').'image/'; 
        //     $file->move($destinasi, $filename);
        // }

        // // if($request->hasFile('imagesinstructor')){
        // //     $fileinstructor = $request->file('imagesinstructor');
        // //     $nameinstructor = time()."_".$fileinstructor->getClientOriginalName();
        // //     $destinasi = env('CDN_URL').'instructor/'; 
        // //     $fileinstructor->move($destinasi, $nameinstructor);
        // // }

        // if($request->hasFile('demo')){
        //     $demo = $request->file('demo');
        //     $demo_file = time()."_".$demo->getClientOriginalName();
        //     $destinasi = env('CDN_URL').'demo/'; 
        //     $demo->move($destinasi, $demo_file);
        // }

        // $save_class = new Classes;
        // $save_class->name = $request->name;
        // $save_class->slug =  $slug = Str::slug($request->name, '-');
        // $save_class->idcategories = $request->idcategories;
        // $save_class->tutor = $request->tutor;
        // $save_class->instructor = $request->instructor;
        // $save_class->roleinstructor = $request->roleinstructor;
        // $save_class->price = $request->price;
        // $save_class->rating = $request->rating;
        // $save_class->duration = $request->duration;
        // $save_class->description = $request->description;
        // $save_class->images = $filename;
        // // $save_class->imagesinstructor = $nameinstructor;
        // $save_class->images = $filename;
        // $save_class->demo = $demo_file;
        // $save_class->save();
        // return $save_class;

        // return redirect('lecture/class/detail/'.$save_class->idclass);


        $request->validate([
            'name' => 'required',
            'tutor' => 'required',
            'description' => 'required',
            'images' => 'required|file|mimes:jpg,jpeg,png|max:50000',
            'demo' => 'required|file|mimes:mp4',
        ]);

        $getsize = filesize($request->file('demo'));
        if ($getsize > 31500000) {
            return redirect()->back()->with('status_error','Demo video is too large');
        }
     
        if($request->hasFile('images')){
            $file = $request->file('images');
            $filename = time()."_".$file->getClientOriginalName();
            $destinasi = env('CDN_URL').'image/'; 
            $file->move($destinasi, $filename);
        }

        if($request->hasFile('demo')){
            $demo = $request->file('demo');
            $demo_file = time()."_".$demo->getClientOriginalName();
            $destinasi = env('CDN_URL').'demo/'; 
            $demo->move($destinasi, $demo_file);
        }

        $save_class = new Classes;
        $save_class->idcategories = $request->idcategories;
        $save_class->name = $request->name;
        $save_class->tutor = $request->tutor;
        $save_class->description = $request->description;
        $save_class->images = $filename;
        $save_class->demo = $demo_file;
        $save_class->save();

        // return redirect('class/detail/'.$save_class->idclass);
                return redirect('lecture/class/detail/'.$save_class->idclass);

    }

    public function class_detail(Classes $class)
    {

        $classes = Classes::with([
                        'subclass',
                        'hilights'
                        ])
                        ->where('idclass',$class->idclass)
                        ->first();
        $contents = [
            'classes' => $classes,
            'class' => $class
        ];
        
        $pagecontent = view('contents.class.detail', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Class',
            'menu' => 'lecture',
            'submenu' => 'class',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function addsubclass(Classes $class, Request $request)
    {
        $heads = $request->headmateri;
        for ($i=0; $i < count($heads); $i++) { 
            if (empty($heads[$i])) {
                return redirect()->back()->with('status_error', 'Add Sub Class Not Empty');
            }
        }

        for ($i=0; $i < count($heads); $i++) { 
            $save_subclass = new Subclass;
            $save_subclass->idclass = $class->idclass;
            $save_subclass->headmateri = $heads[$i];
            $save_subclass->save();
        }

        return redirect('lecture/class/detail/'.$class->idclass);
    }

    public function addhilights(Classes $class, Request $request)
    {
        $heads = $request->namehilights;
        for ($i=0; $i < count($heads); $i++) { 
            if (empty($heads[$i])) {
                return redirect()->back()->with('status_error', 'Add Hilights Not Empty');
            }
        }

        for ($i=0; $i < count($heads); $i++) { 
            $saveHilights = new Hilights;
            $saveHilights->idclass = $class->idclass;
            $saveHilights->namehilights = $heads[$i];
            $saveHilights->save();
        }

        return redirect('lecture/class/detail/'.$class->idclass);
    }

    public function addmateries(Classes $class, Request $request)
    {
        
        // keterangan validate required not null
        if (empty($request->name_materies)) {
            return redirect()->back()->with('status_error', 'name materies is required ');
        }
        // validate extension 
        for ($i=0; $i < count($request->video_480); $i++) {
            if($request->video_480[$i]->getClientOriginalExtension() != 'mp4'){
                return redirect()->back()->with('status_error', 'Video 480 Extension must MP4');
            }
            if($request->video_720[$i]->getClientOriginalExtension() != 'mp4'){
                return redirect()->back()->with('status_error', 'Video 720 Extension must MP4');
            }
            if (empty($request->video_480[$i]) || empty($request->video_720[$i])   ) {
                return redirect()->back()->with('status_error', 'Video 480 and 720 is required');
            }
        }

        for ($i=0; $i < count($request->name_materies) ; $i++) { 

            $name_480 = Str::random(20)."_".$request->file('video_480')[$i]->getClientOriginalName();
            $path_480 = env('CDN_URL').'video480/'; 
            $request->file('video_480')[$i]->move($path_480, $name_480);

            $name_720 = Str::random(20)."_".$request->file('video_720')[$i]->getClientOriginalName();
            $path_720 = env('CDN_URL').'video720/'; 
            $request->file('video_720')[$i]->move($path_720, $name_720);

            $save_materies = new Materies;
            $save_materies->idsubclass = $request->add_idsubclass;
            $save_materies->name_materi = $request->name_materies[$i];
            $save_materies->slug =  $slug = Str::slug($request->name_materies[$i], '-');
            $save_materies->video480 = $name_480;
            $save_materies->video720 = $name_720;
            $save_materies->save();

        }

        return redirect('lecture/class/detail/'.$class->idclass)->with('status_success','Successfuly Add Materies');
    }

    public function viewmateries(Classes $class,SubClass $subcls)
    {   
        $subclass = Subclass::with([
                        'class_belong',
                        'materies'
                    ])
                    ->where('idsubclass',$subcls->idsubclass)
                    ->first();

        return response()->json(array('subclass'=> $subclass), 200);

    }
   
    public function delete_materies(Classes $class,Materies $materies)
    {
        $materies = Materies::find($materies->idmateries);

        if (!empty($materies->video480)) {
            $path_video480 = env('CDN_URL').'video480/'.$materies->video480; 
            if(File::exists($path_video480)){
                File::delete($path_video480); 
            }
        }

        if (!empty($materies->video720)) {
            $path_video720 = env('CDN_URL').'video720/'.$materies->video720; 
            if(File::exists($path_video720)){
                File::delete($path_video720); 
            }
        }

        $materies->delete();
        return response()->json(array('materies'=> $materies), 200);

    }
}
