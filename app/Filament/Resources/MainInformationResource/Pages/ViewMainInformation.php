<?php

namespace App\Filament\Resources\MainInformationResource\Pages;

use App\Filament\Resources\MainInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMainInformation extends ViewRecord
{
    protected static string $resource = MainInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
