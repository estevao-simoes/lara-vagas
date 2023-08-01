<?php

namespace App\Notifications;

use App\Mail\JobPosted as JobPostedMailable;
use App\Models\Jobs\Listing;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Mail\Mailable;

class JobPosted extends Notification implements ShouldQueue
{
    use Queueable;

    public Listing $listingting;
    public Subscriber $subscriber;


    /**
     * Create a new notification instance.
     */
    public function __construct(Listing $listingting, Subscriber $subscriber)
    {
        $this->listing = $listingting;
        $this->subscriber = $subscriber;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): Mailable
    {
        $address = $notifiable instanceof AnonymousNotifiable
            ? $notifiable->routeNotificationFor('mail')
            : $notifiable->email;

        return (new JobPostedMailable($this->listing, $this->subscriber))
            ->to($address);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
