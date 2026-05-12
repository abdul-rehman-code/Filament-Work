<?php

namespace App\Filament\Resources\SalaryTaxPages;

use App\Filament\Resources\SalaryTaxPages\Pages\EditSalaryTaxPage;
use App\Filament\Resources\SalaryTaxPages\Pages\ListSalaryTaxPages;
use App\Filament\Resources\SalaryTaxPages\Schemas\SalaryTaxPageForm;
use App\Filament\Resources\SalaryTaxPages\Tables\SalaryTaxPagesTable;
use App\Models\SalaryTaxPage;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SalaryTaxPageResource extends Resource
{
    protected static ?string $model = SalaryTaxPage::class;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCalculator;

    protected static string|\UnitEnum|null $navigationGroup = 'Tool Pages';

    protected static ?string $navigationLabel = 'Salary Tax Settings';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return SalaryTaxPageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SalaryTaxPagesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSalaryTaxPages::route('/'),
            'edit' => EditSalaryTaxPage::route('/{record}/edit'),
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
