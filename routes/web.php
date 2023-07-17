<?php

use App\Http\Controllers\RaveController;
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

// Route::middleware('guest')->group(function () {
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('raves.index');
    }

    return inertia('Index');
})->name('home');
// });

Route::middleware('auth')->group(function () {
    // Route::get('/', function () {
    //     return redirect()->route('raves.index');
    // });

    Route::resource('raves', RaveController::class)->except([
        'create',
        'edit',
    ]);
});

require __DIR__.'/auth.php';
