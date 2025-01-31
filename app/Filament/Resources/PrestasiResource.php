<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestasiResource\Pages;
use App\Filament\Resources\PrestasiResource\RelationManagers;
use App\Models\Prestasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrestasiResource extends Resource
{
    protected static ?string $model = Prestasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Prestasi';
    protected static ?string $navigationGroup = 'Sistem Informasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Fieldset::make('Prestasi')
                    ->extraAttributes([
                        'class' => 'bg-white shadow overflow-hidden sm:rounded-lg',
                    ])
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->placeholder('Masukkan judul prestasi')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('konten')
                            ->placeholder('Masukkan deskripsi')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('main_image')
                            ->required(),
                        Forms\Components\FileUpload::make('images')
                            ->label('Unggah Gambar')
                            ->multiple()
                            ->directory('uploads/prestasi/images')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Tidak ada data Prestasi')
            ->columns([
                Tables\Columns\TextColumn::make('nomor_urut')
                    ->label('No')
                    ->getStateUsing(function ($record, $rowLoop) {
                        return $rowLoop->iteration;
                    }),
                TextColumn::make('editor')->sortable(),
                TextColumn::make('nama')->searchable(),
                TextColumn::make('konten')
                    ->html()
                    ->searchable()
                    ->limit(50),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat')
                    ->icon('heroicon-s-eye'),
                Tables\Actions\EditAction::make()
                    ->label('Edit')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrestasis::route('/'),
            'create' => Pages\CreatePrestasi::route('/create'),
            'view' => Pages\ViewPrestasi::route('/{record}'),
            'edit' => Pages\EditPrestasi::route('/{record}/edit'),
        ];
    }
}
