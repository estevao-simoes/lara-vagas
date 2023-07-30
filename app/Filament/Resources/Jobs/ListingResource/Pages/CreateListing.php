<?php

namespace App\Filament\Resources\Jobs\ListingResource\Pages;

use App\Filament\Resources\Jobs\ListingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateListing extends CreateRecord
{
    protected static string $resource = ListingResource::class;
}
