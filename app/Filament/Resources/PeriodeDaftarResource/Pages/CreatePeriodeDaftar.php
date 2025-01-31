<?php

namespace App\Filament\Resources\PeriodeDaftarResource\Pages;

use App\Filament\Resources\PeriodeDaftarResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePeriodeDaftar extends CreateRecord
{
    protected static string $resource = PeriodeDaftarResource::class;
    protected static string $createAnother = PeriodeDaftarResource::class;
    protected static ?string $title = 'Tambah Tahun Ajaran Baru';

    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('Buat')
            ->icon('heroicon-s-plus');
    }

    protected function getCancelFormAction(): \Filament\Actions\Action
    {
        return parent::getCancelFormAction()
            ->label('Batal');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['editor'] = Auth::id();
        $data['jml_pendaftar'] = 0;
        return $data;
    }
}
