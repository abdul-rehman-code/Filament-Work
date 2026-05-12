<?php

namespace App\Filament\Resources\CapitalGainTaxPages\Pages;

use App\Filament\Resources\CapitalGainTaxPages\CapitalGainTaxPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageCapitalGainTaxPages extends ManageRecords
{
    protected static string $resource = CapitalGainTaxPageResource::class;

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
