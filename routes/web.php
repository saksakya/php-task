<?php

use App\Http\Controllers\Adimin\StudentController;
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

// Route::get('admin/students',[StudentController::class,'index'])
//     ->name('student.index');
// Route::get('admin/students/{id}',[StudentController::class,'show'])
//     ->whereNumber('id')
//     ->name('student.show');

Route::prefix('admin/students')
    ->name('student.')
    ->controller(StudentController::class)
    ->group(function(){
        Route::get('','index')->name('index');
        Route::get('{student}','show')
            ->whereNumber('student')->name('show');
        Route::get('create','create')->name('create');
        Route::post('','store')->name('store');
    });
