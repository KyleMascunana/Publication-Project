<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\AuthorManuscript;
use App\Models\Manuscript;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorManuscriptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authormanuscripts = AuthorManuscript::all();
        return view('author.coauthors.index', compact('authormanuscripts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $manuscripts = Manuscript::all();
        $authors = Author::all();
        return view('author.coauthors.create', compact('manuscripts', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $au_id = $request->au_id;
        $manu_id = $request->manu_id;
		$manuscript_id = $request->manuscript_id;
		$au_manu_Lname = $request->au_manu_Lname;
        $au_manu_email = $request->au_manu_email;
        $au_manu_affiliation = $request->au_manu_affiliation;

        $data = new AuthorManuscript;

        $data->au_id = $au_id;
        $data->manu_id = $manu_id;
        $data->manuscript_id = $manuscript_id;
        $data->au_manu_Lname = $au_manu_Lname;
        $data->au_manu_email = $au_manu_email;
        $data->au_manu_affiliation = $au_manu_affiliation;
        $data->user_id = auth()->user()->id;

        $data->save();

        return to_route('author.details.index')->with('message', 'Co-Author Infromation has been Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy($id)
    {
        $authormanuscripts = AuthorManuscript::where('id', $id)->first();

        $authormanuscripts->delete();

        return back()->with('message', 'Co author has been deleted successfully.');
    }

}
