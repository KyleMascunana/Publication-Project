<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Copy\CopyController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\Chief\CommentController;
use App\Http\Controllers\Layout\LayoutController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Copy\CopyEditorController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Author\ManuscriptController;
use App\Http\Controllers\Chief\ChiefEditorController;
use App\Http\Controllers\Reviewer\ReviewerController;
use App\Http\Controllers\Author\AuthorIndexController;
use App\Http\Controllers\Layout\IndexLayoutController;
use App\Http\Controllers\Admin\AdminReviewerController;
use App\Http\Controllers\Chief\ChiefReviewerController;
use App\Http\Controllers\Chief\ReviewedStatusController;
use App\Http\Controllers\Admin\AdminManuscriptController;
use App\Http\Controllers\Chief\ChiefManuscriptController;
use App\Http\Controllers\Chief\EmployeeAssignedController;
use App\Http\Controllers\Chief\ReviewerAssignedController;
use App\Http\Controllers\Reviewer\ReviewerIndexController;
use App\Http\Controllers\Author\AuthorManuscriptController;
use App\Http\Controllers\Chief\AcceptedManuscriptController;
use App\Http\Controllers\Reviewer\ReviewerCommentController;
use App\Http\Controllers\Copy\CopyEmployeeAssignedController;
use App\Http\Controllers\Author\AuthorReviewedStatusController;
use App\Http\Controllers\Reviewer\ReviewerManuscriptController;
use App\Http\Controllers\Admin\AdminReviewerManuscriptController;
use App\Http\Controllers\Chief\ChiefReviewerManuscriptController;
use App\Http\Controllers\Layout\LayoutEmployeeAssignedController;
use App\Http\Controllers\Author\AuthorAcceptedManuscriptController;
use App\Http\Controllers\Chief\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//ROUTE FOR ADMIN
Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/mark-as-read', [IndexController::class, 'markNotification'])->name('markNotification');

    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');

    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');

    Route::resource('/users', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');

    Route::get('/details', [AdminAuthorController::class, 'index'])->name('details.index');
    Route::delete('/details/{detail}', [AdminAuthorController::class, 'destroy'])->name('details.destroy');

    Route::get('/manuscripts', [AdminManuscriptController::class, 'index'])->name('manuscripts.index');
    Route::get('/download/{file}', [AdminManuscriptController::class, 'download'])->name('manuscripts.download');
    Route::delete('/manuscripts/{manuscript}', [AdminManuscriptController::class, 'destroy'])->name('manuscripts.destroy');
    Route::get('/view/{id}', [AdminManuscriptController::class, 'show'])->name('manuscripts.view');

    Route::resource('/employees', EmployeeController::class);

    Route::resource('/reviewedstatus', ReviewedStatusController::class);
    Route::get('edit/{id}', [ReviewedStatusController::class, 'edit'])->name('reviewedstatus.edit');
    Route::put('update/{id}', [ReviewedStatusController::class, 'update'])->name('reviewedstatus.update');

    Route::resource('/reviewers', AdminReviewerController::class);
    Route::resource('/reviewermanuscript', AdminReviewerManuscriptController::class);

    Route::resource('/reviewerassigned', ReviewerAssignedController::class);
    Route::resource('/activity', ActivityLogController::class);

    Route::resource('/comments', CommentController::class);
    Route::get('/downloadz/{file}', [CommentController::class, 'downloadz'])->name('comments.downloadz');
    Route::get('/showz/{id}', [CommentController::class, 'showz'])->name('comments.view');




});

//ROUTE FOR CHIEF EDITOR
Route::middleware(['auth', 'role:chief'])->name('chief.')->prefix('chief')->group(function(){
    Route::get('/', [ChiefEditorController::class, 'index'])->name('index');

    Route::resource('/comments', CommentController::class);
    Route::get('/downloadz/{file}', [CommentController::class, 'downloadz'])->name('comments.downloadz');
    Route::get('/showz/{id}', [CommentController::class, 'showz'])->name('comments.view');

    Route::get('/manuscripts', [ChiefManuscriptController::class, 'index'])->name('manuscripts.index');
    Route::get('/download/{file}', [ChiefManuscriptController::class, 'download'])->name('manuscripts.download');
    Route::delete('/manuscripts/{manuscript}', [ChiefManuscriptController::class, 'destroy'])->name('manuscripts.destroy');
    Route::get('/view/{id}', [ChiefManuscriptController::class, 'show'])->name('manuscripts.view');

    Route::resource('/reviewedstatus', ReviewedStatusController::class);
    Route::get('edit/{id}', [ReviewedStatusController::class, 'edit'])->name('reviewedstatus.edit');
    Route::put('update/{id}', [ReviewedStatusController::class, 'update'])->name('reviewedstatus.update');

    Route::resource('/acceptedmanuscript', AcceptedManuscriptController::class);
    Route::get('/downloads/{file}', [AcceptedManuscriptController::class, 'downloads'])->name('acceptedmanuscript.downloads');
    Route::get('/show/{id}', [AcceptedManuscriptController::class, 'show'])->name('acceptedmanuscript.show');
    Route::get('edit/{id}', [AcceptedManuscriptController::class, 'edit'])->name('acceptedmanuscript.edit');
    Route::put('update/{id}', [AcceptedManuscriptController::class, 'update'])->name('acceptedmanuscript.update');

    Route::resource('/reviewers', ChiefReviewerController::class);
    Route::resource('/reviewermanuscript', ChiefReviewerManuscriptController::class);
    Route::resource('/reviewerassigned', ReviewerAssignedController::class);
    Route::resource('/employeeassigned', EmployeeAssignedController::class);

    Route::resource('/mail', ContactController::class);
    Route::post('/send', [ContactController::class, 'send'])->name('mail.send');

});


