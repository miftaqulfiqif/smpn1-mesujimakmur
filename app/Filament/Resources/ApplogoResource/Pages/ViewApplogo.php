<?php

namespace App\Filament\Resources\ApplogoResource\Pages;

use App\Filament\Resources\ApplogoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewApplogo extends ViewRecord
{
    protected static string $resource = ApplogoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
