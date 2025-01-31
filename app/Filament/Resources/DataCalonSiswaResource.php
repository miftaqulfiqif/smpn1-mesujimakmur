<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataCalonSiswaResource\Pages;
use App\Filament\Resources\DataCalonSiswaResource\RelationManagers;
use App\Models\DataCalonSiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DataCalonSiswaResource\RelationManagers\DataOrangtuaRelationManager;
use App\Filament\Resources\DataOrangtuaResource\RelationManagers\DataOrangtuaRelationManager as RelationManagersDataOrangtuaRelationManager;
use App\Models\DokumenCalonSiswa;
use App\Models\DokumenPrestasi;
use Filament\Forms\Components\Repeater;
use Filament\Tables\View\TablesRenderHook;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Validation\ConditionalRules;

class DataCalonSiswaResource extends Resource
{
    protected static ?string $model = DataCalonSiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Data Calon Siswa';
    protected static ?string $navigationGroup = 'PPDB';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->columns(2)->schema([
                    Forms\Components\Section::make()
                        ->relationship('user')
                        ->schema([
                            Forms\Components\TextInput::make('jalur')
                                ->disabled()
                                ->reactive()
                        ]),
                    Forms\Components\Fieldset::make('Data Calon Siswa')
                        ->extraAttributes([
                            'class' => 'bg-white shadow overflow-hidden sm:rounded-lg',
                        ])
                        ->schema([
                            Forms\Components\Select::make('id_periode')
                                ->label('Tahun Ajaran')
                                ->relationship('periode', 'name')
                                ->required()
                                ->disabled(),
                            Forms\Components\Select::make('id_user')
                                ->relationship('user', 'name')
                                ->label('Nama')
                                ->required()
                                ->disabled(),
                            Forms\Components\Select::make('jenis_kelamin')
                                ->label('Jenis Kelamin')
                                ->options([
                                    'Laki-laki' => 'Laki-laki',
                                    'Perempuan' => 'Perempuan',
                                ])
                                ->required()
                                ->disabled(),
                            Forms\Components\DatePicker::make('tgl_lahir')
                                ->native(false)
                                ->label('Tanggal lahir')
                                ->placeholder('Pilih tanggal lahir')
                                ->required()
                                ->disabled(),
                            Forms\Components\TextInput::make('tempat_lahir')
                                ->placeholder('Masukkan tempat lahir')
                                ->required()
                                ->maxLength(255)
                                ->disabled(),
                            Forms\Components\TextInput::make('nik')
                                ->label('NIK')
                                ->placeholder('Masukkan NIK')
                                ->required()
                                ->maxLength(255)
                                ->disabled(),
                            Forms\Components\TextInput::make('asal_sekolah')
                                ->placeholder('Masukkan asal sekolah')
                                ->required()
                                ->maxLength(255)
                                ->disabled(),
                            Forms\Components\Toggle::make('zonasi')
                                ->required()
                                ->disabled(),
                            Forms\Components\TextInput::make('tinggi_badan')
                                ->placeholder('Masukkan tinggi badan')
                                ->required()
                                ->numeric()
                                ->disabled(),
                            Forms\Components\TextInput::make('berat_badan')
                                ->placeholder('Masukkan berat badan')
                                ->required()
                                ->numeric()
                                ->disabled(),
                            Forms\Components\Select::make('kegemaran')
                                ->options([
                                    'Technology' => 'Technology',
                                    'Health' => 'Health',
                                    'Education' => 'Education',
                                ])
                                ->createOptionUsing(function ($input) {
                                    return $input;
                                })
                                ->searchable()
                                ->required()
                                ->disabled(),
                            Forms\Components\Toggle::make('penerima_kip')
                                ->required()
                                ->disabled(),
                            Forms\Components\TextInput::make('no_kip')
                                ->label('Nomor KIP')
                                ->maxLength(255)
                                ->default(null)
                                ->disabled(),
                            Forms\Components\FileUpload::make('foto')
                                ->required()
                                ->disabled(),
                            Forms\Components\TextInput::make('notelp')
                                ->required()
                                ->maxLength(255)
                                ->disabled(),
                            Forms\Components\Textarea::make('alamat')
                                ->required()
                                ->columnSpanFull()
                                ->disabled(),
                        ]),
                ]),
                Forms\Components\Section::make()->relationship('dataOrangtua')->columns(2)->schema([
                    Forms\Components\TextInput::make('nama_ayah')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\TextInput::make('nik_ayah')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\DatePicker::make('tgl_lahir_ayah')
                        ->required()
                        ->disabled(),
                    Forms\Components\TextInput::make('pendidikan_ayah')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\TextInput::make('pekerjaan_ayah')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\TextInput::make('penghasilan_ayah')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\TextInput::make('nama_ibu')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\TextInput::make('nik_ibu')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\DatePicker::make('tgl_lahir_ibu')
                        ->required()
                        ->disabled(),
                    Forms\Components\TextInput::make('pendidikan_ibu')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\TextInput::make('pekerjaan_ibu')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\TextInput::make('penghasilan_ibu')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                ]),
                Forms\Components\Section::make()->relationship('nilaiRapot')->columns(2)->schema([
                    Forms\Components\TextInput::make('semester_ganjil_kelas_4')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\TextInput::make('semester_genap_kelas_4')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\TextInput::make('semester_ganjil_kelas_5')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\TextInput::make('semester_genap_kelas_5')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\TextInput::make('semester_ganjil_kelas_6')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                    Forms\Components\TextInput::make('average')
                        ->required()
                        ->maxLength(255)
                        ->disabled(),
                ]),
                Forms\Components\Section::make()->schema([
                    Forms\Components\Repeater::make('Dokumen Persyaratan')
                        ->relationship('dokumenCalonSiswa')
                        ->columns(2)
                        ->schema([
                            Forms\Components\TextInput::make('nama_dokumen')
                                ->label('Nama Dokumen')
                                ->disabled(),
                            Forms\Components\FileUpload::make('path_url')
                                ->required()
                                ->downloadable()
                                ->disabled(),
                        ])
                        ->disableItemCreation()
                        ->disableItemDeletion(),
                ]),
                Forms\Components\Section::make()->relationship('statusPendaftaran')->schema([
                    Forms\Components\TextInput::make('status')
                        ->label('Status Sekarang')
                        ->disabled(),
                    Forms\Components\Select::make('status')
                        ->label('Status Pendaftaran')
                        ->options([
                            'pengecekan_berkas' => 'Sedang Dalam Pengecekan Berkas',
                            'proses_seleksi' => 'Proses Seleksi',
                            'ditolak' => 'Ditolak',
                            'diterima' => 'Diterima'
                        ])
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->searchPlaceholder('Cari data calon siswa...')
            ->emptyStateHeading('Tidak ada data calon siswa')
            ->columns([
                Tables\Columns\TextColumn::make('nomor_urut')
                    ->label('No')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    }),
                Tables\Columns\TextColumn::make('nomor_urut')
                    ->label('No')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    }),
                Tables\Columns\TextColumn::make('periode.name')
                    ->label('Tahun Ajaran')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.nisn')
                    ->label('NISN')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.jalur')
                    ->label('Jalur')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('asal_sekolah')
                    ->searchable(),
                // Tables\Columns\IconColumn::make('penerima_kip')
                //     ->boolean(),
                // Tables\Columns\TextColumn::make('no_kip')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('foto')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('notelp')
                    ->searchable(),
                Tables\Columns\IconColumn::make('zonasi')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('statusPendaftaran.status')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('peringkat')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Update Status')
                    ->icon('heroicon-s-pencil'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //code
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataCalonSiswas::route('/'),
            'create' => Pages\CreateDataCalonSiswa::route('/create'),
            'view' => Pages\ViewDataCalonSiswa::route('/{record}'),
            'edit' => Pages\EditDataCalonSiswa::route('/{record}/edit'),
        ];
    }

    private function getRepeaterSchema($relationshipName)
    {
        return [
            Forms\Components\Repeater::make('Dokumen Persyaratan')
                ->relationship('dokumenCalonSiswa')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('id_dokumen')
                        ->relationship($relationshipName, 'nama')
                        ->label('Nama Dokumen')
                        ->disabled(),
                    Forms\Components\FileUpload::make('path_url')
                        ->required()
                        ->downloadable()
                        ->disabled(),
                ])
                ->disableItemCreation()
                ->disableItemDeletion(),
        ];
    }
}
