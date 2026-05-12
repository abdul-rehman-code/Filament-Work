<?php

namespace App\Filament\Resources\RentalTaxPages\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use App\Filament\Forms\Components\SummernoteEditor;

class RentalTaxPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Rental Tax Page Management')
                    ->tabs([

                        // Tab 1: Page Headers
                        Tab::make('Page Headers')
                            ->icon('heroicon-o-home')
                            ->schema([
                                Section::make('Page Headers')
                                    ->description('Set the primary display titles for the Rental Tax tool.')
                                    ->schema([
                                        TextInput::make('h1_title')
                                            ->required()
                                            ->label('Main Heading (H1)'),

                                        Textarea::make('sub_title')
                                            ->label('Short Sub-heading Description'),
                                    ]),
                            ]),
                              Tab::make('Main Article')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Section::make('Main Article')
                                    ->description('Detailed guide for Property Owners.')
                                    ->columnSpanFull()
                                    ->schema([
                                       SummernoteEditor::make('content')
                                            ->label('Detailed Guide / Article')
                                            ->helperText('Use the toolbar above to style your content. This is where the long-form content goes.')
                                            ->required() 
                                            ->columnSpanFull()
                                    ]),
                            ]),


                        // Tab 3: Property Tax Slabs
                        Tab::make('Tax Slabs')
                            ->icon('heroicon-o-table-cells')
                            ->schema([
                                Section::make('Property Tax Slabs')
                                    ->description('Manage the dynamic reference table shown on the page.')
                                    ->columnSpanFull()
                                    ->schema([
                                        Repeater::make('tax_reference_table')
                                            ->label('Reference Rows')
                                            ->schema([
                                                TextInput::make('range')
                                                    ->required()
                                                    ->label('Annual Rent Range')
                                                    ->placeholder('e.g. Up to Rs 300,000'),

                                                TextInput::make('rate')
                                                    ->required()
                                                    ->label('Tax Rate / Formula')
                                                    ->placeholder('e.g. 0% (Fully Exempt)'),
                                            ])
                                            ->columns(2)
                                            ->createItemButtonLabel('Add Table Row')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // Tab 4: Property Tax Tips
                        Tab::make('Tax Tips')
                            ->icon('heroicon-o-clipboard-document-list')
                            ->schema([
                                Section::make('Property Tax Tips')
                                    ->description('Manage the sidebar tips list.')
                                    ->columnSpanFull()
                                    ->schema([
                                        Repeater::make('sidebar_tips')
                                            ->label('Tip Items')
                                            ->schema([
                                                TextInput::make('prefix')
                                                    ->label('Tip Prefix (Green bold)')
                                                    ->placeholder('e.g. 1/5th'),

                                                TextInput::make('text')
                                                    ->required()
                                                    ->label('Tip Text')
                                                    ->placeholder('e.g. repair allowance was standard...'),
                                            ])
                                            ->columns(2)
                                            ->createItemButtonLabel('Add Tip')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
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
                        Tab::make('Ads Manager')
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
