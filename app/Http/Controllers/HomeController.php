<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $contents = [
            'users' => User::all(),
        ];
        
        $pagecontent = view('contents.home.index', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Home',
            'menu' => 'home',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }
}
