<?php

namespace App\Models;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
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
                ->label('Valid from (Date)')
                ->required(),
            DatePicker::make('date_until')
                ->label('Valid until (Date)')
                ->required(),
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
                ->required(),
            TimePicker::make('time_from')
                ->label('Valid from (Time)')
                ->required(),
            TimePicker::make('time_until')
                ->label('Valid until (Time)')
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
        return $this->belongsTo(Staff::class);
    }

    public function workScheduleConsultationCategories(): HasMany
    {
        return $this->hasMany(WorkScheduleConsultationCategory::class);
    }
}
