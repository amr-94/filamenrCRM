<?php

namespace App\Filament\Resources\Media\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup as ActionsBulkActionGroup;
use Filament\Actions\DeleteBulkAction as ActionsDeleteBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class MediaTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('preview')
                    ->label(__('messages.preview'))
                    ->getStateUsing(fn($record) => $record->getUrl())
                    ->circular()
                    ->size(40),
                TextColumn::make('name')
                    ->label(__('messages.file_name'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('model_type')
                    ->label(__('messages.source'))
                    ->formatStateUsing(fn($state) => class_basename($state))
                    ->badge()
                    ->color('gray')
                    ->searchable(),
                TextColumn::make('size')
                    ->label(__('messages.size'))
                    ->formatStateUsing(fn($state) => number_format($state / 1024, 2) . ' KB')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('messages.upload_date'))
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->color('gray'),
            ])
            ->actions([
                Action::make('view')
                    ->label(__('messages.view'))
                    ->icon('heroicon-o-eye')
                    ->fillForm(fn($record) => [
                        'name' => $record->name,
                        'mime_type' => $record->mime_type,
                        'size' => $record->size,
                        'model_type' => $record->model_type,
                        'created_at' => $record->created_at,
                        'url' => $record->getUrl(),
                    ])
                    ->modalHeading(__('messages.file_details'))
                    ->modalContent(fn($record) => view('filament.resources.media.modal', ['media' => $record]))
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel(__('messages.close')),
                Action::make('delete')
                    ->label(__('messages.delete'))
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(fn($record) => $record->delete()),
            ])
            ->bulkActions([
                ActionsBulkActionGroup::make([
                    ActionsDeleteBulkAction::make(),
                ]),
            ]);
    }
}