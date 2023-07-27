<?php

namespace App\Http\Controllers;

use App\Models\Jobs\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GoToListingWebsiteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Listing $listing, Request $request)
    {
        try {
            $listing->addClick($request);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }

        return redirect($listing->url);
    }
}
