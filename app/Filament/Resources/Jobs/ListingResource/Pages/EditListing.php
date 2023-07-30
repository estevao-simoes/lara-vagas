<?php

namespace App\Filament\Resources\Jobs\ListingResource\Pages;

use App\Filament\Resources\Jobs\ListingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditListing extends EditRecord
{
    protected static string $resource = ListingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
