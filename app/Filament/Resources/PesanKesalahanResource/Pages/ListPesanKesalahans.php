<?php

namespace App\Filament\Resources\PesanKesalahanResource\Pages;

use App\Filament\Resources\PesanKesalahanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesanKesalahans extends ListRecords
{
    protected static string $resource = PesanKesalahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
