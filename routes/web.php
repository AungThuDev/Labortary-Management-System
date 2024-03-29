<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',function(){
    return view('welcome');
});

Auth::routes();



Route::prefix('admin')->name('admin.')->middleware('auth')->group(function()
{
    //For Dashboard
    Route::get('/',[App\Http\Controllers\Backend\DashboardController::class,'index'])->name('home');

    Route::get('/principles',[App\Http\Controllers\Backend\PrincipleController::class,'index'])->name('principles');
    Route::get('/principles/create',[App\Http\Controllers\Backend\PrincipleController::class,'create'])->name('principles.create')->middleware('hasPrinciple');
    Route::post('/principles',[App\Http\Controllers\Backend\PrincipleController::class,'store'])->name('principles.store');
    Route::get('/principles/{id}/edit',[App\Http\Controllers\Backend\PrincipleController::class,'edit'])->name('principles.edit');
    Route::get('/principles/{id}/detail',[App\Http\Controllers\Backend\PrincipleController::class,'detail'])->name('principles.detail');
    Route::put('/principles/{id}',[App\Http\Controllers\Backend\PrincipleController::class,'update'])->name('principles.update');
    Route::delete('/principles/{id}',[App\Http\Controllers\Backend\PrincipleController::class,'destroy'])->name('principles.destroy');

    //For Advisor
    Route::get('/advisors',[App\Http\Controllers\Backend\AdvisorController::class,'index'])->name('advisors');
    Route::get('/advisors/create',[App\Http\Controllers\Backend\AdvisorController::class,'create'])->name('advisors.create');
    Route::post('/advisors',[App\Http\Controllers\Backend\AdvisorController::class,'store'])->name('advisors.store');
    Route::get('/advisors/{id}/edit',[App\Http\Controllers\Backend\AdvisorController::class,'edit'])->name('advisors.edit');
    Route::put('/advisors/{id}',[App\Http\Controllers\Backend\AdvisorController::class,'update'])->name('advisors.update');
    Route::delete('/advisors/{id}',[App\Http\Controllers\Backend\AdvisorController::class,'destroy'])->name('advisors.destroy');

    //For Admin-Users
    Route::get('/users',[App\Http\Controllers\Backend\UserController::class,'index'])->name('users');
    Route::get('/users/create',[App\Http\Controllers\Backend\UserController::class,'create'])->name('users.create');
    Route::post('/users',[App\Http\Controllers\Backend\UserController::class,'store'])->name('users.store');
    Route::get('/users/{id}/edit',[App\Http\Controllers\Backend\UserController::class,'edit'])->name('users.edit');
    Route::delete('/users/{id}',[App\Http\Controllers\Backend\UserController::class,'destroy'])->name('users.destroy');
    Route::put('/users/{id}',[App\Http\Controllers\Backend\UserController::class,'update'])->name('users.update');

    //For Current Members
    Route::get('/members',[App\Http\Controllers\Backend\MemberController::class,'index'])->name('members');
    Route::post('/members',[App\Http\Controllers\Backend\MemberController::class,'store'])->name('members.store');
    Route::get('/members/create',[App\Http\Controllers\Backend\MemberController::class,'create'])->name('members.create');
    Route::get('/members/{id}/detail',[App\Http\Controllers\Backend\MemberController::class,'detail'])->name('members.detail');
    Route::get('/members/{id}/edit',[App\Http\Controllers\Backend\MemberController::class,'edit'])->name('members.edit');
    Route::put('/members/{id}',[App\Http\Controllers\Backend\MemberController::class,'update'])->name('members.update');
    Route::delete('/researches/{id}',[App\Http\Controllers\Backend\ResearchController::class,'destroy'])->name('researches.destroy');

    //For Researches
    Route::get('/researches',[App\Http\Controllers\Backend\ResearchController::class,'index'])->name('researches');
    Route::get('/researches/create',[App\Http\Controllers\Backend\ResearchController::class,'create'])->name('researches.create');
    Route::post('/researches',[App\Http\Controllers\Backend\ResearchController::class,'store'])->name('researches.store');
    Route::get('/researches/{id}/edit',[App\Http\Controllers\Backend\ResearchController::class,'edit'])->name('researches.edit');
    Route::put('/researches/{id}',[App\Http\Controllers\Backend\ResearchController::class,'update'])->name('researches.update');

    //For Former Members
    Route::get('/former_members',[App\Http\Controllers\Backend\FormerMemberController::class,'index'])->name('former_members');
    Route::get('/former-members/{id}/detail',[App\Http\Controllers\Backend\FormerMemberController::class,'detail'])->name('former.detail');
    Route::get('/members/{id}/formermember-edit',[App\Http\Controllers\Backend\MemberController::class,'formermember_edit'])->name('formerMembers.edit');
    Route::put('/former-members/{id}',[App\Http\Controllers\Backend\MemberController::class,'formermember_update'])->name('formerMembers.update');
    Route::delete('/former-members/{id}',[App\Http\Controllers\Backend\FormerMemberController::class,'destroy'])->name('formerMembers.destroy');

    //For Projects
    Route::get('/projects',[App\Http\Controllers\Backend\ProjectController::class,'index'])->name('projects');
    Route::get('/projects/create',[App\Http\Controllers\Backend\ProjectController::class,'create'])->name('projects.create');
    Route::post('/projects',[App\Http\Controllers\Backend\ProjectController::class,'store'])->name('projects.store');
    Route::get('/projects/{id}/edit',[App\Http\Controllers\Backend\ProjectController::class,'edit'])->name('projects.edit');
    Route::put('/projects/{id}',[App\Http\Controllers\Backend\ProjectController::class,'update'])->name('projects.update');
    Route::delete('/projects/{id}',[App\Http\Controllers\Backend\ProjectController::class,'destroy'])->name('projects.destroy');

    //For Media
    Route::get('/news',[App\Http\Controllers\Backend\MediaController::class,'index'])->name('news');
    Route::get('/news/create',[App\Http\Controllers\Backend\MediaController::class,'create'])->name('news.create');
    Route::post('/news',[App\Http\Controllers\Backend\MediaController::class,'store'])->name('news.store');
    Route::get('/news/{id}/detail',[App\Http\Controllers\Backend\MediaController::class,'show'])->name('news.show');
    Route::get('/news/{id}/edit',[App\Http\Controllers\Backend\MediaController::class,'edit'])->name('news.edit');
    Route::put('/news/{id}',[App\Http\Controllers\Backend\MediaController::class,'update'])->name('news.update');
    Route::delete('/news/{id}',[App\Http\Controllers\Backend\MediaController::class,'destroy'])->name('news.destroy');

    //For Subjects
    Route::get('/subjects',[App\Http\Controllers\Backend\SubjectController::class,'index'])->name('subjects');
    Route::get('/subjects/create',[App\Http\Controllers\Backend\SubjectController::class,'create'])->name('subjects.create');
    Route::post('/subjects',[App\Http\Controllers\Backend\SubjectController::class,'store'])->name('subjects.store');
    Route::get('/subjects/{id}/detail',[App\Http\Controllers\Backend\SubjectController::class,'show'])->name('subjects.show');
    Route::get('/subjects/{id}/edit',[App\Http\Controllers\Backend\SubjectController::class,'edit'])->name('subjects.edit');
    Route::put('/subjects/{id}',[App\Http\Controllers\Backend\SubjectController::class,'update'])->name('subjects.update');
    Route::delete('/subjects/{id}',[App\Http\Controllers\Backend\SubjectController::class,'destroy'])->name('subjects.destroy');

    //For Publications
    Route::get('/publications',[App\Http\Controllers\Backend\PublicationController::class,'index'])->name('publications');
    Route::get('/publications/create',[App\Http\Controllers\Backend\PublicationController::class,'create'])->name('publications.create');
    Route::post('/publications/store',[App\Http\Controllers\Backend\PublicationController::class,'store'])->name('publications.store');
    Route::get('/publications/{id}/edit',[App\Http\Controllers\Backend\PublicationController::class,'edit'])->name('publications.edit');
    Route::put('/publications/{id}',[App\Http\Controllers\Backend\PublicationController::class,'update'])->name('publications.update');
    Route::delete('/publications/{id}',[App\Http\Controllers\Backend\PublicationController::class,'destroy'])->name('publications.destroy');
});

