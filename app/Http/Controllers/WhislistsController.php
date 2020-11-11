<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whislists;
use Illuminate\Support\Str;

class WhislistsController extends Controller
{
    public function index()
    {
        $contents = [
            'whislists' => Whislists::all()
        ];

        // return $contents;
        
        $pagecontent = view('contents.class.whislists.index', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'My whislists',
            'menu' => 'lecture',
            'submenu' => 'whislists',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

    public function create_page()
    {
        $content = [
        ];
        $pagecontent = view('contents.class.whislists.create', $content);

    	//masterpage
        $pagemain = array(
            'title' => 'My whislists',
            'menu' => 'lecture',
            'submenu' => 'whislists',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }

}
