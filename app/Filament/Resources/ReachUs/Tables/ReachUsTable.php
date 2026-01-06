<?php

namespace App\Filament\Resources\ReachUs\Tables;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReachUsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->defaultSort('order', 'asc')
            ->columns([
                TextColumn::make('contact_type')
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('value')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
            ]);
    }
}
