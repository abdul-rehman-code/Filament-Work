<?php

namespace App\Filament\Resources\SalaryTaxPages\Pages;

use App\Filament\Resources\SalaryTaxPages\SalaryTaxPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSalaryTaxPages extends ListRecords
{
    protected static string $resource = SalaryTaxPageResource::class;

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
