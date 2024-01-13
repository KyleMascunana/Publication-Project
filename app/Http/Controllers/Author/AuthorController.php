<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\AuthorManuscript;
use App\Models\Manuscript;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        $authormanuscripts = AuthorManuscript::all();
        $manuscripts = Manuscript::all();
        return view('author.details.index', compact('authors', 'authormanuscripts', 'manuscripts'));
    }

    public function create()
    {
        $manuscripts = Manuscript::all();
        $authors = Author::all();
        return view('author.details.create', compact('manuscripts', 'authors'));
    }

    public function store(Request $request)
    {
        $au_fname = $request->au_fname;
		$au_lname = $request->au_lname;
		$au_email = $request->au_email;
        $au_affiliation = $request->au_affiliation;
        $au_address = $request->au_address;
        $file = $request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();

        $request->file->move('profiles', $filename);

        $data = new Author;

        $data->au_fname = $au_fname;
        $data->au_lname = $au_lname;
        $data->au_email = $au_email;
        $data->au_affiliation = $au_affiliation;
        $data->au_address = $au_address;
        $data->file = $filename;
        $data->user_id = auth()->user()->id;

        $data->save();
        return to_route('author.manuscripts.create')->with('message', 'Author Infromation has been Updated Successfully!');
    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('author.details.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        $author->au_fname = $request->input('au_fname');
        $author->au_lname = $request->input('au_lname');
        $author->au_affiliation = $request->input('au_affiliation');
        $author->au_address = $request->input('au_address');

        $author->update();

        return to_route('author.details.index')->with('message', 'Manuscript has been Updated Successfully!');
    }


    public function destroy(Author $author)
    {
        $author->delete();

        return back()->with('message', 'Author has been deleted successfully.');
    }

}
