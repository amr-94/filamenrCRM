<?php

namespace App\Filament\Resources\FeatureSections\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class FeatureSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(fn($record) => \App\Filament\Resources\FeatureSections\FeatureSectionResource::getUrl('view', ['record' => $record]))
            ->reorderable('order')
            ->defaultSort('order', 'asc')
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->label(__('messages.image'))
                    ->collection('image')
                    ->circular(),
                TextColumn::make('badge')
                    ->label(__('messages.badge'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('title')
                    ->label(__('messages.title'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('image_position')
                    ->label(__('messages.image_position'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'left' => 'info',
                        'right' => 'warning',
                    }),
                IconColumn::make('is_active')
                    ->label(__('messages.is_active'))
                    ->boolean()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('messages.created_at'))
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
