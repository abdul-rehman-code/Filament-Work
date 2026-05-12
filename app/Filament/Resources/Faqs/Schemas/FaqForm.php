<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use App\Filament\Forms\Components\SummernoteEditor;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('FAQ Management')
                    ->tabs([

                        // Tab 1: General Information
                        Tab::make('General Info')
                            ->icon('heroicon-o-chat-bubble-left-ellipsis')
                            ->schema([
                                Section::make('General Information')
                                    ->schema([
                                        TextInput::make('question')
                                            ->required()
                                            ->columnSpanFull(),

                                        Textarea::make('answer')
                                            ->required()
                                            ->rows(8)
                                            ->columnSpanFull(),

                                        Toggle::make('is_active')
                                            ->label('Visible on Website')
                                            ->default(true),
                                    ]),
                            ]),


                        // Tab 2: Ads
                        Tab::make('Ads')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                Section::make('Ad Placements')
                                    ->description('Manage advertisements for this FAQ item.')
                                    ->schema([
                                        Textarea::make('ad_top')
                                            ->label('Top Banner Ad')
                                            ->rows(3),

                                        Textarea::make('ad_middle')
                                            ->label('Middle Content Ad')
                                            ->rows(3),

                                        Textarea::make('ad_sidebar')
                                            ->label('Sidebar Ad')
                                            ->rows(3),
                                    ])->columns(3),
                            ]),

                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }
}
