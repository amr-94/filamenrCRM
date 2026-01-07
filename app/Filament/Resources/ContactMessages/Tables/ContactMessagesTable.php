<?php

namespace App\Filament\Resources\ContactMessages\Tables;

use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class ContactMessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(fn($record) => \App\Filament\Resources\ContactMessages\ContactMessageResource::getUrl('view', ['record' => $record]))
            ->columns([
                TextColumn::make('first_name')
                    ->label(__('messages.first_name'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('last_name')
                    ->label(__('messages.last_name'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('email')
                    ->label(__('messages.email'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('phone')
                    ->label(__('messages.phone'))
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('number_of_locations')
                    ->label(__('messages.number_of_locations'))
                    ->formatStateUsing(fn(?string $state): string => match ($state) {
                        '1_location' => __('messages.1_location'),
                        '2_5_locations' => __('messages.2_5_locations'),
                        '6_10_locations' => __('messages.6_10_locations'),
                        '11_25_locations' => __('messages.11_25_locations'),
                        '26_plus_locations' => __('messages.26_plus_locations'),
                        default => $state ?? '-',
                    })
                    ->toggleable(),
                SelectColumn::make('status')
                    ->label(__('messages.status'))
                    ->options([
                        'new' => __('messages.new'),
                        'read' => __('messages.read'),
                        'replied' => __('messages.replied'),
                    ])
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
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->label(__('messages.status'))
                    ->options([
                        'new' => __('messages.new'),
                        'read' => __('messages.read'),
                        'replied' => __('messages.replied'),
                    ]),
            ]);
    }
}
