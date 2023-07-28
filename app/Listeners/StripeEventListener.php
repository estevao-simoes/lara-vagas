<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    /**
     * Handle received Stripe webhooks.
     */
    public function handle(WebhookReceived $event): void
    {
        Log::info('[Stripe][' . $event->payload['type'] . ']', $event->payload);
    }
}
