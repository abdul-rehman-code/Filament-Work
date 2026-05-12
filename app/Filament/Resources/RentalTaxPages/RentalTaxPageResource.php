<?php

namespace App\Filament\Resources\RentalTaxPages;

use App\Filament\Resources\RentalTaxPages\Pages;
use App\Models\RentalTaxPage;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class RentalTaxPageResource extends Resource
{
    protected static ?string $model = RentalTaxPage::class;

    protected static string|Heroicon|\BackedEnum|null $navigationIcon = 'heroicon-o-home-modern';

    protected static string|\UnitEnum|null $navigationGroup = 'Tool Pages';

    protected static ?string $recordTitleAttribute = 'h1_title';

    public static function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\RentalTaxPages\Schemas\RentalTaxPageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('h1_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageRentalTaxPages::route('/'),
            'edit' => Pages\EditRentalTaxPage::route('/{record}/edit'),
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
