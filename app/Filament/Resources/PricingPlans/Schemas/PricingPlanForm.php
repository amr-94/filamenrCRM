<?php

namespace App\Filament\Resources\PricingPlans\Schemas;

use App\Filament\Helpers\SEOForm;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
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
                    ->label(__('messages.title'))
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Textarea::make('description')
                    ->label(__('messages.description')),
                TextInput::make('price')
                    ->label(__('messages.price'))
                    ->numeric()
                    ->required(),
                TextInput::make('currency')
                    ->label(__('messages.currency'))
                    ->required(),
                Select::make('period')
                    ->label(__('messages.period'))
                    ->options([
                        'monthly' => __('messages.monthly'),
                        'yearly' => __('messages.yearly'),
                    ])
                    ->required(),
                TextInput::make('discount_text')
                    ->label(__('messages.discount_text')),
                Repeater::make('features')
                    ->label(__('messages.features'))
                    ->simple(
                        TextInput::make('feature')
                            ->required()
                    ),
                Toggle::make('is_popular')
                    ->label(__('messages.is_popular'))
                    ->default(false),
                Toggle::make('is_active')
                    ->label(__('messages.is_active'))
                    ->default(true),
                SEOForm::make(),
            ]);
    }
}
