<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function() {

    // Route::resource('roles', 'App\Http\Controllers\RoleController');

    Route::get('/roles', function () {
        return view('table.roles');
    })->middleware('permission:role-list');

    Route::get('/add-roles', function () {
        return view('form/roles');
    })->middleware('permission:role-create');

    Route::get('/update-roles/{id}', function () {
        return view('form/roles');
    })->middleware('permission:role-edit');

    //user
    Route::get('/admin', function () {
        return view('table.user');
    })->middleware('permission:admin-list');

    Route::get('/add-admin ', function () {
        return view('form/user');
    })->middleware('permission:admin-create');

    Route::get('/update-admin/{id}', function () {
        return view('form/user');
    })->middleware('permission:admin-edit');
    

    //book
    Route::get('/book', function () {
        return view('table.book');
    })->middleware('permission:book-list');

    Route::get('/add-book ', function () {
        return view('form/book');
    })->middleware('permission:book-create');

    Route::get('/update-book/{id}', function () {
        return view('form/book');
    })->middleware('permission:book-edit');

    Route::get('/qr-book/{id}', [QRController::class, 'book']);

    
    //jurnal
    Route::get('/jurnal', function () {
        return view('table.jurnal');
    })->middleware('permission:jurnal-list');

    Route::get('/add-jurnal ', function () {
        return view('form/jurnal');
    })->middleware('permission:jurnal-create');

    Route::get('/update-jurnal/{id}', function () {
        return view('form/jurnal');
    })->middleware('permission:jurnal-edit');


    //guru
    Route::get('/teacher', function () {
        return view('table.guru');
    })->middleware('permission:teacher-list');

    Route::get('/add-teacher ', function () {
        return view('form/guru');
    })->middleware('permission:teacher-create');

    Route::get('/update-teacher/{id}', function () {
        return view('form/guru');
    })->middleware('permission:teacher-edit');

    Route::get('/qr-teacher/{id}', [QRController::class, 'teacher']);


    //aktifitas
    Route::get('/booking-administrasion', function () {
        return view('table.aktifitas');
    })->middleware('permission:activity-list');

    Route::get('/add-aktifitas ', function () {
        return view('form/aktifitas');
    })->middleware('permission:activity-create');

    Route::get('/update-aktifitas/{id}', function () {
        return view('form/aktifitas');
    })->middleware('permission:activity-edit');



    //student
    Route::get('/student', function () {
        return view('table.students');
    })->middleware('permission:student-list');

    Route::get('/add-student', function () {
        return view('form/student');
    })->middleware('permission:student-create');

    Route::get('/update-student/{id}', function () {
        return view('form/student');
    })->middleware('permission:student-edit');

    Route::get('/qr-student/{id}', [QRController::class, 'student']);

    

    // Route::get('/add', function () {
    //     return view('form/student');
    // });

    Route::get('/site-management', function () {
        return view('form/site-management');
    });

});

// Route::get('/add', [FormAddController::class, 'Add']);
