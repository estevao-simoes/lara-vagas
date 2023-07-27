<?php

namespace App\Models\Jobs;

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
        'location',
        'contract_type',
        'url',
        'company_name',
        'salary',
        'tags',
        'company_logo',
        'posted_at',
        'status'
    ];

    protected $casts = [
        'tags' => 'array',
        'posted_at' => 'datetime',
    ];

    protected $appends = [
        'company_logo_url'
    ];

    /**
     * Relationships
     */

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }

    /**
     * Accessors
     */
    
    public function getCompanyLogoUrlAttribute()
    {
        return $this->company_logo ? asset('storage/' . $this->company_logo) : null;
    }

    /**
     * Functions
     */

    public function addClick($request)
    {
        $this->clicks()->create([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referer' => $request->headers->get('referer'),
        ]);
    }

}
