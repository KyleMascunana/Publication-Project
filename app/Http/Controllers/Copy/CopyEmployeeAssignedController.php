<?php

namespace App\Http\Controllers\Copy;

use App\Models\User;
use App\Models\Employee;
use App\Models\Manuscript;
use Illuminate\Http\Request;
use App\Models\EmployeeAssigned;
use App\Http\Controllers\Controller;

class CopyEmployeeAssignedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeassigned = EmployeeAssigned::all();
        return view('copyeditor.employeeassigned.index', compact('employeeassigned'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $manuscripts = Manuscript::all();
        $users = User::all();
        return view('copyeditor.employeeassigned.create', compact('manuscripts', 'users', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emp_id = $request->emp_id;
		$manu_id = $request->manu_id;
		$manuscript_id = $request->manuscript_id;
        $user_id = $request->user_id;
        $emp_username = $request->emp_username;
        $description = $request->description;
        $file = $request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();

        $request->file->move('employee_storages', $filename);

        $data = new EmployeeAssigned;

        $data->emp_id = $emp_id;
        $data->manu_id = $manu_id;
        $data->manuscript_id = $manuscript_id;
        $data->user_id = $user_id;
        $data->emp_username = $emp_username;
        $data->description = $description;
        $data->file = $filename;

        $data->save();
        return to_route('copyeditor.employeeassigned.index')->with('message', 'Manuscript has been sent to be reviewed!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function download(Request $request, $file)
    {
        return response()->download(public_path('employee_storages/'.$file));
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
    public function destroy(EmployeeAssigned $employeeassigned)
    {
        $employeeassigned->delete();

        return back()->with('message', 'Employee Manuscript has been deleted successfully.');
    }
}
