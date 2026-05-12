<?php

namespace App\Filament\Resources\HomePages\Schemas;

use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Filament\Forms\Components\SummernoteEditor;

class HomePageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Home Page Management')
                    ->tabs([

                        // Tab 1: Hero Section
                        Tab::make('Hero Section')
                            ->icon('heroicon-o-home')
                            ->schema([
                                Section::make('Hero Section')
                                    ->description('Manage the hero area text displayed on the home page.')
                                    ->schema([
                                        Textarea::make('hero_subtitle')
                                            ->label('Hero Subtitle')
                                            ->placeholder('100% accurate salary, freelancer, property, and YouTuber calculators...')
                                            ->helperText('This is the short description displayed below the main heading in the hero section.')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // Tab 2: SEO (Meta + Content combined)
                        Tab::make('SEO & Meta Tags')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([
                                Section::make('Meta Tags')
                                    ->description('Manage meta tags to improve search engine visibility.')
                                    ->schema([
                                        TextInput::make('meta_title')
                                            ->label('Meta Title')
                                            ->columnSpanFull(),

                                        Textarea::make('meta_description')
                                            ->label('Meta Description')
                                            ->rows(12)
                                            ->columnSpanFull(),

                                        Textarea::make('meta_keywords')
                                            ->label('Meta Keywords')
                                            ->rows(2)
                                            ->columnSpanFull(),
                                    ]),

                                Section::make('SEO Content')
                                    ->description('Manage the SEO content section displayed on the page.')
                                    ->schema([
                                        TextInput::make('seo_heading')
                                            ->label('Section Heading (H2)')
                                            ->columnSpanFull(),

                                        SummernoteEditor::make('seo_content')
                                            ->label('Detailed Section Body Content')
                                            ->required()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        // Tab 3: Tools Grid
                        Tab::make('Tools Grid')
                            ->icon('heroicon-o-squares-2x2')
                            ->schema([
                                Section::make('All Tools Section')
                                    ->description('Manage the "Our Financial Products" grid.')
                                    ->schema([
                                        Repeater::make('all_tools')
                                            ->label('Tools Grid')
                                            ->reorderable()
                                            ->cloneable()
                                            ->schema([
                                                FileUpload::make('icon')
                                                    ->label('Tool Icon')
                                                    ->disk('public')
                                                    ->directory('tool-icons')
                                                    ->required(),

                                                TextInput::make('title')
                                                    ->label('Tool Title')
                                                    ->required(),

                                                Textarea::make('description')
                                                    ->label('Short Description')
                                                    ->rows(2)
                                                    ->required(),

                                                TextInput::make('link')
                                                    ->label('Target Link (URL)')
                                                    ->required(),

                                                Select::make('color')
                                                    ->label('Theme Color')
                                                    ->options([
                                                        'green' => 'Green (Salary)',
                                                        'blue' => 'Blue (Freelancer)',
                                                        'red' => 'Red (YouTube)',
                                                        'amber' => 'Amber (Rental)',
                                                        'purple' => 'Purple (Capital Gain)',
                                                    ])
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->createItemButtonLabel('Add New Tool'),
                                    ]),
                            ]),

                        // Tab 4: Ads
                        Tab::make('Ads Manager')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Section::make('Ad Placements')
                                    ->schema([
                                        Textarea::make('ad_top')
                                            ->label('Top Banner Ad')
                                            ->rows(4),

                                        Textarea::make('ad_middle')
                                            ->label('Middle Content Ad')
                                            ->rows(4),

                                        Textarea::make('ad_sidebar')
                                            ->label('Sidebar Ad')
                                            ->rows(4),
                                    ])->columns(3),
                            ]),

                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }
}
