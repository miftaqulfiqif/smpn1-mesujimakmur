<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PesanKesalahanResource\Pages;
use App\Filament\Resources\PesanKesalahanResource\RelationManagers;
use App\Models\PeriodeDaftar;
use App\Models\PesanKesalahan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PesanKesalahanResource extends Resource
{
    protected static ?string $model = PesanKesalahan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pesan Kesalahan';
    protected static ?string $navigationGroup = 'PPDB';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_data_calon_siswa')
                    ->relationship('dataCalonSiswa', 'id', function ($query) {
                        $query->with('user');
                    })
                    ->options(function () {
                        return \App\Models\DataCalonSiswa::with('user')
                            ->get()
                            ->where('id_periode', '==', PeriodeDaftar::where('status', true)->first()->id)
                            ->pluck('user.name', 'id');
                    })
                    ->label('Nama Siswa')
                    ->required(),
                Forms\Components\Textarea::make('pesan')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    // ->relationship('dataCalonSiswa', 'id', fn ($query) => $query->where('name', '!=', 'Admin'))

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
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pesan')
                    ->label('Pesan')
                    ->wrap()
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
            'index' => Pages\ListPesanKesalahans::route('/'),
            'create' => Pages\CreatePesanKesalahan::route('/create'),
            'view' => Pages\ViewPesanKesalahan::route('/{record}'),
            'edit' => Pages\EditPesanKesalahan::route('/{record}/edit'),
        ];
    }
}
