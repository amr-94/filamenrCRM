<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->label(__('messages.first_name'))
                    ->required(),
                TextInput::make('last_name')
                    ->label(__('messages.last_name'))
                    ->required(),
                TextInput::make('email')
                    ->label(__('messages.email'))
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->label(__('messages.phone'))
                    ->numeric()
                    ->required(),
                TextInput::make('company_name')
                    ->label(__('messages.company_name')),
                Select::make('number_of_locations')
                    ->label(__('messages.number_of_locations'))
                    ->options([
                        '1_location' => __('messages.1_location'),
                        '2_5_locations' => __('messages.2_5_locations'),
                        '6_10_locations' => __('messages.6_10_locations'),
                        '11_25_locations' => __('messages.11_25_locations'),
                        '26_plus_locations' => __('messages.26_plus_locations'),
                    ]),
                Textarea::make('message')
                    ->label(__('messages.message'))
                    ->required(),

            ]);
    }
}
