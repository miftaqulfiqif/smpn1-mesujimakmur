<?php

namespace App\Filament\Resources\PesanKesalahanResource\Pages;

use App\Filament\Resources\PesanKesalahanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPesanKesalahan extends ViewRecord
{
    protected static string $resource = PesanKesalahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
