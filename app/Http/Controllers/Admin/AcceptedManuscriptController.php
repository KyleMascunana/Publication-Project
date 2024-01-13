<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Employee;
use App\Models\Manuscript;
use Illuminate\Http\Request;
use App\Models\ReviewedStatus;
use App\Models\AcceptedManuscript;
use App\Http\Controllers\Controller;

class AcceptedManuscriptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acceptedmanuscripts = AcceptedManuscript::all();
        return view('admin.acceptedmanuscript.index', compact('acceptedmanuscripts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $reviewedstatus = ReviewedStatus::all();
        $manuscripts = Manuscript::all();
        $users = User::all();
        return view('admin.acceptedmanuscript.create', compact('employees', 'reviewedstatus', 'manuscripts', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emp_id = $request->emp_id;
        $emp_username = $request->emp_username;
        $emp_email = $request->emp_email;
        $rev_stat_id = $request->rev_stat_id;
        $rev_stat_status = $request->rev_stat_status;
        $manu_id = $request->manu_id;
        $manuscript_id = $request->manuscript_id;
        $user_id = $request->user_id;
        $file = $request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();

		        $request->file->move('storages', $filename);

        $data = new AcceptedManuscript;

        $data->emp_id = $emp_id;
        $data->emp_username = $emp_username;
        $data->emp_email = $emp_email;
        $data->rev_stat_id = $rev_stat_id;
        $data->rev_stat_status = $rev_stat_status;
        $data->manu_id = $manu_id;
        $data->manuscript_id = $manuscript_id;
        $data->user_id = $user_id;
        $data->file = $file;

        $data->save();
        return to_route('admin.acceptedmanuscript.index')->with('message', 'Manuscript "STATUS" has been Updated Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = AcceptedManuscript::find($id);
        return view('admin.acceptedmanuscript.view')->with('data', $data);

    }

    public function download(Request $request, $file)
    {
        return response()->download(public_path('accepted_manuscript_storages/'.$file));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $acceptedmanuscript = AcceptedManuscript::find($id);
        return view('admin.acceptedmanuscript.edit', compact('acceptedmanuscript'));
    }

    public function update(Request $request, $id)
    {
        $acceptedmanuscript = AcceptedManuscript::find($id);

        $acceptedmanuscript->rev_stat_status = $request->input('rev_stat_status');

        $acceptedmanuscript->update();

        return to_route('admin.acceptedmanuscript.index')->with('message', 'Accepted Manuscript has been Updated Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcceptedManuscript $acceptedmanuscript)
    {
        $acceptedmanuscript->delete();

        return back()->with('message', 'Accepted Manuscript has been deleted successfully.');
    }
}
