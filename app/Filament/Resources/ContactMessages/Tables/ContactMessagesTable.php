<?php

namespace App\Filament\Resources\ContactMessages\Tables;

use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactMessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->searchable(),
                TextColumn::make('last_name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                SelectColumn::make('status')
                    ->options([
                        'new' => 'New',
                        'read' => 'Read',
                        'replied' => 'Replied',
                    ])
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ]);
    }
}
