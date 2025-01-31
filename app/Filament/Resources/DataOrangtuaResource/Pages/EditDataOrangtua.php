<?php

namespace App\Filament\Resources\DataOrangtuaResource\Pages;

use App\Filament\Resources\DataOrangtuaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataOrangtua extends EditRecord
{
    protected static string $resource = DataOrangtuaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
