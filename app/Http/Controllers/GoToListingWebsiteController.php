<?php

namespace App\Http\Controllers;

use App\Models\Jobs\Listing;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GoToListingWebsiteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Listing $listing, Subscriber $subscriber = null, Request $request)
    {
        try {
            $listing->addClick($request, $subscriber);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }

        return redirect($listing->url);
    }
}
