<?php

namespace App\Filament\Resources\ReachUs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ReachUsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('contact_type')
                    ->label(__('messages.contact_type'))
                    ->options([
                        'email' => __('messages.email'),
                        'phone' => __('messages.phone'),
                        'office' => __('messages.office'),
                    ])
                    ->required(),
                TextInput::make('title')
                    ->label(__('messages.title')),
                TextInput::make('value')
                    ->label(__('messages.value'))
                    ->required(),
                TextInput::make('icon')
                    ->label(__('messages.icon')),
                Toggle::make('is_active')
                    ->label(__('messages.is_active'))
                    ->default(true),
            ]);
    }
}
