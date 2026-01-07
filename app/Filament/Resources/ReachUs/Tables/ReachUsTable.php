<?php

namespace App\Filament\Resources\ReachUs\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class ReachUsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(fn($record) => \App\Filament\Resources\ReachUs\ReachUsResource::getUrl('view', ['record' => $record]))
            ->reorderable('order')
            ->defaultSort('order', 'asc')
            ->columns([
                TextColumn::make('contact_type')
                    ->label(__('messages.contact_type'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('title')
                    ->label(__('messages.title'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('value')
                    ->label(__('messages.value'))
                    ->searchable()
                    ->toggleable(),
                IconColumn::make('is_active')
                    ->label(__('messages.is_active'))
                    ->boolean()
                    ->toggleable(),
                TextColumn::make('order')
                    ->label(__('messages.order'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label(__('messages.created_at'))
                    ->dateTime()
                    ->sortable()
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
