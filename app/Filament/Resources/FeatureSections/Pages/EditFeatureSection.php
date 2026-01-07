<?php

namespace App\Filament\Resources\FeatureSections\Pages;

use App\Filament\Resources\FeatureSections\FeatureSectionResource;
use Filament\Resources\Pages\EditRecord;

class EditFeatureSection extends EditRecord
{
    protected static string $resource = FeatureSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
