<?php

namespace App\Filament\Resources\SlabPages\Schemas;

use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;
use App\Filament\Forms\Components\SummernoteEditor;

class SlabPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Slab Page Management')
                    ->tabs([

                        // Tab 1: Article Content
                        Tab::make('Article Content')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Section::make('Article Content')
                                    ->description('Manage the main article content of the Slabs page.')
                                    ->schema([
                                        TextInput::make('article_title')
                                            ->label('Article Title')
                                            ->required()
                                            ->columnSpanFull(),

                                        TextInput::make('lead_text')
                                            ->label('Lead Text')
                                            ->required()
                                            ->columnSpanFull(),

                                        SummernoteEditor::make('article_content')
                                            ->label('Article Content')
                                            ->required()
                                            ->columnSpanFull(),

                                        TextInput::make('table_title')
                                            ->label('Table Title')
                                            ->required()
                                            ->columnSpan(1),

                                        TextInput::make('note')
                                            ->label('Footer Note')
                                            ->columnSpan(1),
                                    ])->columns(2),
                            ]),
                            // Tab 3: Tax Slabs Table
                        Tab::make('Tax Slabs Table')
                            ->icon('heroicon-o-table-cells')
                            ->schema([
                                Section::make('Tax Slabs Table')
                                    ->description('Manage the individual tax slab records.')
                                    ->schema([
                                        Repeater::make('slabs')
                                            ->relationship('slabs')
                                            ->schema([
                                                TextInput::make('year_range')
                                                    ->label('Year Range')
                                                    ->required()
                                                    ->columnSpan(1),

                                                TextInput::make('min_income')
                                                    ->label('Min Income')
                                                    ->numeric()
                                                    ->required()
                                                    ->columnSpan(1),

                                                TextInput::make('max_income')
                                                    ->label('Max Income')
                                                    ->numeric()
                                                    ->columnSpan(1),

                                                TextInput::make('fixed_tax')
                                                    ->label('Fixed Tax')
                                                    ->required()
                                                    ->columnSpan(1),

                                                TextInput::make('percentage_tax')
                                                    ->label('Percentage Tax')
                                                    ->required()
                                                    ->columnSpan(1),

                                                Textarea::make('description')
                                                    ->label('Description')
                                                    ->rows(2)
                                                    ->columnSpanFull(),
                                            ])
                                            ->columns(2)
                                            ->itemLabel(fn(array $state): ?string => $state['year_range'] ?? null)
                                            ->defaultItems(0)
                                            ->reorderableWithButtons(),
                                    ]),
                            ]),

                        // Tab 2: SEO Meta Tags
                        Tab::make('SEO Meta Tags')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([
                                Section::make('SEO Meta Tags')
                                    ->description('Manage the SEO settings for this page.')
                                    ->schema([
                                        TextInput::make('meta_title')
                                            ->label('Meta Title')
                                            ->required()
                                            ->columnSpanFull(),

                                        Textarea::make('meta_description')
                                            ->label('Meta Description')
                                            ->required()
                                            ->rows(3)
                                            ->columnSpanFull(),

                                        Textarea::make('meta_keywords')
                                            ->label('Meta Keywords')
                                            ->placeholder('e.g. tax, slabs, pakistan, 2024')
                                            ->columnSpanFull(),
                                    ]),
                            ]),



                        // Tab 4: Ads
                        Tab::make('Ads Manager')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Section::make('Ad Placements')
                                    ->description('Manage advertisements across the slabs page.')
                                    ->schema([
                                        Textarea::make('ad_top')
                                            ->label('Top Banner Ad')
                                            ->placeholder('Paste script or HTML here...')
                                            ->rows(3),

                                        Textarea::make('ad_middle')
                                            ->label('Middle Content Ad')
                                            ->placeholder('Paste script or HTML here...')
                                            ->rows(3),

                                        Textarea::make('ad_sidebar')
                                            ->label('Sidebar Ad')
                                            ->placeholder('Paste script or HTML here...')
                                            ->rows(3),
                                    ])->columns(3),
                            ]),

                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }
}
