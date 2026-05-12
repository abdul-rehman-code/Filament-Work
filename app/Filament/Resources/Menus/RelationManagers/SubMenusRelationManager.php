<?php

namespace App\Filament\Resources\Menus\RelationManagers;

use App\Models\Menu;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SubMenusRelationManager extends RelationManager
{
    protected static string $relationship = 'subMenus';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Select::make('url')
                    ->label('Attached Page (Optional)')
                    ->options(Menu::getSelectablePages())
                    ->searchable()
                    ->helperText('Select a page or enter a custom URL below.')
                    ->dehydrateStateUsing(fn ($state, $get) => $get('custom_url') ?: $state),
                TextInput::make('custom_url')
                    ->label('Custom URL (Override)')
                    ->placeholder('https://example.com or /my-page')
                    ->dehydrated(false)
                    ->afterStateHydrated(function (TextInput $component, $state, $record) {
                        if ($record && !array_key_exists($record->url, Menu::getSelectablePages())) {
                            $component->state($record->url);
                        }
                    }),
                TextInput::make('order')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('url'),
                TextColumn::make('order')->sortable(),
                IconColumn::make('is_active')->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
