<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexLayoutController extends Controller
{
    public function index()
    {
        return view('artist.index');
    }
}
