<?php

namespace App\Models\Jobs;

use App\Jobs\SendPostedJobToSubscribers;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Listing extends Model
{
    use HasFactory, HasUuids;

    public const CONTRACT_TYPES = [
        'FULL_TIME' => 'Tempo integral',
        'PART_TIME' => 'Meio período',
        'CONTRACTOR' => 'Consultor',
        'TEMPORARY' => 'Temporário',
        'INTERN' => 'Estagiário',
        'VOLUNTEER' => 'Voluntário',
        'PER_DIEM' => 'Por dia',
        'OTHER' => 'Outro',
    ];

    public const TAGS = [
        'AlpineJS',
        'Analista',
        'Angular',
        'API',
        'AWS',
        'Backend',
        'Bootstrap',
        'Nuvem (Cloud)',
        'Consultor',
        'Contrato',
        'Craft CMS',
        'Filamentphp',
        'CSS',
        'CS',
        'Atendimento ao Cliente',
        'Design',
        'DevOps',
        'Engenheiro',
        'Frontend',
        'Fullstack',
        'Tempo integral',
        'Git',
        'Go',
        'JavaScript',
        'Júnior',
        'Pleno',
        'Senior',
        'LAMP',
        'Laravel',
        'Tech Lead',
        'Linux',
        'Livewire',
        'MacOS',
        'Gerência',
        'Microsoft',
        'MySQL',
        'Node.js',
        'Produto',
        'Open Source',
        'Meio período',
        'PHP',
        'Postgres',
        'QA',
        'React',
        'Redis',
        'SaaS',
        'SQL',
        'Statamic',
        'Symfony',
        'TailwindCSS',
        'TALL Stack',
        'TDD',
        'Suporte Técnico',
        'Linux',
        'VueJS',
        'Docker'
    ];

    protected $table = 'job_listings';

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
        'notified_at',
    ];

    protected $casts = [
        'tags' => 'array',
        'posted_at' => 'datetime',
    ];

    protected $appends = [
        'company_logo_url',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::updated(function (Listing $listing): void {
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
            'notified_at' => now(),
        ]);
    }

    public function addClick($request, ?Subscriber $subscriber = null): void
    {
        $this->clicks()->create([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referer' => $request->headers->get('referer'),
            'subscriber_id' => $subscriber ? $subscriber->id : null,
        ]);
    }

    public static function getTags(): Collection
    {
        return collect(self::TAGS);
    }

    public static function getTagsAsArray(): array
    {
        return self::getTags()->toArray();
    }

    public static function getTag($index): string
    {
        return self::TAGS[$index];
    }

}
