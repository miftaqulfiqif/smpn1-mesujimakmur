<?php

namespace App\Filament\Resources\DataCalonSiswaResource\Pages;

use App\Filament\Resources\DataCalonSiswaResource;
use App\Models\DataCalonSiswa;
use Filament\Actions;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListDataCalonSiswas extends ListRecords
{
    protected static string $resource = DataCalonSiswaResource::class;
    protected static ?string $title = 'Daftar calon siswa';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Buat Data Calon Siswa')
                ->icon('heroicon-o-plus')
                ->color('info'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Semua' => Tab::make('Semua')
                ->badge(DataCalonSiswa::count()),
            'Zonasi' => Tab::make('Zonasi')
                ->badge(DataCalonSiswa::whereHas('user', fn($query) => $query->where('jalur', 'zonasi'))->count())
                ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('user', fn($query) => $query->where('jalur', 'zonasi'))),
            'Prestasi' => Tab::make('Prestasi')
                ->badge(DataCalonSiswa::whereHas('user', fn($query) => $query->where('jalur', 'prestasi'))->count())
                ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('user', fn($query) => $query->where('jalur', 'prestasi'))),
            'Afirmasi' => Tab::make('Afirmasi')
                ->badge(DataCalonSiswa::whereHas('user', fn($query) => $query->where('jalur', 'afirmasi'))->count())
                ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('user', fn($query) => $query->where('jalur', 'afirmasi'))),
        ];
    }
}
