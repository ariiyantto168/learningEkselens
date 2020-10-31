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
            'classes' => Classes::with(['categories'])->get(),
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

        $request->validate([
            'name' => 'required',
            'tutor' => 'required',
            'description' => 'required',
            'images' => 'required|file|mimes:jpg,jpeg,png|max:50000',
            'imagesinstructor' => 'required|file|mimes:jpg,jpeg,png|max:50000',
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

        if($request->hasFile('imagesinstructor')){
            $file = $request->file('imagesinstructor');
            $fileins = time()."_".$file->getClientOriginalName();
            $destinasi = env('CDN_URL').'instructor/'; 
            $file->move($destinasi, $fileins);
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
        $save_class->slug =  $slug = Str::slug($request->name, '-');
        $save_class->tutor = $request->tutor;
        $save_class->instructor = $request->instructor;
        $save_class->roleinstructor = $request->roleinstructor;
        $save_class->price = $request->price;
        $save_class->rating = $request->rating;
        $save_class->duration = $request->duration;
        $save_class->description = $request->description;
        $save_class->images = $filename;
        $save_class->imagesinstructor = $fileins;
        $save_class->demo = $demo_file;
        $save_class->save();

        // return redirect('class/detail/'.$save_class->idclass);
        return redirect('lecture/class/detail/'.$save_class->idclass)->with('status_success','Successfuly Add Kelas Lanjutkan Mengisi Data Sub Kelas, Data Materi Kelas dan Hilights kelas');

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

        return redirect('lecture/class/detail/'.$class->idclass)->with('status_success','Successfuly Add Subclass Lanjutkan Membuat Materi Kelas');
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

        return redirect('lecture/class/detail/'.$class->idclass)->with('status_success','Successfuly Add Hilights Kelas');
    }

    public function addmateries(Classes $class, Request $request)
    {
        $request->validate([
            'name_materies' => 'required',
            'video_480' => 'required',
            'video_720' => 'required',
        ]);
       
        
        // keterangan validate required not null
        if (empty($request->name_materies)) {
            return redirect()->back()->with('status_error', 'name materies is required ');
        }elseif (empty($request->video_480)) {
            return redirect()->back()->with('status_error', 'video 480 is required ');
        }elseif (empty($request->video_720)) {
            return redirect()->back()->with('status_error', 'video 720 is required ');
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

            $size480 = filesize($request->file('video_480')[$i]);
            if ($size480 > 31500000) {
                return redirect()->back()->with('status_error','video 480 video is to large maximum 30 mb');
            }

            $size720 = filesize($request->file('video_720')[$i]);
            if ($size720 > 51500000) {
                return redirect()->back()->with('status_error','video 720 video is too large maximum 50 mb');
            }


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
            $save_materies->video_480 = $name_480;
            $save_materies->video_720 = $name_720;
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

    // Edit Subclass
    public function update_subclass(SubClass $subclass)
    {
        $contents = [
            'subclass' => Subclass::find($subclass->idsubclass)
        ];

        // return $contents;

        $pagecontent = view('contents.class.subclass.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Subclass',
            'menu' => 'lecture',
            'submenu' => 'class',
            'pagecontent' => $pagecontent
        );

        return view('contents.masterpage', $pagemain);
    }
    // Close Edit Subclass

    // update save subclass
    public function update_subclass_save(SubClass $subclass, Request $request)
    {
        $save_subclass = Subclass::find($subclass->idsubclass);
        $save_subclass->idclass = $save_subclass->idclass;
        $save_subclass->headmateri = $request->headmateri;
        $save_subclass->save();
        // return $save_subclass;
        return redirect('lecture/class/detail/'.$subclass->idclass)->with('status_success','Successfuly Updated Subclass');
    }
    // close update save subclass


    // Edit Subclass
    public function update_hilights(Hilights $hilights)
    {
        $contents = [
            'hilights' => Hilights::find($hilights->idhilights)
        ];

        // return $contents;

        $pagecontent = view('contents.class.hilights.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Updated Hilights',
            'menu' => 'lecture',
            'submenu' => 'class',
            'pagecontent' => $pagecontent
        );

        return view('contents.masterpage', $pagemain);
    }
    // Close Edit Subclass

        // update save subclass
        public function update_hilights_save(Hilights $hilights, Request $request)
        {
            $updateHilights = Hilights::find($hilights->idhilights);
            $updateHilights->idclass = $updateHilights->idclass;
            $updateHilights->namehilights = $request->namehilights;
            $updateHilights->save();
            // return $save_subclass;
            return redirect('lecture/class/detail/'.$hilights->idclass)->with('status_success','Successfuly Updated HIlights');
        }
        // close update save subclass

    // delete subclass
    public function delete_subclass(SubClass $subclass)
    {
        // $deleteSubclass = Subclass::find($subclass->idsubclass);
        

        // $deleteSubclass->delete();
        // return redirect('lecture/class/detail/'.$subclass->idclass)->with('status_success','Successfuly Delete');

        $deleteSubclass = Subclass::with(['materies'])
                          ->where('idsubclass',$subclass->idsubclass)
                          ->first();
        // return $deleteSubclass;
        $data_subclass = [];
        foreach($deleteSubclass->materies as $materi)
        {
            $data_subclass = $materi->idmateries;
        }
        $deleteSubclass->materies()->detach($data_subclass);
        $deleteSubclass->delete();
        return $deleteSubclass;
        return redirect('lecture/class/detail/'.$subclass->idclass)->with('status_success','Successfuly Delete');
    }

}
