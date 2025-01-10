<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsultationCategoryResource\Pages;
use App\Models\ConsultationCategory;
use App\Models\ConsultationType;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
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
                Select::make('consultation_type_id')
                    ->label('Consultation Type')
                    ->options(ConsultationType::all()->pluck('title', 'id'))
                    ->required()
                    ->reactive()
                    ->live(),

                Select::make('parent_consultation_category')
                    ->label('Parent Consultation Category')
                    ->options(
                        fn(Get $get): array =>
                        $get('consultation_type_id')
                            ? ConsultationCategory::where('consultation_type_id', $get('consultation_type_id'))
                            ->whereNull('parent_consultation_category')
                            ->pluck('title', 'id')
                            ->toArray()
                            : []
                    )
                    ->required()
                    ->hidden(fn(Get $get) => !$get('consultation_type_id'))
                    ->reactive(),

                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\TextArea::make('description')
                    ->required(),
                Forms\Components\TextInput::make('number_of_slots')
                    ->label('Number of Slots')
                    ->numeric()
                    ->integer()
                    ->minValue(0)
                    ->required(),
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
