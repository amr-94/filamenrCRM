<?php

namespace App\Filament\Resources\Media;

use App\Filament\Resources\Media\Pages\ListMedia;
use Filament\Resources\Resource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use BackedEnum;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    public static function getNavigationGroup(): ?string
    {
        return __('messages.system_admin');
    }

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = null;

    protected static ?string $slug = 'media';

    public static function getLabel(): ?string
    {
        return __('messages.media');
    }

    public static function getPluralLabel(): ?string
    {
        return __('messages.media');
    }

    public static function getNavigationLabel(): string
    {
        return __('messages.media');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMedia::route('/'),
        ];
    }
}