//ROUTE FOR AUTHOR
Route::middleware(['auth', 'role:author'])->name('author.')->prefix('author')->group(function(){
    Route::get('/', [AuthorIndexController::class, 'index'])->name('index');

    Route::resource('/details', AuthorController::class);
    Route::get('edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::put('update/{id}', [AuthorController::class, 'update'])->name('author.update');

        Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])->name('details.destroy');

    Route::resource('/coauthors', AuthorManuscriptController::class);

        Route::delete('/coauthors/{author_manuscript}', [AuthorManuscriptController::class, 'destroy'])->name('coauthors.destroy');


     Route::resource('/manustatus', AuthorReviewedStatusController::class);

    Route::resource('/manuscripts', ManuscriptController::class);
        Route::get('/manuscripts/view/{id}', [ManuscriptController::class, 'show'])->name('manuscripts.view');
        Route::get('/download/{file}', [ManuscriptController::class, 'download'])->name('manuscripts.download');
        Route::delete('/manuscripts/{manuscript}', [ManuscriptController::class, 'destroy'])->name('manuscripts.destroy')->withTrashed();
        Route::post('/manuscripts/{manuscript}/restore', [ManuscriptController::class, 'restore'])->name('manuscripts.restore')->withTrashed();
        Route::get('archive', [ManuscriptController::class, 'archive'])->name('manuscripts.archive');
        Route::get('edit/{id}', [ManuscriptController::class, 'edit'])->name('manuscripts.edit');
        Route::put('update/{id}', [ManuscriptController::class, 'update'])->name('manuscripts.update');


    Route::resource('/acceptedmanuscript', AuthorAcceptedManuscriptController::class);
        Route::get('/downloadss/{file}', [AuthorAcceptedManuscriptController::class, 'downloadss'])->name('acceptedmanuscript.downloadss');
        Route::get('/shows/{id}', [AuthorAcceptedManuscriptController::class, 'shows'])->name('acceptedmanuscript.shows');
});



//ROUTE FOR REVIEWER
Route::middleware(['auth', 'role:reviewer'])->name('reviewer.')->prefix('reviewer')->group(function(){
    Route::get('/', [ReviewerIndexController::class, 'index'])->name('index');

    Route::resource('/details', ReviewerController::class);
    Route::delete('/reviewers/{reviewer}', [ReviewerController::class, 'destroy'])->name('details.destroy');

    Route::resource('/reviewermanuscripts', ReviewerManuscriptController::class);
    Route::get('/download/{file}', [ReviewerManuscriptController::class, 'download'])->name('reviewermanuscripts.download');
    Route::get('/view/{id}', [ReviewerManuscriptController::class, 'show'])->name('reviewermanuscripts.view');

    Route::resource('/comments', ReviewerCommentController::class);
    Route::get('/showz/{id}', [ReviewerCommentController::class, 'showz'])->name('comments.view');
    Route::get('/downloadz/{file}', [ReviewerCommentController::class, 'downloadz'])->name('comments.downloadz');
});



//ROUTE FOR LAYOUT ARTIST
Route::middleware(['auth', 'role:layout'])->name('artist.')->prefix('artist')->group(function(){
    Route::get('/', [IndexLayoutController::class, 'index'])->name('index');

    Route::resource('/employees', LayoutController::class);

    Route::resource('/employeeassigned', LayoutEmployeeAssignedController::class);
    Route::get('/download/{file}', [LayoutEmployeeAssignedController::class, 'download'])->name('employeeassigned.download');

});




//ROUTE FOR COPY EDITOR
Route::middleware(['auth', 'role:copy'])->name('copyeditor.')->prefix('copyeditor')->group(function(){
    Route::get('/', [CopyEditorController::class, 'index'])->name('index');

    Route::resource('/employees', CopyController::class);

    Route::resource('/employeeassigned', CopyEmployeeAssignedController::class);
    Route::get('/download/{file}', [CopytEmployeeAssignedController::class, 'download'])->name('employeeassigned.download');
});










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
