<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ConsultationType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'consultation_category_id',
    ];


    protected $casts = [
        'consultation_category_id' => 'integer',
    ];

    public function consultationCategories(): HasMany
    {
        return $this->hasMany(ConsultationCategory::class);
    }
}
