<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
// use App\Models\Materies;

class CommentsController extends Controller
{
    public function index()
    {
        $contents = [
            // 'comments' => Classes::with('categories','subclass','materies','hilights')->get(),
            'comments' => Comments::all(),
        ];

        // return $contents;
        
        $pagecontent = view('contents.comments.index', $contents);

    	//masterpage
        $pagemain = array(
            'title' => 'Comments',
            'menu' => 'lecture',
            'submenu' => 'comments',
            'pagecontent' => $pagecontent,
        );

        return view('contents.masterpage', $pagemain);
    }
}
