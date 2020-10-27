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
}
