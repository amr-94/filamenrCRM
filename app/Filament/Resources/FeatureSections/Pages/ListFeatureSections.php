<?php

namespace App\Filament\Resources\FeatureSections\Pages;

use App\Filament\Resources\FeatureSections\FeatureSectionResource;
use Filament\Resources\Pages\ListRecords;

class ListFeatureSections extends ListRecords
{
    protected static string $resource = FeatureSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make(),
        ];
    }
}
