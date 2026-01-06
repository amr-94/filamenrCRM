<?php

namespace App\Filament\Resources\PricingPlans;

use App\Filament\Resources\PricingPlans\Pages\CreatePricingPlan;
use App\Filament\Resources\PricingPlans\Pages\EditPricingPlan;
use App\Filament\Resources\PricingPlans\Pages\ListPricingPlans;
use App\Filament\Resources\PricingPlans\Pages\ViewPricingPlan;
use App\Filament\Resources\PricingPlans\Schemas\PricingPlanForm;
use App\Filament\Resources\PricingPlans\Schemas\PricingPlanInfolist;
use App\Filament\Resources\PricingPlans\Tables\PricingPlansTable;
use App\Models\PricingPlan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PricingPlanResource extends Resource
{
    protected static ?string $model = PricingPlan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = '.';

    public static function form(Schema $schema): Schema
    {
        return PricingPlanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PricingPlanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PricingPlansTable::configure($table);
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
            'index' => ListPricingPlans::route('/'),
            'create' => CreatePricingPlan::route('/create'),
            'view' => ViewPricingPlan::route('/{record}'),
            'edit' => EditPricingPlan::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
