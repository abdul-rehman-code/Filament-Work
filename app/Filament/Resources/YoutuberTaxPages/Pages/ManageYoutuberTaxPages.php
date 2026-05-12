<?php

namespace App\Filament\Resources\YoutuberTaxPages\Pages;

use App\Filament\Resources\YoutuberTaxPages\YoutuberTaxPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageYoutuberTaxPages extends ManageRecords
{
    protected static string $resource = YoutuberTaxPageResource::class;

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
