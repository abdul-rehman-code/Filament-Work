<?php

namespace App\Filament\Resources\FreelancerTaxPages\Pages;

use App\Filament\Resources\FreelancerTaxPages\FreelancerTaxPageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFreelancerTaxPage extends EditRecord
{
    protected static string $resource = FreelancerTaxPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
