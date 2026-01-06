<?php

namespace App\Filament\Resources\PricingPlans\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PricingPlansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->defaultSort('order', 'asc')
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('price')
                    ->money(fn($record) => $record->currency)
                    ->sortable(),
                IconColumn::make('is_popular')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
            ]);
    }
}
