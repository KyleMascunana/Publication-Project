<?php

namespace App\Http\Controllers\Chief;

use App\Models\User;
use App\Models\Reviewer;
use App\Models\Manuscript;
use Illuminate\Http\Request;
use App\Models\ReviewerAssigned;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class ChiefEditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manuscripts  = Manuscript::all();
        $notifications = auth()->user()->unreadNotifications;
        $roles = Role::all();

        $totalManuscripts = Manuscript::count();
        $totalRolesCount = User::role('reviewer')->count();
        $totalreviewerassigned = ReviewerAssigned::count();
        $totalReviewers = Reviewer::count();
        return view('chief.index', compact('totalManuscripts',
        'totalRolesCount', 'totalreviewerassigned', 'totalReviewers'));
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
    public function destroy(string $id)
    {
        //
    }
}
