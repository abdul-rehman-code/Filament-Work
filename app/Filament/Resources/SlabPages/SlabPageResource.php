<?php

namespace App\Filament\Resources\SlabPages;

use App\Filament\Resources\SlabPages\Pages\CreateSlabPage;
use App\Filament\Resources\SlabPages\Pages\EditSlabPage;
use App\Filament\Resources\SlabPages\Pages\ListSlabPages;
use App\Filament\Resources\SlabPages\Pages\ViewSlabPage;
use App\Filament\Resources\SlabPages\Schemas\SlabPageForm;
use App\Filament\Resources\SlabPages\Schemas\SlabPageInfolist;
use App\Models\SlabPage;
use App\Filament\Resources\SlabPages\Tables\SlabPagesTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SlabPageResource extends Resource
{
    protected static ?string $model = SlabPage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;



    protected static string|\UnitEnum|null $navigationGroup = 'Pages';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'article_title';

    public static function form(Schema $schema): Schema
    {
        return SlabPageForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SlabPageInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SlabPagesTable::configure($table);
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
            'index' => ListSlabPages::route('/'),
            'create' => CreateSlabPage::route('/create'),
            'view' => ViewSlabPage::route('/{record}'),
            'edit' => EditSlabPage::route('/{record}/edit'),
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
