<?php

namespace App\Filament\Resources\FeatureSections;

use App\Filament\Resources\FeatureSections\Pages\CreateFeatureSection;
use App\Filament\Resources\FeatureSections\Pages\EditFeatureSection;
use App\Filament\Resources\FeatureSections\Pages\ListFeatureSections;
use App\Filament\Resources\FeatureSections\Pages\ViewFeatureSection;
use App\Filament\Resources\FeatureSections\Schemas\FeatureSectionForm;
use App\Filament\Resources\FeatureSections\Tables\FeatureSectionsTable;
use App\Models\FeatureSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FeatureSectionResource extends Resource
{
    protected static ?string $model = FeatureSection::class;

    public static function getNavigationGroup(): ?string
    {
        return __('messages.content_management');
    }

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $recordTitleAttribute = 'title';

    public static function getLabel(): ?string
    {
        return __('messages.features');
    }

    public static function getPluralLabel(): ?string
    {
        return __('messages.features');
    }

    public static function getNavigationLabel(): string
    {
        return __('messages.features');
    }

    public static function form(Schema $schema): Schema
    {
        return FeatureSectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeatureSectionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFeatureSections::route('/'),
            'create' => CreateFeatureSection::route('/create'),
            'view' => ViewFeatureSection::route('/{record}'),
            'edit' => EditFeatureSection::route('/{record}/edit'),
        ];
    }
}
