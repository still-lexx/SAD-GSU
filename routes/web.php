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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'admin'])->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/case', [App\Http\Controllers\caseController::class, 'index'])->name('case');
Route::get('/view/{id}', [App\Http\Controllers\caseController::class, 'viewCase'])->name('view.viewCase');
Route::get('/newcase', [App\Http\Controllers\newcaseController::class, 'index'])->name('newcase');
Route::get('/settings', [App\Http\Controllers\settingsController::class, 'index'])->name('settings');
// Route::get('/users', [App\Http\Controllers\usersController::class, 'index'])->name('users');
Route::post('/cases/store', [App\Http\Controllers\newcaseController::class, 'store'])->name('cases.store');
Route::post('/cases/update', [App\Http\Controllers\caseController::class, 'update'])->name('casesUpdate');

Auth::routes();

Route::post('/userinfo', [App\Http\Controllers\userinfoController::class, 'store'])->name('userinfo');
Route::get('/case/delete/{id}', [App\Http\Controllers\caseController::class, 'destroy']);

Route::middleware(['auth', 'admin'])->get('/users', [App\Http\Controllers\usersController::class, 'index'])->name('users');
Route::middleware(['auth', 'admin'])->get('/users/delete/{id}', [App\Http\Controllers\usersController::class, 'destroy']);
Route::middleware(['auth', 'admin'])->get('/students', [App\Http\Controllers\studentController::class, 'index'])->name('students');
Route::middleware(['auth', 'admin'])->post('/students/store', [App\Http\Controllers\studentController::class, 'store'])->name('students.store');

Route::middleware(['auth', 'student'])->get('/students/dashboard', [App\Http\Controllers\studentController::class, 'studentDashoard'])->name('students.dash');