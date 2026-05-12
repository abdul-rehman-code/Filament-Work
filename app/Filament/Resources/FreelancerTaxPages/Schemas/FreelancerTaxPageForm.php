<?php

namespace App\Filament\Resources\FreelancerTaxPages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use App\Filament\Forms\Components\SummernoteEditor;

class FreelancerTaxPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Freelancer Tax Controls')
                    ->tabs([ Tab::make('Headings')
                            ->icon('heroicon-o-bookmark')
                            ->schema([
                                TextInput::make('h1_title')
                                    ->required()
                                    ->label('Main Heading (H1)'),
                                Textarea::make('sub_title')
                                    ->label('Short Sub-heading Description'),
                            ]),

                        Tab::make('Content Block')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                SummernoteEditor::make('content')
                                ->label('Main HTML Content')
                                ->helperText('Use the toolbar above to style your content. Pure HTML is supported.')
                                ->required()
                                ->columnSpanFull()
                            ]),

                        Tab::make('FAQs')
                            ->icon('heroicon-o-question-mark-circle')
                            ->schema([
                                Repeater::make('faqs')
                                    ->label('Frequently Asked Questions')
                                    ->schema([
                                        TextInput::make('question')
                                            ->required()
                                            ->label('Question Text'),
                                        Textarea::make('answer')
                                            ->required()
                                            ->rows(3)
                                            ->label('Answer Text'),
                                    ])
                                    ->collapsible()
                                    ->cloneable()
                                    ->defaultItems(0)
                                    ->columnSpanFull(),
                            ]),

                        Tab::make('Configuration')
                            ->icon('heroicon-o-cog')
                            ->schema([
                                Section::make('📊 Tax Comparison Table')
                                    ->schema([
                                        TextInput::make('comparison_title')
                                            ->label('Section Title')
                                            ->default('📊 PSEB vs Non-PSEB Tax Comparison'),
                                        TextInput::make('comparison_subtitle')
                                            ->label('Section Subtitle')
                                            ->default('Section 154A — Exports of IT Services | FBR Finance Act 2025'),

                                        Grid::make(3)->schema([
                                            TextInput::make('comparison_first_column_label')
                                                ->label('First Column Label')
                                                ->default('Monthly Remittance'),
                                            TextInput::make('pseb_rate_label')
                                                ->label('PSEB Column Label')
                                                ->default('PSEB (0.25%)'),
                                            TextInput::make('pseb_rate_value')
                                                ->label('PSEB Rate (Decimal)')
                                                ->numeric()
                                                ->default(0.0025)
                                                ->step(0.0001),
                                            TextInput::make('non_pseb_rate_label')
                                                ->label('Non-PSEB Column Label')
                                                ->default('No PSEB (1.00%)'),
                                            TextInput::make('non_pseb_rate_value')
                                                ->label('Non-PSEB Rate (Decimal)')
                                                ->numeric()
                                                ->default(0.01)
                                                ->step(0.0001),
                                        ]),

                                        Repeater::make('comparison_amounts')
                                            ->label('Comparison Amounts (PKR)')
                                            ->schema([
                                                TextInput::make('amount')->numeric()->required()->label('Amount'),
                                            ])
                                            ->createItemButtonLabel('Add Amount Row')
                                            ->columnSpanFull()
                                            ->grid(3),
                                    ])->collapsible(),

                                Section::make('💡 PSEB Quick Facts')
                                    ->schema([
                                        Repeater::make('pseb_facts')
                                            ->label('Quick Facts')
                                            ->schema([
                                                RichEditor::make('text')->required()->toolbarButtons(['bold', 'link']),
                                            ])
                                            ->createItemButtonLabel('Add Fact')
                                            ->columnSpanFull(),
                                    ])->collapsible(),

                                Section::make('💳 FBR-Accepted Gateways')
                                    ->schema([
                                        Repeater::make('fbr_gateways')
                                            ->label('Gateways')
                                            ->schema([
                                                TextInput::make('name')->required()->label('Gateway Name'),
                                                Toggle::make('is_covered')->label('Is Covered?')->default(true),
                                            ])
                                            ->columns(2)
                                            ->createItemButtonLabel('Add Gateway')
                                            ->columnSpanFull(),
                                    ])->collapsible(),
                            ]),
                            Tab::make('SEO Strategy')
                            ->icon('heroicon-o-globe-alt')
                            ->schema([
                                TextInput::make('meta_title')
                                    ->label('SEO Title Tag'),
                                Textarea::make('meta_description')
                                    ->label('Meta Description'),
                                TextInput::make('meta_keywords')
                                    ->label('Meta Keywords (comma separated)'),
                            ]),

                        Tab::make('Ads Manager')
                            ->icon('heroicon-o-currency-dollar')
                            ->schema([
                                Textarea::make('ad_top')->label('Top Leaderboard Ad Code'),
                                Textarea::make('ad_middle')->label('Article Inline Ad Code'),
                                Textarea::make('ad_sidebar')->label('Sidebar Rectangle Ad Code'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
