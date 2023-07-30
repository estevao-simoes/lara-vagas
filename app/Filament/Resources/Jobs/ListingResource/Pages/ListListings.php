<?php

namespace App\Filament\Resources\Jobs\ListingResource\Pages;

use App\Filament\Resources\Jobs\ListingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListListings extends ListRecords
{
    protected static string $resource = ListingResource::class;

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->orderBy('created_at', 'desc')
            ->orderBy('posted_at', 'desc');
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
