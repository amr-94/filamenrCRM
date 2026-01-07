<?php

namespace App\Filament\Resources\FeatureSections\Pages;

use App\Filament\Resources\FeatureSections\FeatureSectionResource;
use Filament\Resources\Pages\ViewRecord;

class ViewFeatureSection extends ViewRecord
{
    protected static string $resource = FeatureSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\EditAction::make(),
        ];
    }
}
