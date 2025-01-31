<?php

namespace App\Filament\Resources\DataCalonSiswaResource\Pages;

use App\Filament\Resources\DataCalonSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDataCalonSiswa extends ViewRecord
{
    protected static string $resource = DataCalonSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}