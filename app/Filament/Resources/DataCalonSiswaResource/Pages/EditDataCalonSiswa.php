<?php

namespace App\Filament\Resources\DataCalonSiswaResource\Pages;

use App\Filament\Resources\DataCalonSiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataCalonSiswa extends EditRecord
{
    protected static string $resource = DataCalonSiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
        ];
    }
}
