<?php

namespace App\Filament\Resources\KaryaSantri;

use App\Filament\Resources\KaryaSantri\Pages\CreateKaryaSantri;
use App\Filament\Resources\KaryaSantri\Pages\EditKaryaSantri;
use App\Filament\Resources\KaryaSantri\Pages\ListKaryaSantris;
use App\Filament\Resources\KaryaSantri\Schemas\KaryaSantriForm;
use App\Filament\Resources\KaryaSantri\Tables\KaryaSantriTable;
use App\Models\KaryaSantri;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KaryaSantriResource extends Resource
{
    protected static ?string $model = KaryaSantri::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookOpen;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Karya Santri';

    protected static ?string $pluralModelLabel = 'Karya Santri';

    protected static ?string $modelLabel = 'Karya Santri';

    public static function form(Schema $schema): Schema
    {
        return KaryaSantriForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KaryaSantriTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKaryaSantris::route('/'),
            'create' => CreateKaryaSantri::route('/create'),
            'edit' => EditKaryaSantri::route('/{record}/edit'),
        ];
    }
}
