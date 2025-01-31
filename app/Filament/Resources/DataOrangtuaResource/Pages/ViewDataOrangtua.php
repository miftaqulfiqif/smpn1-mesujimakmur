<?php

namespace App\Filament\Resources\DataOrangtuaResource\Pages;

use App\Filament\Resources\DataOrangtuaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDataOrangtua extends ViewRecord
{
    protected static string $resource = DataOrangtuaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
