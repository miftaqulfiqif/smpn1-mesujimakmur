<?php

namespace App\Filament\Resources\FotoSekolahResource\Pages;

use App\Filament\Resources\FotoSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFotoSekolah extends ViewRecord
{
    protected static string $resource = FotoSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
