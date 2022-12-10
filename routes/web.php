<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SantriController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('santris', SantriController::class);
    Route::get('export_excel', [SantriController::class, 'export_excel'])->name('export_excel');
    Route::get('export_pdf', [SantriController::class, 'export_pdf'])->name('export_pdf');
    Route::get('import_excel', function () {
        return view('santri.import');
    })->name('import_excel');
    Route::post('import_excel', [SantriController::class, 'import_excel'])->name('import_excel.store');
});

require __DIR__ . '/auth.php';
