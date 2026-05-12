<?php

namespace App\Filament\Resources\SlabPages\Pages;

use App\Filament\Resources\SlabPages\SlabPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSlabPages extends ListRecords
{
    protected static string $resource = SlabPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
    public function mount(): void
    {
        $record = static::getResource()::getModel()::first();

        if ($record) {
            redirect(static::getResource()::getUrl('edit', ['record' => $record->id]));
        }
    }
}
