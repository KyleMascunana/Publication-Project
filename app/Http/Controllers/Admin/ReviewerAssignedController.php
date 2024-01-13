<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reviewer;
use App\Models\Manuscript;
use Illuminate\Http\Request;
use App\Models\ReviewerAssigned;
use App\Http\Controllers\Controller;
use App\Models\ReviewedStatus;
class ReviewerAssignedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviewerassigned = ReviewerAssigned::all();
        return view('admin.reviewerassigned.index', compact('reviewerassigned'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $manuscripts = Manuscript::all();
        $reviewers = Reviewer::all();
        $reviewedstatuses = ReviewedStatus::all();
        return view('admin.reviewerassigned.create', compact('manuscripts', 'reviewers', 'reviewedstatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rev_stat_id = $request->rev_stat_id;
        $manu_id = $request->manu_id;
        $rev_id = $request->rev_id;
        $rev_stat_status = $request->rev_stat_status;
        $manuscript_id = $request->manuscript_id;
        $rev_fname = $request->rev_fname;
        $rev_lname = $request->rev_lname;

        $data = new ReviewerAssigned;

        $data->rev_stat_id = $rev_stat_id;
        $data->manu_id = $manu_id;
        $data->rev_id = $rev_id;
        $data->rev_stat_status = $rev_stat_status;
        $data->manuscript_id = $manuscript_id;
        $data->rev_fname = $rev_fname;
        $data->rev_lname = $rev_lname;
        $data->save();
        return to_route('admin.reviewerassigned.index')->with('message', 'Reviewer has been assigned Successfully!');
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
    public function destroy(ReviewerAssigned $reviewerassigned)
    {
        $reviewerassigned->delete();

        return back()->with('message', 'Assigned Reviewer has been deleted successfully.');
    }
}
