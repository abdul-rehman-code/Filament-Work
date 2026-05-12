<?php

namespace App\Filament\Resources\YoutuberTaxPages;

use App\Filament\Resources\YoutuberTaxPages\Pages;
use App\Models\YoutuberTaxPage;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class YoutuberTaxPageResource extends Resource
{
    protected static ?string $model = YoutuberTaxPage::class;

    protected static string|Heroicon|\BackedEnum|null $navigationIcon = 'heroicon-o-video-camera';

    protected static string|\UnitEnum|null $navigationGroup = 'Tool Pages';

    protected static ?string $recordTitleAttribute = 'h1_title';

    public static function form(Schema $schema): Schema
    {
        return \App\Filament\Resources\YoutuberTaxPages\Schemas\YoutuberTaxPageForm::configure($schema);
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
            'index' => Pages\ManageYoutuberTaxPages::route('/'),
            'edit' => Pages\EditYoutuberTaxPage::route('/{record}/edit'),
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
