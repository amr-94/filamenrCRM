<?php

namespace App\Filament\Resources\ReachUs\Pages;

use App\Filament\Resources\ReachUs\ReachUsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditReachUs extends EditRecord
{
    protected static string $resource = ReachUsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
