<?php

namespace App\Filament\Resources\PeriodeDaftarResource\Pages;

use App\Filament\Resources\PeriodeDaftarResource;
use App\Models\PeriodeDaftar;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ListPeriodeDaftars extends ListRecords
{
    protected static string $resource = PeriodeDaftarResource::class;

    protected static ?string $title = 'Tahun Ajaran';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->color('info')->icon('heroicon-o-plus')->label('Tambah Tahun Ajaran Baru'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Semua' => Tab::make('Semua')
                ->badge(PeriodeDaftar::count()),
            'Aktif' => Tab::make('Aktif')
                ->badge(PeriodeDaftar::where('status', 1)->count())
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 1)),
            'Tidak Aktif' => Tab::make('Tidak Aktif')
                ->badge(PeriodeDaftar::where('status', 0)->count())
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 0)),
        ];
    }
}
