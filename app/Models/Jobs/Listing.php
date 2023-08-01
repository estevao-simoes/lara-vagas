<?php

namespace App\Models\Jobs;

use App\Jobs\SendPostedJobToSubscribers;
use App\Models\Subscriber;
use App\Models\User;
use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Listing extends Model
{
    use HasFactory, HasTags, HasUuids;

    protected $table = 'job_listings';

    const CONTRACT_TYPES = [
        'FULL_TIME' => 'Tempo integral',
        'PART_TIME' => 'Meio período',
        'CONTRACTOR' => 'Consultor',
        'TEMPORARY' => 'Temporário',
        'INTERN' => 'Estagiário',
        'VOLUNTEER' => 'Voluntário',
        'PER_DIEM' => 'Por dia',
        'OTHER' => 'Outro'
    ];

    protected $fillable = [
        'title',
        'user_id',
        'location',
        'contract_type',
        'url',
        'company_name',
        'salary',
        'tags',
        'company_logo',
        'posted_at',
        'status',
        'notified_at'
    ];

    protected $casts = [
        'tags' => 'array',
        'posted_at' => 'datetime',
    ];

    protected $appends = [
        'company_logo_url'
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::updated(function (Listing $listing) {
            $listing->sendToSubscribers();
        });
    }

    /**
     * Relationships
     */

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accessors
     */

    public function shouldNotifySubscribers(): bool
    {
        return $this->status === 'paid' && $this->notified_at === null;
    }

    public function getCompanyLogoUrlAttribute()
    {
        return $this->company_logo ? asset('storage/' . $this->company_logo) : null;
    }

    /**
     * Functions
     */

    public function sendToSubscribers(): void
    {
        SendPostedJobToSubscribers::dispatch($this);
    }

    public function markAsNotified(): void
    {
        $this->update([
            'notified_at' => now()
        ]);
    }

    public function addClick($request, Subscriber $subscriber = null)
    {
        $this->clicks()->create([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referer' => $request->headers->get('referer'),
            'subscriber_id' => $subscriber ? $subscriber->id : null
        ]);
    }
}
