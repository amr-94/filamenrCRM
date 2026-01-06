<?php

namespace App\Filament\Resources\Faqs\Schemas;

use App\Filament\Helpers\SEOForm;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Textarea::make('question')
                    ->required(),
                RichEditor::make('answer')
                    ->required(),
                TextInput::make('tags'),
                Toggle::make('is_active')
                    ->default(true),
                SEOForm::make(),
            ]);
    }
}
