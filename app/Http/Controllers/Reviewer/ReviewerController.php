<?php

namespace App\Http\Controllers\Reviewer;

use App\Models\Reviewer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Stroage;

class ReviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviewers = Reviewer::all();
        return view('reviewer.details.index', compact('reviewers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reviewer.details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rev_fname = $request->rev_fname;
		$rev_lname = $request->rev_lname;
		$rev_email = $request->rev_email;
        $rev_affiliation = $request->rev_affiliation;
        $rev_address = $request->rev_address;
        $file = $request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();

        $request->file->move('profiles', $filename);

        $data = new Reviewer;

        $data->rev_fname = $rev_fname;
        $data->rev_lname = $rev_lname;
        $data->rev_email = $rev_email;
        $data->rev_affiliation = $rev_affiliation;
        $data->rev_address = $rev_address;
        $data->file = $filename;
        $data->user_id = auth()->user()->id;

        $data->save();
        return to_route('reviewer.details.index')->with('message', 'Reviewer Infromation has been Updated Successfully!');
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
    public function destroy(Reviewer $reviewer)
    {
        $reviewer->delete();

        return back()->with('message', 'Reviewer has been deleted successfully.');
    }
}
