<?php

namespace App\Http\Controllers\Reviewer;

use App\Models\Comment;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReviewerManuscript;

class ReviewerIndexController extends Controller
{
    public function index()
    {
        $reviewers = Reviewer::all();
        $totalComments = Comment::count();
        $totalManuscriptSent = ReviewerManuscript::count();
        return view('reviewer.index', compact('reviewers', 'totalComments', 'totalManuscriptSent'));
    }
}
