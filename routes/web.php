<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard;
use App\Livewire\Stocks;
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
    return redirect(route('dashboard'));
})->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::group([
        'prefix' => 'stocks',
        'as' => 'stocks.'
    ], function () {
        Route::get('/', Stocks\Index::class)->name('index');

        Route::get('/search-assets', [Stocks\Save::class, 'search'])->name('search-assets');
    });

    Route::get('logout', function () {
        auth()->logout();

        return redirect(route('login'));
    })->name('logout');
});
