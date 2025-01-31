<?php

namespace App\Filament\Resources\BuktiPembayaranResource\Pages;

use App\Filament\Resources\BuktiPembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBuktiPembayaran extends EditRecord
{
    protected static string $resource = BuktiPembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
