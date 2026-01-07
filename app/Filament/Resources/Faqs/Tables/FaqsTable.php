<?php

namespace App\Filament\Resources\Faqs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class FaqsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(fn($record) => \App\Filament\Resources\Faqs\FaqResource::getUrl('view', ['record' => $record]))
            ->reorderable('order')
            ->defaultSort('order', 'asc')
            ->columns([
                TextColumn::make('title')
                    ->label(__('messages.title'))
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('order')
                    ->label(__('messages.order'))
                    ->numeric()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('question')
                    ->label(__('messages.question'))
                    ->html()
                    ->toggleable(),

                TextColumn::make('answer')
                    ->label(__('messages.answer'))
                    ->html()
                    ->toggleable(),

                TextColumn::make('tags')
                    ->badge()
                    ->separator(',')
                    ->color('primary')
                    ->toggleable(),

                IconColumn::make('is_active')
                    ->label(__('messages.is_active'))
                    ->boolean()
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
