<?php

namespace App\Filament\Resources\SlabPages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SlabPagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('article_title')
                    ->label('Article Title')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('meta_title')
                    ->label('Meta Title')
                    ->limit(50)
                    ->searchable(),
                IconColumn::make('is_flex_grow')
                    ->label('Flex Grow')
                    ->boolean(),
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
