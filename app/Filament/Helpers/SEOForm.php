<?php

namespace App\Filament\Helpers;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class SEOForm
{
    public static function make(): Section
    {
        return Section::make('SEO Metadata')
            ->description('Optimize your content for search engines.')
            ->collapsed()
            ->schema([
                TextInput::make('seo_title')
                    ->label('SEO Title')
                    ->maxLength(60)
                    ->helperText('Ideal length is 50-60 characters.'),
                Textarea::make('seo_description')
                    ->label('SEO Description')
                    ->maxLength(160)
                    ->helperText('Ideal length is 150-160 characters.'),
                TextInput::make('seo_keywords')
                    ->label('SEO Keywords')
                    ->placeholder('e.g. business, crm, pricing'),
            ]);
    }
}
