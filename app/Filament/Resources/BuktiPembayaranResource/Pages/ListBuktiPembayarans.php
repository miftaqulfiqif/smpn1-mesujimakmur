<?php

namespace App\Filament\Resources\BuktiPembayaranResource\Pages;

use App\Filament\Resources\BuktiPembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBuktiPembayarans extends ListRecords
{
    protected static string $resource = BuktiPembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
