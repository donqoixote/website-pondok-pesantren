<?php

namespace App\Filament\Resources\Registrations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class RegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_santri')
                    ->required(),
                Select::make('jenjang')
                    ->options([
                        'mts' => 'MTs',
                        'ma' => 'MA',
                    ])
                    ->required(),
                TextInput::make('ttl')
                    ->placeholder('Tempat, Tanggal Lahir'),
                TextInput::make('nama_ortu')
                    ->label('Nama Orang Tua / Wali'),
                TextInput::make('hp')
                    ->label('No. HP / WhatsApp')
                    ->tel()
                    ->required(),
                Textarea::make('alamat')
                    ->rows(3)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Diterima',
                        'rejected' => 'Ditolak',
                    ])
                    ->required()
                    ->default('pending'),
            ]);
    }
}
