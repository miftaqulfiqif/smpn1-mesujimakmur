<?php

namespace App\Filament\Resources\DataCalonSiswaResource\Pages;

use Filament\Actions;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\DataCalonSiswa;
use Illuminate\Support\Facades\Blade;
use Filament\Resources\Components\Tab;
use App\Http\Controllers\PpdbController;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Modal\Actions\Action;
use App\Filament\Resources\DataCalonSiswaResource;
use App\Models\PeriodeDaftar;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ListDataCalonSiswas extends ListRecords
{
    protected static string $resource = DataCalonSiswaResource::class;
    protected static ?string $title = 'Daftar calon siswa';


    protected function getHeaderActions(): array
    {
        return [
            // Actions\SelectAction::make('periode')
            //     ->label('Pilih Periode')
            //     ->options(
            //         PeriodeDaftar::orderBy('name', 'desc')->pluck('name', 'id')->toArray()
            //     )
            //     ->action(function ($data) {
            //         session(['selected_periode' => $data['periode']]);
            //         \Livewire\Livewire::refresh(); // Paksa Livewire untuk refresh UI

            //     }),
            Actions\Action::make('download-pdf')
                ->label('Download PDF')
                ->color('success')
                ->icon('heroicon-o-printer')
                ->action('downloadPDF')
                // ->url(route('data-calon-siswa.pdf'))
                ->openUrlInNewTab(),
            Actions\CreateAction::make()
                ->label('Buat Data Calon Siswa')
                ->icon('heroicon-o-plus')
                ->color('info'),
        ];
    }

    public function downloadPDF()
    {
        // Ambil data berdasarkan filter yang diterapkan di tabel
        $dataCalonSiswa = $this->getFilteredTableQuery()->get();
        $periode = $dataCalonSiswa->first()?->periode?->name ?? '';

        // Buat PDF dengan data dalam bentuk Collection
        // $pdf = PDF::loadView('data-calon-siswa-pdf', [
        //     'data' => $dataCalonSiswa,
        // ]);

        session(['data_calon_siswa' => $dataCalonSiswa, 'periode' => $periode]);

        // return $pdf->download('data_calon_siswa.pdf');
        return redirect()->route('data-calon-siswa.pdf');
    }

    public function getTabs(): array
    {
        // $selectedPeriode = session()->has('selected_periode')
        //     ? session('selected_periode')
        //     : PeriodeDaftar::orderBy('name', 'desc')->first()?->id;

        // return [
        //     'Semua' => Tab::make('Semua')
        //         ->badge(DataCalonSiswa::where('id_periode', $selectedPeriode)->count())
        //         ->modifyQueryUsing(fn(Builder $query) => $query->where('id_periode', $selectedPeriode)),
        //     'Zonasi' => Tab::make('Zonasi')
        //         ->badge(DataCalonSiswa::whereHas('user', fn($query) => $query->where('jalur', 'zonasi'))->where('id_periode', $selectedPeriode)->count())
        //         ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('user', fn($query) => $query->where('jalur', 'zonasi'))->where('id_periode', $selectedPeriode)),
        //     'Prestasi' => Tab::make('Prestasi')
        //         ->badge(DataCalonSiswa::whereHas('user', fn($query) => $query->where('jalur', 'prestasi'))->where('id_periode', $selectedPeriode)->count())
        //         ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('user', fn($query) => $query->where('jalur', 'prestasi'))->where('id_periode', $selectedPeriode)),
        //     'Afirmasi' => Tab::make('Afirmasi')
        //         ->badge(DataCalonSiswa::whereHas('user', fn($query) => $query->where('jalur', 'afirmasi'))->where('id_periode', $selectedPeriode)->count())
        //         ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('user', fn($query) => $query->where('jalur', 'afirmasi'))->where('id_periode', $selectedPeriode)),
        // ];

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
