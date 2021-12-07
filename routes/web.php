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
    

    //sepatu
    Route::get('/sepatu', function () {
        return view('table.sepatu');
    })->middleware('permission:sepatu-list');

    Route::get('/add-sepatu ', function () {
        return view('form/sepatu');
    })->middleware('permission:sepatu-create');

    Route::get('/update-sepatu/{id}', function () {
        return view('form/sepatu');
    })->middleware('permission:sepatu-edit');

    Route::get('/qr-sepatu/{id}', [QRController::class, 'sepatu']);

    
    //jurnal
    // Route::get('/jurnal', function () {
    //     return view('table.jurnal');
    // })->middleware('permission:jurnal-list');

    // Route::get('/add-jurnal ', function () {
    //     return view('form/jurnal');
    // })->middleware('permission:jurnal-create');

    // Route::get('/update-jurnal/{id}', function () {
    //     return view('form/jurnal');
    // })->middleware('permission:jurnal-edit');


    //resi
    Route::get('/resi', function () {
        return view('table.resi');
    })->middleware('permission:resi-list');

    Route::get('/add-resi ', function () {
        return view('form/resi');
    })->middleware('permission:resi-create');

    Route::get('/update-resi/{id}', function () {
        return view('form/resi');
    })->middleware('permission:resi-edit');

    Route::get('/qr-resi/{id}', [QRController::class, 'resi']);


    //transaction
    Route::get('/transaction', function () {
        return view('table.transaction');
    })->middleware('permission:transaction-list');

    Route::get('/add-transaction ', function () {
        return view('form/transaction');
    })->middleware('permission:transaction-create');

    Route::get('/update-transaction/{id}', function () {
        return view('form/transaction');
    })->middleware('permission:transaction-edit');



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
