<?php

namespace App\Models;

use App\Service\Car\Enums\Color;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'mileage',
        'year',
        'color',
        'c_model_id',
    ];

    protected $casts = [
        'color' => Color::class,
    ];

    public function cModel(): BelongsTo
    {
        return $this->belongsTo(CModel::class);
    }

    public function brand(): HasOneThrough
    {
        return $this->hasOneThrough(Brand::class, CModel::class, 'id', 'id', 'c_model_id', 'brand_id');
    }
}
