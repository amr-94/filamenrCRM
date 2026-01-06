<?php

namespace App\Filament\Resources\ReachUs\Pages;

use App\Filament\Resources\ReachUs\ReachUsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewReachUs extends ViewRecord
{
    protected static string $resource = ReachUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
