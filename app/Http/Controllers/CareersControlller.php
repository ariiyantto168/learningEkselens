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
        
        $pagecontent = view('contents.trandings.careers.index', $contents);

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
        
        $pagecontent = view('contents.trandings.careers.create', $contents);

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

    public function update_page(Careers $careers)
    {

        $contents = [
            'classes' => Classes::all(),
            'careers' => Careers::find($careers->idcareers)
        ];

        // return $content;

        $pagecontent = view('contents.trandings.careers.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Update Career Ready Program',
            'menu' => 'trandings',
            'submenu' => 'careers',
            'pagecontent' => $pagecontent
        );

        return view('contents.masterpage', $pagemain);
    }

    public function update_save(Request $request,Careers $careers)
    {

        // $request->validate([
        //     'name' => 'required',
        // ]);

         
            $updateCareers = Careers::find($careers->idcareers);
            $updateCareers->name = $request->name;
            $updateCareers->idclass = $request->idclass;
            $updateCareers->save();
            return redirect('trandings/careers');
            // return redirect('categories')->with('status_success','Update categories');
    }

    public function delete(Careers $careers)
    {
       $deleteCar = Careers::find($careers->idcareers);
       $deleteCar->delete();
       return redirect('trandings/careers')->with('status_success','Successfuly Delete Careers');
    }
    
}
