<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kupons;
use App\Models\Classes;
use Illuminate\Support\Str;
use Image;
use File;


class KuponsController extends Controller
{
    public function index()
    {
        $contents = [
            'kupons' => Kupons::with('classes')->get(),
        ];

        // return $contents;
        
        $pagecontent = view('contents.promotions.kupons.index', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Kupons',
            'menu' => 'promotions',
            'submenu' => 'kupons',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_page()
    {
        $contents = [
            'classes' => Classes::all(),
        ];
        $pagecontent = view('contents.promotions.kupons.create', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Created Kupons',
            'menu' => 'promotions',
            'submenu' => 'kupons',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_save(Request $request)
    {
        // return $request->all();
        // $request->validate([
        //     'name' => 'required',
        // ]);
        $filename = NULL;
        if($request->has('images')){
            $images = $request->file('images');
            $filename = Str::random(20).'.'.$images->getClientOriginalExtension();
            $cdnpath =  env('CDN_URL').'promotions/kupons/';
            $images->move($cdnpath,$filename);
        }

        $saveKupons = new Kupons;
        $saveKupons->name = $request->name;
        $saveKupons->code = $request->code;
        $saveKupons->idclass = $request->idclass;
        $saveKupons->potongan = $request->potongan;
        $saveKupons->start_date = $request->start_date;
        $saveKupons->end_date = $request->end_date;
        $saveKupons->images = $filename;
        $saveKupons->slug =  $slug = Str::slug($request->name, '-');
        $saveKupons->save();
        return redirect('promotions/kupons');
    }

    public function update_page(Kupons $kupons)
    {
        $contents = [
            'classes' => Classes::all(),
            'kupons' => Kupons::find($kupons->idkupons)
        ];

        // return $content;

        $pagecontent = view('contents.promotions.kupons.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Update Kupons',
            'menu' => 'promotions',
            'submenu' => 'kupons',
            'pagecontent' => $pagecontent
        );

        return view('contents.masterpage', $pagemain);
    }

    public function update_save(Request $request,Kupons $kupons)
    {

        // $request->validate([
        //     'name' => 'required',
        //     'images' => 'required | max:200000',
        // ]);

        if (!empty($kupons->images)) {
            if (!empty($request->images)) {
                $path_image = env('CDN_URL').'promotions/kupons/'.$kupons->images; 
                if(File::exists($path_image)){
                    $images = $request->file('images');
                    $filename = Str::random(20).'.'.$images->getClientOriginalExtension();
                    $cdnpath =  env('CDN_URL').'promotions/kupons/';
                    $images->move($cdnpath,$filename);
                }
                File::delete($path_image);
                
            }else{
                $filename = $kupons->images;
            }
        }


        $saveKupons = Kupons::find($kupons->idkupons);
        $saveKupons->name = $request->name;
        $saveKupons->code = $request->code;
        $saveKupons->idclass = $request->idclass;
        $saveKupons->potongan = $request->potongan;
        $saveKupons->images = $filename;
        $saveKupons->slug =  $slug = Str::slug($request->name, '-');
        // return $saveDiscounts;
        $saveKupons->save();
        return redirect('promotions/kupons');
    }
}
