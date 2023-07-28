<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home', [
            'listings' => \App\Models\Jobs\Listing::query()
                ->orderBy('created_at', 'desc')
                ->where('status', 'paid')
                ->get(),
        ]);
    }
}
