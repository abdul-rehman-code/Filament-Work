<?php

namespace App\Filament\Resources\FreelancerTaxPages\Pages;

use App\Filament\Resources\FreelancerTaxPages\FreelancerTaxPageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFreelancerTaxPage extends ViewRecord
{
    protected static string $resource = FreelancerTaxPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
