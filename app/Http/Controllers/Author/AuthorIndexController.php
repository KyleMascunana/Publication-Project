<?php

namespace App\Http\Controllers\Author;

use App\Models\Manuscript;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReviewedStatus;

class AuthorIndexController extends Controller
{
    public function index()
    {
        $manuscripts  = Manuscript::all();

        $totalManuscripts = Manuscript::count();
        $manuscriptstatus = ReviewedStatus::count();


        return view('author.index', compact( 'totalManuscripts', 'manuscriptstatus'));
    }
}
