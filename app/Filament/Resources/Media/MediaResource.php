<?php

namespace App\Filament\Resources\Media;

use App\Filament\Resources\Media\Pages\ListMedia;
use Filament\Resources\Resource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use BackedEnum;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = null;

    protected static ?string $slug = 'media';

    public static function getNavigationLabel(): string
    {
        return __('messages.media_library');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMedia::route('/'),
        ];
    }
}
