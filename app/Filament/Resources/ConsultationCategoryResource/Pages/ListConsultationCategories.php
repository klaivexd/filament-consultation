<?php

namespace App\Filament\Resources\ConsultationCategoryResource\Pages;

use App\Filament\Resources\ConsultationCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConsultationCategories extends ListRecords
{
    protected static string $resource = ConsultationCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
