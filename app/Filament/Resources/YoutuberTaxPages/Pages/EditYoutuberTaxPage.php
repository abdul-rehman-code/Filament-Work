<?php

namespace App\Filament\Resources\YoutuberTaxPages\Pages;

use App\Filament\Resources\YoutuberTaxPages\YoutuberTaxPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditYoutuberTaxPage extends EditRecord
{
    protected static string $resource = YoutuberTaxPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
