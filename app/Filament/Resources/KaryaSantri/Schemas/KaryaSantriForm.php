<?php

namespace App\Filament\Resources\KaryaSantri\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class KaryaSantriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Karya')
                    ->required(),
                TextInput::make('author')
                    ->label('Nama Santri (Penulis)')
                    ->required(),
                TextInput::make('class')
                    ->label('Kelas / Jenjang')
                    ->placeholder('Contoh: VII MTs, XI MA, dll.'),
                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'Puisi' => 'Puisi',
                        'Cerpen' => 'Cerpen',
                        'Kaligrafi' => 'Kaligrafi / Seni Rupa',
                        'Opini' => 'Opini / Artikel',
                        'Lainnya' => 'Lainnya',
                    ])
                    ->required(),
                RichEditor::make('content')
                    ->label('Isi Karya')
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Foto Karya (Opsional untuk lukisan/kaligrafi/mading)')
                    ->image()
                    ->disk('public')
                    ->directory('karya')
                    ->columnSpanFull(),
                Toggle::make('is_approved')
                    ->label('Disetujui untuk Tampil Publik')
                    ->default(false)
                    ->required(),
            ]);
    }
}
