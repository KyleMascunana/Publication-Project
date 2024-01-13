<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuthorController extends Controller
{
    public function index()
    {

        $authors = Author::all();
        return view('admin.details.index', compact('authors'));
    }

}
