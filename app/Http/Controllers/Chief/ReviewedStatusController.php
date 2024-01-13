<?php

namespace App\Http\Controllers\Chief;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewedStatus;
use App\Models\Manuscript;
use App\Models\Author;
use App\Models\User;

class ReviewedStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviewedstatuses = ReviewedStatus::all();
        return view('chief.reviewedstatus.index', compact('reviewedstatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $manuscripts = Manuscript::all();
        $authors = Author::all();
        $users = User::all();
        return view('chief.reviewedstatus.create', compact('manuscripts', 'authors', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $manu_id = $request->manu_id;
        $manuscript_id = $request->manuscript_id;
        $au_id = $request->au_id;
        $au_fname = $request->au_fname;
        $au_lname = $request->au_lname;
        $user_id = $request->user_id;
        $rev_stat_status = $request->rev_stat_status;

        $data = new ReviewedStatus;

        $data->manu_id = $manu_id;
        $data->manuscript_id = $manuscript_id;
        $data->au_id = $au_id;
        $data->au_fname = $au_fname;
        $data->au_lname = $au_lname;
        $data->user_id = $user_id;
        $data->rev_stat_status = $rev_stat_status;

        $data->save();
        return to_route('chief.reviewedstatus.index')->with('message', 'Manuscript "STATUS" has been Updated Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReviewedStatus $reviewedstatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reviewedstatus = ReviewedStatus::find($id);
        return view('chief.reviewedstatus.edit', compact('reviewedstatus'));
    }

    public function update(Request $request, $id)
    {
        $reviewedstatus = ReviewedStatus::find($id);

        $reviewedstatus->rev_stat_status = $request->input('rev_stat_status');

        $reviewedstatus->update();

        return to_route('chief.reviewedstatus.index')->with('message', 'Manuscript "STATUS" has been Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReviewedStatus $reviewedstatus)
    {
        $reviewedstatus->delete();

        return back()->with('message', 'Status has been deleted successfully.');
    }
}
