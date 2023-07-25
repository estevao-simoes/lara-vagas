<?php

namespace App\Models\Jobs;

use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory, HasTags;

    protected $fillable = [
        'title',
        'slug',
        'company',
        'location',
        'tags',
        'description',
        'apply',
        'url',
        'status',
        'posted_at',
    ];
}
