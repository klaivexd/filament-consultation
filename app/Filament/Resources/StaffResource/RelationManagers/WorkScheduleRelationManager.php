<?php

namespace App\Filament\Resources\StaffResource\RelationManagers;

use App\Models\WorkSchedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkScheduleRelationManager extends RelationManager
{
    protected static string $relationship = 'WorkSchedule';

    public function form(Form $form): Form
    {
        return $form
            ->schema(WorkSchedule::getForm($this->getOwnerRecord()->id));
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('time_from')
            ->columns([
                Tables\Columns\TextColumn::make('day_of_week_name')
                    ->label('Day of week'),
                Tables\Columns\TextColumn::make('time_from')
                    ->label('Time from'),
                Tables\Columns\TextColumn::make('time_until')
                    ->label('Time until'),
                Tables\Columns\TextColumn::make('date_from')
                    ->label('Valid from')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('date_until')
                    ->label('Valid until')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('work_schedule_consultation_category_id')
                    ->label('Consultation Category')
                    ->getStateUsing(function ($record) {
                        return $record->workScheduleConsultationCategories->consultationCategory->title ?? 'N/A';
                    })
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
