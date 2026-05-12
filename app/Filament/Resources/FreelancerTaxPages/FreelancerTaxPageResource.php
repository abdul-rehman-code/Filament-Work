<?php

namespace App\Filament\Resources\FreelancerTaxPages;

use App\Filament\Resources\FreelancerTaxPages\Pages\CreateFreelancerTaxPage;
use App\Filament\Resources\FreelancerTaxPages\Pages\EditFreelancerTaxPage;
use App\Filament\Resources\FreelancerTaxPages\Pages\ListFreelancerTaxPages;
use App\Filament\Resources\FreelancerTaxPages\Pages\ViewFreelancerTaxPage;
use App\Filament\Resources\FreelancerTaxPages\Schemas\FreelancerTaxPageForm;
use App\Filament\Resources\FreelancerTaxPages\Schemas\FreelancerTaxPageInfolist;
use App\Filament\Resources\FreelancerTaxPages\Tables\FreelancerTaxPagesTable;
use App\Models\FreelancerTaxPage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FreelancerTaxPageResource extends Resource
{
    protected static ?string $model = FreelancerTaxPage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Tool Pages';
    protected static ?string $recordTitleAttribute = 'h1_title';

    public static function form(Schema $schema): Schema
    {
        return FreelancerTaxPageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FreelancerTaxPageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FreelancerTaxPagesTable::configure($table);
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
            'index' => ListFreelancerTaxPages::route('/'),
            //'create' => CreateFreelancerTaxPage::route('/create'),
            //'view' => ViewFreelancerTaxPage::route('/{record}'),
            'edit' => EditFreelancerTaxPage::route('/{record}/edit'),
        ];
    }
        public static function getNavigationUrl(): string
{
    $firstRecord = static::getModel()::first();
    if ($firstRecord) {
        return static::getUrl('edit', ['record' => $firstRecord->id]);
    }
    return static::getUrl('index');
}
}
