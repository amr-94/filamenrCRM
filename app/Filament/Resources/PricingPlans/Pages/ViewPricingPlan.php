<?php

namespace App\Filament\Resources\PricingPlans\Pages;

use App\Filament\Resources\PricingPlans\PricingPlanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPricingPlan extends ViewRecord
{
    protected static string $resource = PricingPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
