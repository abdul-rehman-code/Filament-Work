<?php

namespace App\Filament\Resources\SalaryTaxPages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use App\Filament\Forms\Components\SummernoteEditor;

class SalaryTaxPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Salary Tax Controls')
                    ->tabs([
                         Tab::make('Headings')
                            ->icon('heroicon-o-bookmark')
                            ->schema([
                                TextInput::make('h1_title')
                                    ->label('Main H1 Title')
                                    ->placeholder('e.g. Salary Tax Calculator Pakistan (2025-2026)')
                                    ->required(),
                                TextInput::make('sub_title')
                                    ->label('Sub-Title / Intro')
                                    ->required(),
                            ]),

                        Tab::make('Content Block')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                SummernoteEditor::make('content')
                                    ->label('Detailed Guide / Article')
                                    ->helperText('Use the toolbar above to style your content. This is where the long-form content goes.')
                                    ->required()
                                    ->columnSpanFull()
                            ]),
                              Tab::make('SEO Strategy')
                            ->icon('heroicon-o-globe-alt')
                            ->schema([
                                TextInput::make('meta_title')
                                    ->label('Meta Title (Title Tag)')
                                    ->helperText('50-60 characters optimally')
                                    ->required(),
                                Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->helperText('Include strong call to action and keywords. ~150-160 characters.')
                                    ->rows(3),
                                TextInput::make('meta_keywords')
                                    ->label('Keywords (Comma separated)')
                                    ->helperText('e.g., FBR salary tax, income tax calculator pakistan 2025'),
                            ]),


                        Tab::make('Ad Slots')
                            ->icon('heroicon-o-currency-dollar')
                            ->schema([
                                Textarea::make('ad_top')->label('Top Leaderboard Ad Code'),
                                Textarea::make('ad_middle')->label('Middle/Inline Ad Code'),
                                Textarea::make('ad_sidebar')->label('Sidebar Rectangle Ad Code'),
                            ]),
                            Tab::make('FAQs')
                            ->icon('heroicon-o-question-mark-circle')
                            ->schema([
                                Repeater::make('faqs')
                                    ->label('Frequently Asked Questions')
                                    ->schema([
                                        TextInput::make('question')
                                            ->required()
                                            ->label('Question Question'),
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

                    ])
                    ->columnSpanFull(),
            ]);
    }
}
