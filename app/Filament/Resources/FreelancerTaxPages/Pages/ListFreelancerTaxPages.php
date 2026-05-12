<?php

namespace App\Filament\Resources\FreelancerTaxPages\Pages;

use App\Filament\Resources\FreelancerTaxPages\FreelancerTaxPageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFreelancerTaxPages extends ListRecords
{
    protected static string $resource = FreelancerTaxPageResource::class;

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
