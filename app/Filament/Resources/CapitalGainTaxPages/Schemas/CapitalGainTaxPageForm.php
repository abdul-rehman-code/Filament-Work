<?php

namespace App\Filament\Resources\CapitalGainTaxPages\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use App\Filament\Forms\Components\SummernoteEditor;

class CapitalGainTaxPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Capital Gain Tax Page Management')
                    ->tabs([

                        // Tab 1: Page Headers
                        Tab::make('Page Headers')
                            ->icon('heroicon-o-home')
                            ->schema([
                                Section::make('Page Headers')
                                    ->description('Set the primary display titles for the Capital Gain Tax tool.')
                                    ->schema([
                                        TextInput::make('h1_title')
                                            ->required()
                                            ->label('Main Heading (H1)'),

                                        Textarea::make('sub_title')
                                            ->label('Short Sub-heading Description'),

                                        Section::make('Sample Calculation Fields')
                                            ->description('These fields will be used for demonstrating calculations on the page.')
                                            ->schema([
                                                TextInput::make('purchase_price')
                                                    ->label('Purchase Price (PKR)')
                                                    ->placeholder('e.g. 10000000')
                                                    ->numeric(),
                                                TextInput::make('sale_price')
                                                    ->label('Sale Price (PKR)')
                                                    ->placeholder('e.g. 15000000')
                                                    ->numeric(),
                                            ])->columns(2),
                                    ]),
                            ]),
                             // Tab 2: Main Article
                        Tab::make('Main Article')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Section::make('Main Article')
                                    ->description('Detailed guide for Property CGT.')
                                    ->columnSpanFull()
                                    ->schema([
                                        SummernoteEditor::make('content')
                                        ->label('Detailed Guide / Article')
                                        ->helperText('Use the toolbar above to style your content.')
                                        ->columnSpanFull(),
                                    ]),
                            ]),




                        // Tab 3: CGT Rates
                        Tab::make('CGT Rates')
                            ->icon('heroicon-o-table-cells')
                            ->schema([
                                Section::make('Property CGT Rates')
                                    ->description('Manage the dynamic reference table shown on the page.')
                                    ->columnSpanFull()
                                    ->schema([
                                        Repeater::make('tax_reference_table')
                                            ->label('Reference Rows')
                                            ->schema([
                                                TextInput::make('category')
                                                    ->required()
                                                    ->label('Taxpayer Category')
                                                    ->placeholder('e.g. Active Filer'),
                                                TextInput::make('rate')
                                                    ->required()
                                                    ->label('Tax Rate')
                                                    ->placeholder('e.g. 15%'),
                                                TextInput::make('applies_to')
                                                    ->required()
                                                    ->label('Applies To')
                                                    ->placeholder('e.g. Calculated on the net gain...'),
                                            ])
                                            ->columns(3)
                                            ->createItemButtonLabel('Add Table Row')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // Tab 4: CGT Fast Facts
                        Tab::make('CGT Fast Facts')
                            ->icon('heroicon-o-clipboard-document-list')
                            ->schema([
                                Section::make('CGT Fast Facts')
                                    ->description('Manage the sidebar facts list.')
                                    ->columnSpanFull()
                                    ->schema([
                                        Repeater::make('sidebar_tips')
                                            ->label('Fact Items')
                                            ->schema([
                                                TextInput::make('prefix')
                                                    ->label('Fact Prefix (Green/Red bold)')
                                                    ->placeholder('e.g. 15%'),
                                                TextInput::make('text')
                                                    ->required()
                                                    ->label('Fact Text')
                                                    ->placeholder('e.g. Flat rate for active income tax filers.'),
                                                TextInput::make('color')
                                                    ->label('Prefix Color')
                                                    ->helperText('Choose: green, red')
                                                    ->default('green'),
                                            ])
                                            ->columns(3)
                                            ->createItemButtonLabel('Add Fact')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                            // Tab 2: SEO & Metadata
                        Tab::make('SEO & Metadata')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([
                                Section::make('SEO & Metadata')
                                    ->description('Manage search engine optimization tags.')
                                    ->collapsible()
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
                        Tab::make('Ads Manager')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Section::make('Ad Placements')
                                    ->description('Paste your Google AdSense or other ad code snippets here.')
                                    ->collapsible()
                                    ->schema([
                                        Textarea::make('ad_top')->label('Top Leaderboard Ad Code'),
                                        Textarea::make('ad_middle')->label('Article Inline Ad Code'),
                                        Textarea::make('ad_sidebar')->label('Sidebar Rectangle Ad Code'),
                                    ]),
                            ]),

                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }
}
