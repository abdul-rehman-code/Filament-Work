<?php

namespace App\Filament\Resources\HomePages\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;

class HomePageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Section::make('Hero Section')
            ->schema([
                TextEntry::make('hero_subtitle')
                ->label('Hero Subtitle'),
            ]),

            Section::make('SEO Content')
            ->schema([
                TextEntry::make('seo_heading')
                ->label('SEO Heading'),

                TextEntry::make('seo_content')
                ->label('SEO Content')
                ->html(),
            ]),

            Section::make('Meta Tags')
            ->schema([
                TextEntry::make('meta_title')
                ->label('Meta Title'),

                TextEntry::make('meta_description')
                ->label('Meta Description'),

                TextEntry::make('meta_keywords')
                ->label('Meta Keywords'),
            ]),

            Section::make('All Tools Section')
            ->schema([
                RepeatableEntry::make('all_tools')
                ->label('Tools Grid')
                ->schema([
                    TextEntry::make('icon')
                    ->label('Icon')
                    ->formatStateUsing(fn ($state) => new HtmlString("<img src='" . Storage::disk('public')->url($state) . "' class='w-10 h-10 object-contain' />"))
                    ->html(),
                    
                    TextEntry::make('title')
                    ->label('Title'),
                    
                    TextEntry::make('description')
                    ->label('Description'),
                    
                    TextEntry::make('link')
                    ->label('Link'),
                    
                    TextEntry::make('color')
                    ->label('Theme Color')
                    ->badge()
                    ->colors([
                        'success' => 'green',
                        'info' => 'blue',
                        'danger' => 'red',
                        'warning' => 'amber',
                        'primary' => 'purple',
                    ]),
                ])
                ->columns(['default' => 2]),
            ]),
        ]);
    }
}