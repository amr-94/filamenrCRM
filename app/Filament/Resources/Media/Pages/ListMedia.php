<?php

namespace App\Filament\Resources\Media\Pages;

use App\Filament\Resources\Media\MediaResource;
use App\Filament\Resources\Media\Tables\MediaTable;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;

class ListMedia extends ListRecords
{
    protected static string $resource = MediaResource::class;

    protected static ?string $title = null;

    public function getTitle(): string
    {
        return __('messages.media_library');
    }

    public function table(Table $table): Table
    {
        return MediaTable::configure($table);
    }
}
