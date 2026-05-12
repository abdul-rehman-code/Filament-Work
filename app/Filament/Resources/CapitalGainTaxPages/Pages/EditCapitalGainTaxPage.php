<?php

namespace App\Filament\Resources\CapitalGainTaxPages\Pages;

use App\Filament\Resources\CapitalGainTaxPages\CapitalGainTaxPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCapitalGainTaxPage extends EditRecord
{
    protected static string $resource = CapitalGainTaxPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
