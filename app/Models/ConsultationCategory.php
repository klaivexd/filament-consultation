<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ConsultationCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'number_of_slots',
        'consultation_type_id',
        'parent_consultation_category',
        'work_schedule_id',
    ];


    protected $casts = [
        'number_of_slots' => 'integer',
        'consultation_type_id' => 'integer',
        'work_schedule_id' => 'integer',
    ];

    public function consultationType(): BelongsTo
    {
        return $this->belongsTo(ConsultationType::class);
    }

    public function workScheduleConsultationCategories(): BelongsToMany
    {
        return $this->belongsToMany(WorkScheduleConsultationCategory::class);
    }
}
