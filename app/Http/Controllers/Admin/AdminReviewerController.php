<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Author;
use App\Models\Reviewer;
use App\Models\Manuscript;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReviewerManuscript;

class AdminReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviewers = Reviewer::all();
        return view('admin.reviewers.index', compact('reviewers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reviewers = Reviewer::all();
        $manuscripts = Manuscript::all();
        $authors = Author::all();
        $users = User::all();
        return view('admin.reviewers.create', compact('manuscripts', 'authors', 'users', 'reviewers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rev_id = $request->rev_id;
		$manu_id = $request->manu_id;
		$manuscript_id = $request->manuscript_id;
        $user_id = $request->user_id;
        $description = $request->description;
        $file = $request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();

        $request->file->move('reviewer_storages', $filename);

        $data = new ReviewerManuscript;

        $data->rev_id = $rev_id;
        $data->manu_id = $manu_id;
        $data->manuscript_id = $manuscript_id;
        $data->user_id = $user_id;
        $data->description = $description;
        $data->file = $filename;

        $data->save();
        return to_route('admin.reviewermanuscript.index')->with('message', 'Manuscript has been sent to be reviewed!');
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

}
