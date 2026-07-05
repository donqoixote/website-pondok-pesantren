<?php

namespace App\Filament\Resources\KaryaSantri\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class KaryaSantriTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul Karya')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('class')
                    ->label('Kelas')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category')
                    ->label('Kategori')
                    ->sortable(),
                ImageColumn::make('image_path')
                    ->label('Foto'),
                ToggleColumn::make('is_approved')
                    ->label('Disetujui')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Kirim')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
