<?php

namespace App\Filament\Resources\FotoSekolahResource\Pages;

use App\Filament\Resources\FotoSekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFotoSekolahs extends ListRecords
{
    protected static string $resource = FotoSekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
