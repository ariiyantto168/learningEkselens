<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discounts;
use Illuminate\Support\Str;
use Image;
use File;

class DiscountsController extends Controller
{
    public function index()
    {
        $contents = [
            'discounts' => Discounts::all()
        ];

        // return $contents;
        
        $pagecontent = view('contents.promotions.discounts.index', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Discounts',
            'menu' => 'promotions',
            'submenu' => 'discounts',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_page()
    {
        $contents = [
        ];
        $pagecontent = view('contents.promotions.discounts.create', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Created Discounts',
            'menu' => 'promotions',
            'submenu' => 'discounts',
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
            $cdnpath =  env('CDN_URL').'discounts/';
            $images->move($cdnpath,$filename);
        }

        $saveDiscounts = new Discounts;
        $saveDiscounts->name = $request->name;
        $saveDiscounts->potongan = $request->potongan;
        $saveDiscounts->images = $filename;
        $saveDiscounts->slug =  $slug = Str::slug($request->name, '-');
        $saveDiscounts->save();
        return redirect('promotions/discounts');
    }

    public function update_page(Discounts $discounts)
    {
        $contents = [
            'discounts' => Discounts::find($discounts->iddiscounts)
        ];

        // return $content;

        $pagecontent = view('contents.promotions.discounts.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Update Discounts',
            'menu' => 'promotions',
            'submenu' => 'discounts',
            'pagecontent' => $pagecontent
        );

        return view('contents.masterpage', $pagemain);
    }

    public function update_save(Request $request,Discounts $discounts)
    {


        $filename = NULL;
        if (!empty($discounts->images)) {
            $path_image = env('CDN_URL').'discounts/'.$discounts->images; 
            if(File::exists($path_image)){
                $images = $request->file('images');
                $filename = Str::random(20).'.'.$images->getClientOriginalExtension();
                $cdnpath =  env('CDN_URL').'discounts/';
                $images->move($cdnpath,$filename);
            }
            File::delete($path_image);
        }

        $saveDiscounts = Discounts::find($discounts->iddiscounts);
        $saveDiscounts->name = $request->name;
        $saveDiscounts->potongan = $request->potongan;
        $saveDiscounts->images = $filename;
        $saveDiscounts->slug =  $slug = Str::slug($request->name, '-');
        // return $saveDiscounts;
        $saveDiscounts->save();
        return redirect('promotions/discounts');
    }
}
