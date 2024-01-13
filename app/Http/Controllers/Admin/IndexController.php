<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Author;
use App\Models\Employee;
use App\Models\Manuscript;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Reviewer;
use App\Models\ReviewerAssigned;

class IndexController extends Controller
{

    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        $roles = Role::all();

        $totalnotifications = auth()->user()->unreadNotifications->count();
        $totalAllUsers = User::count();
        $totalAuthors = User::role('author')->count();
        $totalRoles = Role::count();

        return view('admin.index', compact( 'totalAllUsers', 'totalAuthors', 'notifications', 'totalnotifications','totalRoles'));
    }

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }

}
