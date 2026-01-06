<?php

namespace App\Filament\Resources\ReachUs;

use App\Filament\Resources\ReachUs\Pages\CreateReachUs;
use App\Filament\Resources\ReachUs\Pages\EditReachUs;
use App\Filament\Resources\ReachUs\Pages\ListReachUs;
use App\Filament\Resources\ReachUs\Pages\ViewReachUs;
use App\Filament\Resources\ReachUs\Schemas\ReachUsForm;
use App\Filament\Resources\ReachUs\Schemas\ReachUsInfolist;
use App\Filament\Resources\ReachUs\Tables\ReachUsTable;
use App\Models\ReachUs;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReachUsResource extends Resource
{
    protected static ?string $model = ReachUs::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = '.';

    public static function form(Schema $schema): Schema
    {
        return ReachUsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ReachUsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReachUsTable::configure($table);
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
            'index' => ListReachUs::route('/'),
            'create' => CreateReachUs::route('/create'),
            'view' => ViewReachUs::route('/{record}'),
            'edit' => EditReachUs::route('/{record}/edit'),
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
