<?php

namespace App\Filament\Resources\SlabPages\Pages;

use App\Filament\Resources\SlabPages\SlabPageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSlabPage extends EditRecord
{
    protected static string $resource = SlabPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
