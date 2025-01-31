<?php

namespace App\Filament\Resources\MotoResource\Pages;

use App\Filament\Resources\MotoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMoto extends ViewRecord
{
    protected static string $resource = MotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
