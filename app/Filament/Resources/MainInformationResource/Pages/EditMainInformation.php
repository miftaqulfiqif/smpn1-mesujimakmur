<?php

namespace App\Filament\Resources\MainInformationResource\Pages;

use App\Filament\Resources\MainInformationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMainInformation extends EditRecord
{
    protected static string $resource = MainInformationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
