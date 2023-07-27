<?php

namespace App\Models\Jobs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    use HasFactory;

    protected $table = 'job_clicks';

    protected $fillable = [
        'listing_id',
        'ip_address',
        'user_agent',
        'referer'
    ];
}
