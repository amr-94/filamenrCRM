<?php

namespace App\Filament\Resources\ReachUs\Pages;

use App\Filament\Resources\ReachUs\ReachUsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReachUs extends CreateRecord
{
    protected static string $resource = ReachUsResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
