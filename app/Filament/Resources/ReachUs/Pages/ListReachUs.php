<?php

namespace App\Filament\Resources\ReachUs\Pages;

use App\Filament\Resources\ReachUs\ReachUsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReachUs extends ListRecords
{
    protected static string $resource = ReachUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
