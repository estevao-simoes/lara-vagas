<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use function Illuminate\Events\queueable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'is_admin',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::updated(queueable(function (User $customer): void {
            if ($customer->hasStripeId()) {
                $customer->syncStripeCustomerDetails();
            }
        }));
    }

    /**
     * The accessors to append to the model's array.
     */

    public function getAvatarUrlAttribute(): ?string
    {
        $name = md5($this->email);
        return 'https://www.gravatar.com/avatar/' . $name;
    }

    /**
     * Functions
     */

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }

    public function canAccessFilament(): bool
    {
        return (bool) $this->is_admin;
    }

    /**
     * Get the customer name that should be synced to Stripe.
     */
    public function stripeName(): string|null
    {
        return $this->name;
    }

}
