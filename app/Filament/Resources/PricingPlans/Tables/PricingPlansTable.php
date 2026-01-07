<?php

namespace App\Filament\Resources\PricingPlans\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class PricingPlansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(fn($record) => \App\Filament\Resources\PricingPlans\PricingPlanResource::getUrl('view', ['record' => $record]))
            ->reorderable('order')
            ->defaultSort('order', 'asc')
            ->columns([
                TextColumn::make('title')
                    ->label(__('messages.title'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('price')
                    ->label(__('messages.price'))
                    ->money(fn($record) => $record->currency)
                    ->sortable()
                    ->toggleable(),
                IconColumn::make('is_popular')
                    ->label(__('messages.is_popular'))
                    ->boolean()
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
