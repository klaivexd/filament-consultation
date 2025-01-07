<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsultationCategoryResource\Pages;
use App\Models\ConsultationCategory;
use App\Models\ConsultationType;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class ConsultationCategoryResource extends Resource
{
    protected static ?string $navigationGroup = 'Configuration';

    protected static ?string $model = ConsultationCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\TextInput::make('number_of_slots')
                    ->label('Number of Slots')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('consultation_type_id')
                    ->label('Consultation Type')
                    ->options(ConsultationType::all()->pluck('title', 'id'))
                    ->nullable(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->sortable(),
                TextColumn::make('number_of_slots')
                    ->label('Number of Slots')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    // public static function infolist(Infolist $infolist): Infolist
    // {
    //     return $infolist
    //         ->schema([
                
    //         ])
    // }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConsultationCategories::route('/'),
            'create' => Pages\CreateConsultationCategory::route('/create'),
            'edit' => Pages\EditConsultationCategory::route('/{record}/edit'),
        ];
    }
}
