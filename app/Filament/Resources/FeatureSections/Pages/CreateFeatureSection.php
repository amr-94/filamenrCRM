<?php

namespace App\Filament\Resources\FeatureSections\Pages;

use App\Filament\Resources\FeatureSections\FeatureSectionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFeatureSection extends CreateRecord
{
    protected static string $resource = FeatureSectionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
