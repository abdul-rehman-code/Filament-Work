<?php

namespace App\Filament\Resources\Menus\Schemas;

use App\Models\Menu;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Section::make('Menu Details')
            ->schema([
                TextInput::make('title')
                ->required()
                ->maxLength(255),
                Select::make('url')
                ->label('Attached Page (Optional)')
                ->options(Menu::getSelectablePages())
                ->searchable()
                ->helperText('Select a page or enter a custom URL below if needed.')
                ->dehydrateStateUsing(fn ($state, $get) => $get('custom_url') ?: $state),

                TextInput::make('custom_url')
                ->label('Custom URL (Override)')
                ->placeholder('https://example.com or /my-page')
                ->helperText('If you enter a custom URL here, it will take priority over the selected page.')
                ->dehydrated(false)
                ->afterStateHydrated(function (TextInput $component, $state, $record) {
                    if ($record && !array_key_exists($record->url, Menu::getSelectablePages())) {
                        $component->state($record->url);
                    }
                }),

                Select::make('location')
                ->options([
                    'header' => 'Header Navigation',
                    'footer' => 'Footer Links',
                ])
                ->required()
                ->default('header'),
                TextInput::make('order')
                ->numeric()
                ->default(0),
                Toggle::make('is_active')
                ->default(true),
            ])->columns(2),

            Section::make('Sub Menus')
                ->description('Manage children for this menu item (Mega Menu).')
                ->schema([
                    \Filament\Forms\Components\Repeater::make('subMenus')
                        ->relationship('subMenus')
                        ->schema([
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
                        ])
                        ->columns(2)
                        ->itemLabel(fn(array $state): ?string => $state['title'] ?? null)
                        ->defaultItems(0)
                        ->reorderableWithButtons(),
                ]),
        ]);
    }
}
