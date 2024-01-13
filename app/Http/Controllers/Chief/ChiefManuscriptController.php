<?php

namespace App\Http\Controllers\Chief;

use App\Models\Author;
use App\Models\Manuscript;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AuthorManuscript;
use App\Http\Controllers\Controller;

class ChiefManuscriptController extends Controller
{
    public function index()
    {
        $manuscripts = Manuscript::all();
        $authormanuscripts = AuthorManuscript::all();
        return view('chief.manuscripts.index', compact('manuscripts', 'authormanuscripts'));
    }

    public function download(Request $request, $file)
    {
        return response()->download(public_path('storages/'.$file));
    }

    public function destroy(Manuscript $manuscript)
    {
        $manuscript->delete();

        return back()->with('message', 'Manuscript has been deleted successfully.');
    }

    public function show($id)
    {
        $data = Manuscript::find($id);
        return view('chief.manuscripts.view')->with('data', $data);

    }
}
