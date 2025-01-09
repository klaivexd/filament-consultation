<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkScheduleConsultationCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_schedule_id',
        'consultation_category_id',
    ];


    protected $casts = [
        'work_schedule_id' => 'integer',
        'consultation_category_id' => 'integer',
    ];

    public function workSchedule(): BelongsTo
    {
        return $this->belongsTo(WorkSchedule::class);
    }

    public function consultationCategory(): BelongsTo
    {
        return $this->belongsTo(ConsultationCategory::class);
    }
}
