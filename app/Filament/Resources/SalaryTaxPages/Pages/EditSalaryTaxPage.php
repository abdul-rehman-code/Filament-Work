<?php

namespace App\Filament\Resources\SalaryTaxPages\Pages;

use App\Filament\Resources\SalaryTaxPages\SalaryTaxPageResource;
use Filament\Resources\Pages\EditRecord;

class EditSalaryTaxPage extends EditRecord
{
    protected static string $resource = SalaryTaxPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
