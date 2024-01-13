<?php

namespace App\Http\Controllers\Reviewer;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\ReviewerManuscript;
use App\Http\Controllers\Controller;

class ReviewerManuscriptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviewermanuscripts = ReviewerManuscript::all();
        $comments = Comment::all();
        return view('reviewer.reviewermanuscripts.index', compact('reviewermanuscripts', 'comments'));
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
    public function download(Request $request, $file)
    {
        return response()->download(public_path('reviewer_storages/'.$file));
    }

    public function show($id)
    {
        $data = ReviewerManuscript::find($id);
        return view('reviewer.reviewermanuscripts.view')->with('data', $data);

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
