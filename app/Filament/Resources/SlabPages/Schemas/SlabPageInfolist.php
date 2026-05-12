<?php

namespace App\Filament\Resources\SlabPages\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;

class SlabPageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Section::make('Article Content')
            ->schema([
                TextEntry::make('article_title')
                ->label('Article Title'),

                TextEntry::make('lead_text')
                ->label('Lead Text'),

                TextEntry::make('article_content')
                ->label('Additional Article Content')
                ->html(),

                TextEntry::make('table_title')
                ->label('Table Title'),

                TextEntry::make('note')
                ->label('Note / Disclaimer'),
            ]),

            Section::make('Tax Slabs Table')
                ->schema([
                    \Filament\Infolists\Components\RepeatableEntry::make('slabs')
                        ->schema([
                            TextEntry::make('year_range')->label('Year'),
                            TextEntry::make('min_income')->label('Min Income')->money('PKR'),
                            TextEntry::make('max_income')->label('Max Income')->money('PKR'),
                            TextEntry::make('fixed_tax')->label('Fixed Tax'),
                            TextEntry::make('percentage_tax')->label('Percentage'),
                        ])->columns(3),
                ]),

            Section::make('SEO Meta Tags')
            ->schema([
                TextEntry::make('meta_title')
                ->label('Meta Title'),

                TextEntry::make('meta_description')
                ->label('Meta Description'),

                TextEntry::make('meta_keywords')
                ->label('Meta Keywords'),
            ]),
        ]);
    }
}
