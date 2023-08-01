<?php

namespace App\Jobs;

use App\Mail\JobPosted;
use App\Models\Jobs\Listing;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPostedJobToSubscribers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Listing $listing;

    /**
     * Create a new job instance.
     */
    public function __construct(Listing $listing)
    {
        $this->listing = $listing;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->listing->shouldNotifySubscribers()) {
            $subscribers = Subscriber::all();

            foreach ($subscribers as $subscriber) {
                Mail::to($subscriber->email)->send(new JobPosted($this->listing, $subscriber));
            }

            $this->listing->markAsNotified();
        }
    }
}
