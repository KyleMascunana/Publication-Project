<?php

namespace App\Http\Controllers\Author;

use App\Models\User;
use App\Helpers\Helper;
use App\Models\Manuscript;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\AuthorManuscript;

class ManuscriptController extends Controller
{
    public function index()
    {
        $user = User::all();
        $roles = Role::all();
        $manuscripts = Manuscript::all();
        $authormanuscripts = AuthorManuscript::all();
        return view('author.manuscripts.index', compact('manuscripts', 'roles', 'authormanuscripts'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('author.manuscripts.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $au_fname = $request->au_fname;
        $au_lname = $request->au_lname;
        $au_email = $request->au_email;
        $cover_letter = $request->cover_letter;
        $manu_type = $request->manu_type;
		$manu_title = $request->manu_title;
		$manu_file_type = $request->manu_file_type;
        $file = $request->file;
        $manu_abstract = $request->manu_abstract;

	        $filename=time().'.'.$file->getClientOriginalExtension();

		        $request->file->move('storages', $filename);

        $manuscript_id = Helper::IDGenerator(new Manuscript, 'manuscript_id', 5, 'JEAR');

        $data = new Manuscript;

        $data->au_fname = $au_fname;
        $data->au_lname = $au_lname;
        $data->au_email = $au_email;
        $data->cover_letter = $cover_letter;
        $data->manuscript_id = $manuscript_id;
        $data->manu_type = $manu_type;
        $data->manu_title = $manu_title;
        $data->manu_file_type = $manu_file_type;
        $data->file = $filename;
        $data->user_id = auth()->user()->id;
        $data->manu_abstract = $manu_abstract;

        $data->save();
        return to_route('author.coauthors.create')->with('message', 'Manuscript has been Uploaded Successfully!');
    }

    public function download(Request $request, $file)
    {
        return response()->download(public_path('storages/'.$file));
    }

    public function show($id)
    {
        $data = Manuscript::find($id);
        return view('author.manuscripts.view', compact('data'));

    }

    public function edit($id)
    {
        $manuscript = Manuscript::find($id);
        return view('author.manuscripts.edit', compact('manuscript'));
    }

    public function update(Request $request, $id)
    {
        $manuscript = Manuscript::find($id);

        $manuscript->au_fname = $request->input('au_fname');
        $manuscript->au_lname = $request->input('au_lname');
        $manuscript->au_email = $request->input('au_email');
        $manuscript->cover_letter = $request->input('cover_letter');
        $manuscript->manu_type = $request->input('manu_type');
        $manuscript->manu_title = $request->input('manu_title');
        $manuscript->manu_file_type = $request->input('manu_file_type');
        $manuscript->manu_abstract = $request->input('manu_abstract');

        $manuscript->update();

        return to_route('author.manuscripts.index')->with('message', 'Manuscript has been Updated Successfully!');
    }

    public function destroy(Manuscript $manuscript)
    {
        if($manuscript->trashed()){
            $manuscript->forceDelete();
            return to_route('author.details.index')->with('message', 'Manuscript has been Deleted Permanently!');
        }

        $manuscript->delete();

        return back()->with('message', 'Manuscript has been withdrawn successfully.');
    }

    public function archive()
    {
        $manuscripts = Manuscript::onlyTrashed()->get();

        return view('author.manuscripts.archive', compact('manuscripts'));
    }

    public function restore(Manuscript $manuscript)
    {
        $manuscript->restore();

        return to_route('author.details.index')->with('message', 'Manuscript has been Restored Successfully!');
    }




}
