<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'email',
    ];


    public function getAvatarUrlAttribute(): ?string
    {
        $name = md5($this->email);
        return 'https://www.gravatar.com/avatar/' . $name;
    }

}
