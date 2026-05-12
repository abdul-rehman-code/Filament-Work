<?php

namespace App\Filament\Resources;

use App\Models\ActivityLog;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use App\Filament\Resources\ActivityLogResource\Pages;

class ActivityLogResource extends Resource
{
    protected static ?string $model = ActivityLog::class;

    protected static string|\Filament\Support\Icons\Heroicon|\BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('log_name')
                    ->label('Module')
                    ->badge(),
                TextColumn::make('description')
                    ->searchable(),
                TextColumn::make('event')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'created' => 'success',
                        'updated' => 'warning',
                        'deleted' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('causer.name')
                    ->label('User'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }

    public static function infolist(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                \Filament\Infolists\Components\Section::make('Activity Details')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('description'),
                        \Filament\Infolists\Components\TextEntry::make('event')
                            ->badge(),
                        \Filament\Infolists\Components\TextEntry::make('created_at')
                            ->dateTime(),
                        \Filament\Infolists\Components\TextEntry::make('causer.name')
                            ->label('Performed By'),
                    ])->columns(2),
                
                \Filament\Infolists\Components\Section::make('Changes')
                    ->schema([
                        \Filament\Infolists\Components\KeyValueEntry::make('properties.old')
                            ->label('Old Values')
                            ->columnSpanFull()
                            ->visible(fn ($record) => isset($record->properties['old'])),
                        \Filament\Infolists\Components\KeyValueEntry::make('properties.attributes')
                            ->label('New Values')
                            ->columnSpanFull()
                            ->visible(fn ($record) => isset($record->properties['attributes'])),
                    ])
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivityLogs::route('/'),
        ];
    }
}
