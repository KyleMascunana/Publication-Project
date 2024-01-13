<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReviewerManuscript;
use Illuminate\Http\Request;

class AdminReviewerManuscriptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviewermanuscripts = ReviewerManuscript::all();
        return view('admin.reviewermanuscript.index', compact('reviewermanuscripts'));
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
    public function destroy(ReviewerManuscript $reviewermanuscript)
    {
        $reviewermanuscript->delete();

        return back()->with('message', 'Reviewer Manuscript has been deleted successfully.');
    }
}
