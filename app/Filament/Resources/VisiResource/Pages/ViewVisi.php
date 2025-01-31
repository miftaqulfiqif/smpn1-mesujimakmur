<?php

namespace App\Filament\Resources\VisiResource\Pages;

use App\Filament\Resources\VisiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVisi extends ViewRecord
{
    protected static string $resource = VisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
