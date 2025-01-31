<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeriodeDaftarResource\Pages;
use App\Filament\Resources\PeriodeDaftarResource\RelationManagers;
use App\Models\PeriodeDaftar;
use Filament\Forms;
use Filament\Forms\Form;
use Closure;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeriodeDaftarResource extends Resource
{
    protected static ?string $model = PeriodeDaftar::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'PPDB';
    protected static ?string $navigationLabel = 'Tahun Ajaran';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->columns(2)->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Tahun Ajaran')
                        ->placeholder('Contoh: PPDB Gelombang II Periode 2024/2025')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('start_date')
                        ->label('Tanggal Mulai')
                        ->reactive()
                        ->placeholder('Pilih tanggal')
                        ->displayFormat('d F Y')
                        ->locale('id')
                        ->timezone('Asia/Jakarta')
                        ->native(false)
                        ->required(),
                    Forms\Components\DatePicker::make('end_date')
                        ->placeholder('Pilih tanggal')
                        ->displayFormat('d F Y')
                        ->locale('id')
                        ->label('Tanggal Selesai')
                        ->timezone('Asia/Jakarta')
                        ->native(false)
                        ->required(),
                    Forms\Components\TextInput::make('kuota')
                        ->placeholder(placeholder: 'Masukkan kuota pendaftaran')
                        ->label('Kuota Zonasi')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('kuota_prestasi')
                        ->placeholder(placeholder: 'Masukkan kuota pendaftaran')
                        ->label('Kuota Prestasi')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('kuota_afirmasi')
                        ->placeholder(placeholder: 'Masukkan kuota pendaftaran')
                        ->label('Kuota Afirmasi')
                        ->required()
                        ->numeric(),
                    Forms\Components\ToggleButtons::make('status')
                        ->options([
                            1 => 'Aktif',
                            0 => 'Tidak Aktif',
                        ])
                        ->default(1)
                        ->colors([
                            1 => 'success',
                            0 => 'danger',
                        ])
                        ->inline()
                        ->icons([
                            1 => 'heroicon-o-check-circle',
                            0 => 'heroicon-o-x-circle',
                        ])
                        ->required(),
                ]),
                Forms\Components\Section::make()->schema([
                    Forms\Components\Repeater::make('Dokumen zonasi')->relationship('dokumens')->addActionLabel('Tambah dokumen')->columns(2)->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->placeholder('Contoh: SCAN PDF Ijazah Asli')
                            ->label('Nama dokumen'),
                        Forms\Components\ToggleButtons::make('isRequired')
                            ->required()
                            ->label('Wajib diisi?')
                            ->inline()
                            ->default(1)
                            ->options([
                                1 => 'Ya',
                                0 => 'Tidak',
                            ])
                            ->colors([
                                1 => 'success',
                                0 => 'danger',
                            ])
                            ->icons([
                                1 => 'heroicon-o-check-circle',
                                0 => 'heroicon-o-x-circle',
                            ])
                    ])
                ]),
                Forms\Components\Section::make()->schema([
                    Forms\Components\Repeater::make('Dokumen prestasi')->relationship('dokumensPrestasi')->addActionLabel('Tambah dokumen')->columns(2)->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->placeholder('Contoh: SCAN PDF Ijazah Asli')
                            ->label('Nama dokumen'),
                        Forms\Components\ToggleButtons::make('isRequired')
                            ->required()
                            ->label('Wajib diisi?')
                            ->inline()
                            ->default(1)
                            ->options([
                                1 => 'Ya',
                                0 => 'Tidak',
                            ])
                            ->colors([
                                1 => 'success',
                                0 => 'danger',
                            ])
                            ->icons([
                                1 => 'heroicon-o-check-circle',
                                0 => 'heroicon-o-x-circle',
                            ])
                    ])
                ]),
                Forms\Components\Section::make()->schema([
                    Forms\Components\Repeater::make('Dokumen afirmasi')->relationship('dokumensAfirmasi')->addActionLabel('Tambah dokumen')->columns(2)->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->placeholder('Contoh: SCAN PDF Ijazah Asli')
                            ->label('Nama dokumen'),
                        Forms\Components\ToggleButtons::make('isRequired')
                            ->required()
                            ->label('Wajib diisi?')
                            ->inline()
                            ->default(1)
                            ->options([
                                1 => 'Ya',
                                0 => 'Tidak',
                            ])
                            ->colors([
                                1 => 'success',
                                0 => 'danger',
                            ])
                            ->icons([
                                1 => 'heroicon-o-check-circle',
                                0 => 'heroicon-o-x-circle',
                            ])
                    ])
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading(heading: 'Belum ada periode pendaftaran')
            ->columns([
                Tables\Columns\TextColumn::make('nomor_urut')
                    ->label('No')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    }),
                Tables\Columns\TextColumn::make('editor.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date('d F Y', 'Asia/Jakarta')
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date('d F Y', 'Asia/Jakarta')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('kuota')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kuota_prestasi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kuota_afirmasi')
                    ->numeric()
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
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeriodeDaftars::route('/'),
            'create' => Pages\CreatePeriodeDaftar::route('/create'),
            'view' => Pages\ViewPeriodeDaftar::route('/{record}'),
            'edit' => Pages\EditPeriodeDaftar::route('/{record}/edit'),
        ];
    }
}
