<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $roles = Role::all();
        $users = User::all();
        return view('artist.employees.index', compact('users', 'roles', 'employees'));
    }

    public function create()
    {
        return view('artist.employees.create');
    }

    public function store(Request $request)
    {
        $emp_username = $request->emp_username;
        $emp_fname = $request->emp_fname;
		$emp_lname = $request->emp_lname;
		$emp_email = $request->emp_email;
        $emp_role = $request->emp_role;
        $emp_affiliation = $request->emp_affiliation;
        $emp_address = $request->emp_address;
        $emp_contact = $request->emp_contact;
        $file = $request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();

        $request->file->move('profiles', $filename);

        $data = new Employee;

        $data->emp_username = $emp_username;
        $data->emp_fname = $emp_fname;
        $data->emp_lname = $emp_lname;
        $data->emp_email = $emp_email;
        $data->emp_role = $emp_role;
        $data->emp_affiliation = $emp_affiliation;
        $data->emp_address = $emp_address;
        $data->file = $filename;
        $data->emp_contact = $emp_contact;
        $data->user_id = auth()->user()->id;

        $data->save();
        return to_route('artist.employees.index')->with('message', 'Layout Artist Infromation has been Updated Successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return back()->with('message', 'Layout Artist has been deleted successfully.');
    }
}

