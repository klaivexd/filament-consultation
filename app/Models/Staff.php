<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'email',
        'mobile_phone',
        'phone',
        'work_schedule_id',
    ];


    protected $casts = [
        'work_schedule_id' => 'integer',
    ];

    public function workSchedule(): HasMany
    {
        return $this->hasMany(WorkSchedule::class);
    }
}
