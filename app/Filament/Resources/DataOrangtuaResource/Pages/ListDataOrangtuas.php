<?php

namespace App\Filament\Resources\DataOrangtuaResource\Pages;

use App\Filament\Resources\DataOrangtuaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataOrangtuas extends ListRecords
{
    protected static string $resource = DataOrangtuaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
