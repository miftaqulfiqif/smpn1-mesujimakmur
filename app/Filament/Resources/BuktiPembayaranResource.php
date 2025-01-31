<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BuktiPembayaranResource\Pages;
use App\Filament\Resources\BuktiPembayaranResource\RelationManagers;
use App\Models\BuktiPembayaran;
use App\Models\DataCalonSiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BuktiPembayaranResources extends Resource
{
    protected static ?string $model = BuktiPembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Bukti Pembayaran';
    protected static ?string $navigationGroup = 'PPDB';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('id_data_calon_siswa')
                //     ->label('Nama Siswa')
                //     ->disabled(),
                Forms\Components\FileUpload::make('bukti_bayar')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_urut')
                    ->label('No')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    }),
                Tables\Columns\TextColumn::make('dataCalonSiswa.user.name')
                    ->label('Nama Siswa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bukti_bayar')
                    ->searchable(),
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
            'index' => Pages\ListBuktiPembayarans::route('/'),
            'create' => Pages\CreateBuktiPembayaran::route('/create'),
            'view' => Pages\ViewBuktiPembayaran::route('/{record}'),
            'edit' => Pages\EditBuktiPembayaran::route('/{record}/edit'),
        ];
    }
}
