<?php

namespace App\Filament\Resources\Media\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class MediaTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordAction('view')
            ->columns([
                ImageColumn::make('preview')
                    ->label(__('messages.preview'))
                    ->getStateUsing(fn($record) => $record->getUrl())
                    ->circular()
                    ->size(40)
                    ->toggleable(),
                TextColumn::make('name')
                    ->label(__('messages.file_name'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->toggleable(),
                TextColumn::make('model_type')
                    ->label(__('messages.source'))
                    ->formatStateUsing(fn($state) => class_basename($state))
                    ->badge()
                    ->color('gray')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('size')
                    ->label(__('messages.size'))
                    ->formatStateUsing(fn($state) => number_format($state / 1024, 2) . ' KB')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label(__('messages.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->actions([
                Action::make('view')
                    ->label(__('messages.view'))
                    ->icon('heroicon-o-eye')
                    ->modalHeading(__('messages.file_details'))
                    ->modalContent(fn($record) => view('filament.resources.media.modal', ['media' => $record]))
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel(__('messages.close')),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
