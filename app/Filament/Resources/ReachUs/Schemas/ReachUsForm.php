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
                    ->options([
                        'Email' => 'Email',
                        'Phone' => 'Phone',
                        'Office' => 'Office',
                    ])
                    ->required(),
                TextInput::make('title'),
                TextInput::make('value')
                    ->required(),
                TextInput::make('icon'),
                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}
