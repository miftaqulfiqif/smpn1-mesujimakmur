<?php

namespace App\Filament\Resources\PesanKesalahanResource\Pages;

use App\Filament\Resources\PesanKesalahanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPesanKesalahan extends EditRecord
{
    protected static string $resource = PesanKesalahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
