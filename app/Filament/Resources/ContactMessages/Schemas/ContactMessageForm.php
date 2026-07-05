<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->disabled()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->disabled(),
                Textarea::make('pesan')
                    ->disabled()
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_read')
                    ->disabled()
                    ->required(),
            ]);
    }
}
