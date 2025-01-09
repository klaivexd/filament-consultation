<?php

namespace App\Models;

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

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function workScheduleConsultationCategories(): HasMany
    {
        return $this->hasMany(WorkScheduleConsultationCategory::class);
    }
}
