<?php

namespace App\Filament\Resources\FeatureSections\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use App\Filament\Helpers\SEOForm;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FeatureSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('messages.details'))
                    ->schema([
                        TextInput::make('badge')
                            ->label(__('messages.badge'))
                            ->maxLength(255),
                        TextInput::make('title')
                            ->label(__('messages.title'))
                            ->required()
                            ->maxLength(255),
                        TextInput::make('subtitle')
                            ->label(__('messages.subtitle'))
                            ->maxLength(255),
                        RichEditor::make('description')
                            ->label(__('messages.description')),
                        Select::make('image_position')
                            ->label(__('messages.image_position'))
                            ->options([
                                'left' => __('messages.left'),
                                'right' => __('messages.right'),
                            ])
                            ->default('left')
                            ->required(),
                        SpatieMediaLibraryFileUpload::make('image')
                            ->label(__('messages.image'))
                            ->collection('image')
                            ->image()
                            ->disk('public'),
                        Toggle::make('is_active')
                            ->label(__('messages.is_active'))
                            ->default(true),
                        SEOForm::make(),
                    ]),

                Section::make(__('messages.features'))
                    ->schema([
                        Repeater::make('items')
                            ->relationship('items')
                            ->reorderable('order')
                            ->schema([
                                TextInput::make('title')
                                    ->label(__('messages.title'))
                                    ->required()
                                    ->maxLength(255),
                                ToggleButtons::make('icon')
                                    ->label(__('messages.icon'))
                                    ->options([
                                        'heroicon-o-shopping-cart' => ' ',
                                        'heroicon-o-banknotes' => ' ',
                                        'heroicon-o-credit-card' => ' ',
                                        'heroicon-o-calculator' => ' ',
                                        'heroicon-o-document-text' => ' ',
                                        'heroicon-o-users' => ' ',
                                        'heroicon-o-cube' => ' ',
                                        'heroicon-o-presentation-chart-line' => ' ',
                                        'heroicon-o-qr-code' => ' ',
                                        'heroicon-o-printer' => ' ',
                                        'heroicon-o-tag' => ' ',
                                        'heroicon-o-home' => ' ',
                                        'heroicon-o-clock' => ' ',
                                        'heroicon-o-device-tablet' => ' ',
                                        'heroicon-o-cog-6-tooth' => ' ',
                                        'heroicon-o-lock-closed' => ' ',
                                        'heroicon-o-wifi' => ' ',
                                        'heroicon-o-identification' => ' ',
                                        'heroicon-o-archive-box' => ' ',
                                        'heroicon-o-arrow-path' => ' ',
                                    ])
                                    ->icons([
                                        'heroicon-o-shopping-cart' => 'heroicon-o-shopping-cart',
                                        'heroicon-o-banknotes' => 'heroicon-o-banknotes',
                                        'heroicon-o-credit-card' => 'heroicon-o-credit-card',
                                        'heroicon-o-calculator' => 'heroicon-o-calculator',
                                        'heroicon-o-document-text' => 'heroicon-o-document-text',
                                        'heroicon-o-users' => 'heroicon-o-users',
                                        'heroicon-o-cube' => 'heroicon-o-cube',
                                        'heroicon-o-presentation-chart-line' => 'heroicon-o-presentation-chart-line',
                                        'heroicon-o-qr-code' => 'heroicon-o-qr-code',
                                        'heroicon-o-printer' => 'heroicon-o-printer',
                                        'heroicon-o-tag' => 'heroicon-o-tag',
                                        'heroicon-o-home' => 'heroicon-o-home',
                                        'heroicon-o-clock' => 'heroicon-o-clock',
                                        'heroicon-o-device-tablet' => 'heroicon-o-device-tablet',
                                        'heroicon-o-cog-6-tooth' => 'heroicon-o-cog-6-tooth',
                                        'heroicon-o-lock-closed' => 'heroicon-o-lock-closed',
                                        'heroicon-o-wifi' => 'heroicon-o-wifi',
                                        'heroicon-o-identification' => 'heroicon-o-identification',
                                        'heroicon-o-archive-box' => 'heroicon-o-archive-box',
                                        'heroicon-o-arrow-path' => 'heroicon-o-arrow-path',
                                    ])
                                    ->inline()
                                    ->required(),
                            ])
                            ->columns(3)
                            ->label(__('messages.feature_items')),
                    ]),
            ]);
    }
}
