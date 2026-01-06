<?php

namespace App\Filament\Resources\PricingPlans\Schemas;

use App\Filament\Helpers\SEOForm;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PricingPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Textarea::make('description'),
                TextInput::make('price')
                    ->numeric()
                    ->required(),
                TextInput::make('currency')
                    ->default('SAR')
                    ->required(),
                TextInput::make('period')
                    ->default('/month'),
                TextInput::make('discount_text'),
                Repeater::make('features')
                    ->simple(
                        TextInput::make('feature')
                            ->required()
                    ),
                Toggle::make('is_popular')
                    ->default(false),
                Toggle::make('is_active')
                    ->default(true),
                SEOForm::make(),
            ]);
    }
}
