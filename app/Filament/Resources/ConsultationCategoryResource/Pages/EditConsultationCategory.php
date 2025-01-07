<?php

namespace App\Filament\Resources\ConsultationCategoryResource\Pages;

use App\Filament\Resources\ConsultationCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConsultationCategory extends EditRecord
{
    protected static string $resource = ConsultationCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
