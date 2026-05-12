<?php

namespace App\Filament\Resources\SlabPages\Pages;

use App\Filament\Resources\SlabPages\SlabPageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSlabPage extends ViewRecord
{
    protected static string $resource = SlabPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
