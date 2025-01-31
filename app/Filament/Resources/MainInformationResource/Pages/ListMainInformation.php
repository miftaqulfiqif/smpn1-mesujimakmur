<?php

namespace App\Filament\Resources\MainInformationResource\Pages;

use App\Filament\Resources\MainInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMainInformation extends ListRecords
{
    protected static string $resource = MainInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
