<?php

namespace App\Http\Controllers\Reviewer;

use App\Models\User;
use App\Models\Comment;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewerCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $comments = Comment::all();
        return view('reviewer.comments.index', compact('comments', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reviewers = Reviewer::all();
        return view('reviewer.comments.create', compact('reviewers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rev_id = $request->rev_id;
        $com_rev_fname = $request->com_rev_fname;
        $com_rev_lname = $request->com_rev_lname;
        $com_comment = $request->com_comment;
        $com_status = $request->com_status;
        $file = $request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();

        $request->file->move('comment_storages', $filename);

        $data = new Comment;

        $data->rev_id = $rev_id;
        $data->com_rev_fname = $com_rev_fname;
        $data->com_rev_lname = $com_rev_lname;
        $data->com_comment = $com_comment;
        $data->com_status = $com_status;
        $data->file = $filename;
        $data->user_id = auth()->user()->id;

        $data->save();
        return to_route('reviewer.comments.index')->with('message', 'Comments has been sent Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function showz($id)
    {
        $data = Comment::find($id);
        return view('reviewer.comments.view')->with('data', $data);

    }

    public function downloadz(Request $request, $file)
    {
        return response()->download(public_path('comment_storages/'.$file));
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
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('message', 'Comment has been deleted successfully.');
    }
}
