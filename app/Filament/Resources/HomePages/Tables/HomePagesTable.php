<?php

namespace App\Filament\Resources\HomePages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;

class HomePagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            \Filament\Tables\Columns\TextColumn::make('hero_subtitle')
            ->label('Hero Subtitle')
            ->limit(50)
            ->searchable(),
            \Filament\Tables\Columns\TextColumn::make('seo_heading')
            ->label('SEO Heading')
            ->limit(50)
            ->searchable(),
            \Filament\Tables\Columns\TextColumn::make('meta_title')
            ->label('Meta Title')
            ->searchable(),
            \Filament\Tables\Columns\TextColumn::make('updated_at')
            ->label('Last Updated')
            ->dateTime()
            ->sortable(),
        ])
            ->filters([
            //
        ])
            ->recordActions([
            // ViewAction::make(),
            EditAction::make(),
        ])
            ->toolbarActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ]);
    }
}
