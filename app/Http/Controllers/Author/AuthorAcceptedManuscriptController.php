<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Models\AcceptedManuscript;
use App\Http\Controllers\Controller;

class AuthorAcceptedManuscriptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acceptedmanuscripts = AcceptedManuscript::all();
        return view('author.acceptedmanuscript.index', compact('acceptedmanuscripts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function shows($id)
    {
        $data = AcceptedManuscript::find($id);
        return view('author.acceptedmanuscript.shows')->with('data', $data);

    }

    public function downloadss(Request $request, $file)
    {
        return response()->download(public_path('accepted_manuscript_storages/'.$file));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcceptedManuscript $acceptedmanuscripts)
    {
        $acceptedmanuscripts->delete();

        return back()->with('message', 'Accepted Manuscript has been deleted successfully.');
    }
}
