<?php

namespace App\Filament\Resources\YoutuberTaxPages\Schemas;

use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;
use App\Filament\Forms\Components\SummernoteEditor;

class YoutuberTaxPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Youtuber Tax Page Management')
                    ->tabs([

                        // Tab 1: Page Headers
                        Tab::make('Page Headers')
                            ->icon('heroicon-o-home')
                            ->schema([
                                Section::make('Page Headers')
                                    ->description('Set the primary display titles for the Youtuber Tax tool.')
                                    ->schema([
                                        TextInput::make('h1_title')
                                            ->required()
                                            ->label('Main Heading (H1)'),

                                        Textarea::make('sub_title')
                                            ->label('Short Sub-heading Description'),
                                    ]),
                            ]),
                             // Tab 5: Main Article
                        Tab::make('Main Article')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Section::make('Main Article')
                                    ->description('Detailed guide for Youtubers.')
                                    ->columnSpanFull()
                                    ->schema([
                                       SummernoteEditor::make('content')
                                            ->label('Detailed Guide / Article')
                                            ->helperText('Use the toolbar above to style your content. This is where the long-form content goes.')
                                            ->columnSpanFull()
                                    ]),
                            ]),


                        // Tab 3: Tax Reference Table
                        Tab::make('Tax Reference Table')
                            ->icon('heroicon-o-table-cells')
                            ->schema([
                                Section::make('📊 How YouTube Income is Taxed')
                                    ->description('Manage the dynamic reference table shown on the page.')
                                    ->columnSpanFull()
                                    ->schema([
                                        Repeater::make('tax_reference_table')
                                            ->label('Reference Rows')
                                            ->schema([
                                                TextInput::make('income_type')
                                                    ->required()
                                                    ->label('Income Type')
                                                    ->placeholder('e.g. AdSense (USD)'),

                                                TextInput::make('source')
                                                    ->required()
                                                    ->label('Source')
                                                    ->placeholder('e.g. Google/YouTube Wire'),

                                                TextInput::make('tax_rule')
                                                    ->required()
                                                    ->label('Tax Rule')
                                                    ->placeholder('e.g. Section 154A — Final Tax'),

                                                TextInput::make('rate_label')
                                                    ->required()
                                                    ->label('Rate Badge Label')
                                                    ->placeholder('e.g. 1.00% FWT'),

                                                TextInput::make('rate_color')
                                                    ->required()
                                                    ->label('Rate Color Type')
                                                    ->helperText('Choose: blue, orange, red')
                                                    ->default('blue'),
                                            ])
                                            ->columns(5)
                                            ->createItemButtonLabel('Add Table Row')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // Tab 4: Key Tax Rules
                        Tab::make('Key Tax Rules')
                            ->icon('heroicon-o-clipboard-document-list')
                            ->schema([
                                Section::make('📋 Key Tax Rules')
                                    ->description('Manage the sidebar rules list.')
                                    ->columnSpanFull()
                                    ->schema([
                                        Repeater::make('key_tax_rules')
                                            ->label('Rule Items')
                                            ->schema([
                                                TextInput::make('prefix')
                                                    ->label('Rule Prefix (Green bold)')
                                                    ->placeholder('e.g. 1%'),

                                                TextInput::make('text')
                                                    ->required()
                                                    ->label('Rule Text')
                                                    ->placeholder('e.g. FWT on all USD AdSense...'),
                                            ])
                                            ->columns(2)
                                            ->createItemButtonLabel('Add Rule')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // Tab 2: SEO & Metadata
                        Tab::make('SEO & Metadata')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([
                                Section::make('SEO & Metadata')
                                    ->description('Manage search engine optimization tags.')
                                    ->schema([
                                        TextInput::make('meta_title')
                                            ->label('SEO Title Tag'),

                                        Textarea::make('meta_description')
                                            ->label('Meta Description'),

                                        TextInput::make('meta_keywords')
                                            ->label('Meta Keywords (comma separated)'),
                                    ]),
                            ]),



                        // Tab 6: Ads
                        Tab::make('Ads')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Section::make('Ad Placements')
                                    ->description('Paste your Google AdSense or other ad code snippets here.')
                                    ->schema([
                                        Textarea::make('ad_top')
                                            ->label('Top Leaderboard Ad Code'),

                                        Textarea::make('ad_middle')
                                            ->label('Article Inline Ad Code'),

                                        Textarea::make('ad_sidebar')
                                            ->label('Sidebar Rectangle Ad Code'),
                                    ])->columns(3),
                            ]),

                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }
}
