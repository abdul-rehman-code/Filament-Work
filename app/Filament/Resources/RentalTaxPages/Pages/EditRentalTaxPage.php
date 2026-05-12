<?php

namespace App\Filament\Resources\RentalTaxPages\Pages;

use App\Filament\Resources\RentalTaxPages\RentalTaxPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRentalTaxPage extends EditRecord
{
    protected static string $resource = RentalTaxPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
