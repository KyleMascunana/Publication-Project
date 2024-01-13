<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        $roles = Role::all();
        $users = User::all();
        return view('admin.employees.index', compact('users', 'roles', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'emp_username' => 'required',
            'emp_email' => 'required',
            'emp_fname' => 'required',
            'emp_lname' => 'required',
            'emp_role' => 'required',
            'emp_affiliation' => 'required',
            'emp_address' => 'required',
            'emp_contact' => 'required',
        ]);

        Employee::create([
            'emp_username' => request('emp_username'),
            'emp_email' => request('emp_email'),
            'emp_fname' => request('emp_fname'),
            'emp_lname' => request('emp_lname'),
            'emp_role' => request('emp_role'),
            'emp_affiliation' => request('emp_affiliation'),
            'emp_address' => request('emp_address'),
            'emp_contact' => request('emp_contact'),
            'user_id' => Auth::user()->id
        ]);


        return to_route('admin.employees.index')->with('message', 'Employee Infromation has been Updated Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
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
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return back()->with('message', 'Employee has been deleted successfully.');
    }
}
