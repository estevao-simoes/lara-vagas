<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoToListingWebsiteController;
use App\Http\Controllers\HomeController;
use App\Models\Jobs\Listing;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', HomeController::class)->name('home');
Route::get('/test', fn () => view('auth.page'));

Route::get('listing/{listing}', GoToListingWebsiteController::class)->name('post-job.click');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('post-job', function () {
        return view('post-job');
    })->name('post-job.view');

    Route::get('/charge-checkout/{listing}', function (Listing $listing, Request $request) {
        return $request->user()->checkout(['price_1NYvphKCVKM4D3Mp08Bhuxcg' => 1], [
            'success_url' => route('checkout-success').'?session_id={CHECKOUT_SESSION_ID}&listing_id=' . $listing->id,
            'cancel_url' => route('dashboard'),
        ]);
    })->name('charge-checkout');

    Route::get('/checkout-success', function (Request $request) {
        $checkoutSession = $request->user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));
        $listing = Listing::find($request->get('listing_id'));

        $listing->update(['status' => $checkoutSession->payment_status]);
        
        return redirect()->route('dashboard')->with('success', 'Pagamento aprovado. Seu anúncio será publicado!');
        
    })->name('checkout-success');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
