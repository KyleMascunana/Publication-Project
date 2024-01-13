<?php

namespace App\Http\Controllers\Copy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CopyEditorController extends Controller
{
    public function index()
    {
        return view('copyeditor.index');
    }
}
