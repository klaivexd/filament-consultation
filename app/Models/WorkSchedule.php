<?php

namespace App\Models;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_from',
        'date_until',
        'day_of_week',
        'time_from',
        'time_until',
        'staff_id',
        'work_schedule_consultation_category_id',
    ];

    protected $casts = [
        'date_from' => 'date',
        'date_until' => 'date',
        'day_of_week' => 'integer',
        'staff_id' => 'integer',
        'work_schedule_consultation_category_id' => 'integer',
    ];

    public function getDayOfWeekNameAttribute(): string
    {
        $days = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        ];

        return $days[$this->day_of_week] ?? 'Unknown';
    }


    public static function getForm($staffId = null): array
    {
        return [
            DatePicker::make('date_from')
                ->label('Date from')
                ->required(),
            DatePicker::make('date_until')
                ->label('Date until')
                ->nullable(),
            Select::make('day_of_week')
                ->label('Day of Week')
                ->options([
                    0 => 'Sunday',
                    1 => 'Monday',
                    2 => 'Tuesday',
                    3 => 'Wednesday',
                    4 => 'Thursday',
                    5 => 'Friday',
                    6 => 'Saturday',
                ])
                ->default(1)
                ->disablePlaceholderSelection()
                ->required(),
            TimePicker::make('time_from')
                ->label('Time from')
                ->required(),
            TimePicker::make('time_until')
                ->label('Time until')
                ->required(),
            Select::make('staff_id')
                ->hidden(function () use ($staffId) {
                    return $staffId !== null;
                })
                ->relationship('staff', 'first_name')
                ->required(),
            Select::make('work_schedule_consultation_category_id')
                ->label('Consultation Category')
                ->relationship('workScheduleConsultationCategories.consultationCategory', 'title')
                ->required(),
        ];
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(related: Staff::class);
    }

    public function consultationCategory()
    {
        return $this->hasOneThrough(
            ConsultationCategory::class,
            WorkScheduleConsultationCategory::class,
            'work_schedule_id',
            'id',
            'id',
            'consultation_category_id'
        );
    }

    public function workScheduleConsultationCategories(): BelongsTo
    {
        return $this->belongsTo(WorkScheduleConsultationCategory::class, 'work_schedule_consultation_category_id');
    }
}