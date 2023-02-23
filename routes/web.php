<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\SubProgrammeController;
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

// Route::get('/', function () {
//     return view('includes.header_footer');
// });


Route::middleware(['auth'])->group(function () {

    // department management 
    Route::get('/', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('/showdepartments/{department}', [DepartmentController::class, 'showall'])->name('department.showall');
    Route::get('/createdepartment', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/storedepartment', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/editdepartment/{department}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::patch('/updatedepartment/{department}', [DepartmentController::class, 'update'])->name('department.update');
    Route::get('/destroydepartment/{department}', [DepartmentController::class, 'destroy'])->name('department.destroy');

    // programme management 
    Route::get('/programme', [ProgrammeController::class, 'index'])->name('programme.index');
    Route::get('/showsubprogrammes/{programme}', [ProgrammeController::class, 'showsubprogrammes'])->name('showsubprogrammes');
    Route::get('/createprogramme', [ProgrammeController::class, 'create'])->name('programme.create');
    Route::post('/storeprogramme', [ProgrammeController::class, 'store'])->name('programme.store');
    Route::get('/editprogramme/{programme}', [ProgrammeController::class, 'edit'])->name('programme.edit');
    Route::patch('/updateprogramme/{programme}', [ProgrammeController::class, 'update'])->name('programme.update');
    Route::get('/destroyprogramme/{programme}', [ProgrammeController::class, 'destroy'])->name('programme.destroy');

    // Subprogramme management 
    Route::get('/subprogramme', [SubProgrammeController::class, 'index'])->name('subprogramme.index');
    Route::get('/createsubprogramme', [SubProgrammeController::class, 'create'])->name('subprogramme.create');
    Route::post('/storesubprogramme', [SubProgrammeController::class, 'store'])->name('subprogramme.store');
    Route::get('/editsubprogramme/{subprogramme}', [SubProgrammeController::class, 'edit'])->name('subprogramme.edit');
    Route::patch('/updatesubprogramme/{subprogramme}', [SubProgrammeController::class, 'update'])->name('subprogramme.update');
    Route::get('/destroysubprogramme/{subprogramme}', [SubProgrammeController::class, 'destroy'])->name('subprogramme.destroy');
});

require __DIR__ . '/auth.php';
