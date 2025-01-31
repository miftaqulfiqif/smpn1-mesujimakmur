<?php

namespace App\Filament\Resources\ApplogoResource\Pages;

use App\Filament\Resources\ApplogoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApplogo extends EditRecord
{
    protected static string $resource = ApplogoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
