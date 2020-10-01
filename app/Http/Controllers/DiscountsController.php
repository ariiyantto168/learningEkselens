<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discounts;

class DiscountsController extends Controller
{
    public function index()
    {
        $contents = [
            'discounts' => Discounts::all()
        ];

        // return $contents;
        
        $pagecontent = view('contents.discounts.index', $contents);

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
        $pagecontent = view('contents.discounts.create', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Created Discounts',
            'menu' => 'promotions',
            'submenu' => 'discounts',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }
}
