<?php

namespace App\Filament\Resources\FotoSekolahResource\Pages;

use App\Filament\Resources\FotoSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFotoSekolah extends EditRecord
{
    protected static string $resource = FotoSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
