<?php

namespace App\Filament\Resources\KaryaSantri\Pages;

use App\Filament\Resources\KaryaSantri\KaryaSantriResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKaryaSantri extends EditRecord
{
    protected static string $resource = KaryaSantriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
