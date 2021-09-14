<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
   }

    function show()
    {
        return view('admin.commentpage');
    }
}
