<?php

use App\Http\Controllers\Adimin\StudentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::prefix('admin/students')

    ->name('student.')
    ->middleware('auth')
    ->controller(StudentController::class)
    ->group(function(){
        Route::get('','index')->name('index');
        Route::get('{student}','show')
            ->whereNumber('student')->name('show');
        Route::get('create','create')->name('create');
        Route::post('','store')->name('store');
        Route::get('{student}/edit','edit')
            ->whereNumber('student')->name('edit');
        Route::put('{student}','update')
            ->whereNumber('student')->name('update');
        Route::delete('{student}','destroy')
            ->whereNumber('student')->name('destroy');
    });
