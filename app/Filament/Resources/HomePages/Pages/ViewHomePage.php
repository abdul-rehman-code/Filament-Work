<?php

namespace App\Filament\Resources\HomePages\Pages;

use App\Filament\Resources\HomePages\HomePageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHomePage extends ViewRecord
{
    protected static string $resource = HomePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
