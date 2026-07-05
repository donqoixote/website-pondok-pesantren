<?php

namespace App\Filament\Resources\KaryaSantri\Pages;

use App\Filament\Resources\KaryaSantri\KaryaSantriResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKaryaSantris extends ListRecords
{
    protected static string $resource = KaryaSantriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
