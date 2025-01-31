<?php

namespace App\Filament\Resources\MisiResource\Pages;

use App\Filament\Resources\MisiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMisi extends ViewRecord
{
    protected static string $resource = MisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