Route::get('/',[App\Http\Controllers\Frontend\HomePageController::class,'index'])->name('home');
Route::get('/members',[App\Http\Controllers\Frontend\HomePageController::class,'members'])->name('members');
Route::get('/former-members',[App\Http\Controllers\Frontend\HomePageController::class,'former'])->name('former-members');
Route::get('/members/{id}/detail',[App\Http\Controllers\Frontend\HomePageController::class,'memberdetail'])->name('member-detail');
Route::get('/formermembers/{id}/detail',[App\Http\Controllers\Frontend\HomePageController::class,'formerdetail'])->name('former-detail');
Route::get('/researches',[App\Http\Controllers\Frontend\HomePageController::class,'research'])->name('research');
Route::get('/lab-photos',[App\Http\Controllers\Frontend\HomePageController::class,'lab'])->name('lab');
Route::get('/publications',[App\Http\Controllers\Frontend\HomePageController::class,'publication'])->name('publication');
Route::get('/subjects',[App\Http\Controllers\Frontend\HomePageController::class,'subject'])->name('subject');
Route::get('/events',[App\Http\Controllers\Frontend\HomePageController::class,'event'])->name('event');
Route::get('/events/{id}/detail',[App\Http\Controllers\Frontend\HomePageController::class,'detail'])->name('detail');
Route::get('/contacts',[App\Http\Controllers\Frontend\HomePageController::class,'contact'])->name('contact');
Route::post('/contacts',[App\Http\Controllers\Frontend\HomePageController::class,'store'])->name('contact.store');
Route::get('/search-activemember',[App\Http\Controllers\Frontend\HomePageController::class,'searchactivemember'])->name('search-active');
Route::get('/search-formermember',[App\Http\Controllers\Frontend\HomePageController::class,'searchformermember'])->name('search-former');
Route::get('/search-research',[App\Http\Controllers\Frontend\HomePageController::class,'searchresearch'])->name('search-research');
Route::get('/search-publication',[App\Http\Controllers\Frontend\HomePageController::class,'searchpub'])->name('search-pub');
Route::get('/search-subject',[App\Http\Controllers\Frontend\HomePageController::class,'searchsub'])->name('search-sub');
Route::get('/search-event',[App\Http\Controllers\Frontend\HomePageController::class,'searchevent'])->name('search-event');