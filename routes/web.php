<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TackleController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\GoodController;

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

Route::get('/', function () {
    return Inertia::render('Top', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/introduction', function () {
    return Inertia::render('Introduction', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("auth/google", [
    LoginWithGoogleController::class,
    "redirectToGoogle",
  ])->name('auth.google');

  Route::get("auth/google/callback", [
    LoginWithGoogleController::class,
    "handleGoogleCallback",
  ]);

Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/user', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/passwordchange', function(){
    return Inertia::render('PasswordChange',[
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('user.PasswordChange');
    Route::post('/passwordchange', [UserController::class, 'PasswordEdit'])->name('user.PasswordEdit');
});
Route::get('/deleteuser', function () {
    return Inertia::render('DeleteUser', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware(['auth'])->name('user.deleteuser');

Route::get('/mytackle', [TackleController::class, 'index'])
->middleware(['auth'])->name('tackle.index');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/add_tackle', [TackleController::class, 'create'])
    ->name('tackle.create');

    Route::post('/add_tackle', [TackleController::class, 'store'])
    ->name('tackle.store');

    Route::get('/tackle_edit/{id}', [TackleController::class, 'edit'])
    ->name('tackle.edit');

    Route::post('/tackle_edit/{id}', [TackleController::class, 'update'])
                ->name('tackle.update');

    Route::delete('/tackle_edit/{id}',[TackleController::class, 'destroy'])
                ->name('tackle.destroy');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/share_tackle', [ShareController::class, 'index'])
    ->name('tackle.share');

    Route::get('/share_tackle/{queryWord}',[ShareController::class, 'search'])
    ->where('queryWord', '.*')->name('share.search');

    Route::post('/share_tackle',[GoodController::class, 'goodAdd'])
    ->name('good.goodAdd');
});


require __DIR__.'/auth.php';