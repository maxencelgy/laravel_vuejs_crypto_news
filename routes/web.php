<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryAdminController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuidesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\GuidesAdminController;
use App\Http\Controllers\MentionsLegalesController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;
use App\Models\Category;
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

// HOME
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// LOGIN
Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store')
    ->middleware('guest');

Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

// Inscription
Route::get('inscription', [UsersController::class, 'create'])
    ->name('users.create');

Route::post('inscription', [UsersController::class, 'store'])
    ->name('users.store');


Route::post('like', [UsersController::class, 'createLike'])
    ->name('like.store');

// Profile
Route::get('profil', [UsersController::class, 'profile'])
    ->name('users.profil')
    ->middleware('auth');

Route::get('profil/edit', [UsersController::class, 'edit'])
    ->name('users.edit')
    ->middleware('auth');

Route::put('users/{user}', [UsersController::class, 'update'])
    ->name('users.update')
    ->middleware('auth');

Route::delete('users/{user}', [UsersController::class, 'destroy'])
    ->name('users.destroy')
    ->middleware('auth');


Route::put('users/{user}/restore', [UsersController::class, 'restore'])
    ->name('users.restore')
    ->middleware('auth');

// Dashboard

Route::get('/admin', [DashboardController::class, 'index'])
    ->name('admin')
    ->middleware(['admin']);

// Users

Route::get('users', [UsersController::class, 'index'])
    ->name('users')
    ->middleware('admin');

Route::get('users/create', [UsersController::class, 'create'])
    ->name('users.create')
    ->middleware('auth');
//
//Route::post('users', [UsersController::class, 'store'])
//    ->name('users.store')
//    ->middleware('auth');

Route::get('users/edit', [UsersController::class, 'edit'])
    ->name('users.edit')
    ->middleware('auth');


Route::get('guides', [GuidesController::class, 'index'])
    ->name('guides');


Route::get('guides/create', [GuidesController::class, 'create'])
    ->name('guides.create')
    ->middleware(['admin', 'moderator']);

Route::post('guides', [GuidesController::class, 'store'])
    ->name('guides.store')
    ->middleware(['admin', 'moderator']);

Route::get('guides/{guide}', [GuidesController::class, 'show'])
    ->name('guides.show');





// Guides
Route::prefix('admin')->group(function (){
    Route::get('guides', [GuidesAdminController::class, 'index'])
        ->name('guides')
        ->middleware('auth');

    Route::get('guides/create', [GuidesAdminController::class, 'create'])
        ->name('guides.create')
        ->middleware('auth');

    Route::post('guides', [GuidesAdminController::class, 'store'])
        ->name('guides.store')
        ->middleware('auth');

    Route::get('guides/{guide}/edit', [GuidesAdminController::class, 'edit'])
        ->name('guides.edit')
        ->middleware('auth');

    Route::put('guides/{guide}', [GuidesAdminController::class, 'update'])
        ->name('guides.update')
        ->middleware('auth');

    Route::delete('guides/{organization}', [GuidesAdminController::class, 'destroy'])
        ->name('guides.destroy')
        ->middleware('auth');

    Route::put('guides/{organization}/restore', [GuidesAdminController::class, 'restore'])
        ->name('guides.restore')
        ->middleware('auth');


    Route::get('categories', [CategoryAdminController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryAdminController::class, 'create'])->name('categories.edit');
    Route::post('categories', [CategoryAdminController::class, 'store'])->name('categories.store');
    Route::delete('categories/{category}', [CategoryAdminController::class, 'destroy'])->name('categories.destroy')->middleware('auth');

});





// Contacts

Route::get('contacts', [ContactsController::class, 'index'])
    ->name('contacts')
    ->middleware('auth');

Route::get('contacts/create', [ContactsController::class, 'create'])
    ->name('contacts.create')
    ->middleware('auth');

Route::post('contacts', [ContactsController::class, 'store'])
    ->name('contacts.store')
    ->middleware('auth');

Route::get('contacts/{contact}/edit', [ContactsController::class, 'edit'])
    ->name('contacts.edit')
    ->middleware('auth');

Route::put('contacts/{contact}', [ContactsController::class, 'update'])
    ->name('contacts.update')
    ->middleware('auth');

Route::delete('contacts/{contact}', [ContactsController::class, 'destroy'])
    ->name('contacts.destroy')
    ->middleware('auth');

Route::put('contacts/{contact}/restore', [ContactsController::class, 'restore'])
    ->name('contacts.restore')
    ->middleware('auth');

// Reports

//Route::get('reports', [ReportsController::class, 'index'])
//    ->name('reports')
//    ->middleware('auth');

// Images

Route::get('/img/{path}', [ImagesController::class, 'show'])
    ->where('path', '.*')
    ->name('image');

Route::get('/mentions-legales', [MentionsLegalesController::class, 'index'])
    ->name('mentions-legales');

Route::get('/politique', [MentionsLegalesController::class, 'politique'])
    ->name('politique');
