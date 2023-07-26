<?php

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
    return view('home');
})->name('home');

// Route::get('{listing:slug}', function (App\Models\Jobs\Listing $listing) {
//     return view('listing', compact('listing'));
// })->name('listing.show');

Route::get('post-job', function () {
    return view('post-job');
})->name('post-job.view');