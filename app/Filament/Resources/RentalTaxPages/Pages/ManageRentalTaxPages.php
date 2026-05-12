<?php

namespace App\Filament\Resources\RentalTaxPages\Pages;

use App\Filament\Resources\RentalTaxPages\RentalTaxPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageRentalTaxPages extends ManageRecords
{
    protected static string $resource = RentalTaxPageResource::class;

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
