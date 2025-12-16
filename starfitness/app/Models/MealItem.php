<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url',
        'description',
        'kcal_per_portion',
        'carb_per_portion',
        'fat_per_portion',
        'protein_per_portion',
    ];

    protected $casts = [
        'kcal_per_portion' => 'decimal:2',
        'carb_per_portion' => 'decimal:2',
        'fat_per_portion' => 'decimal:2',
        'protein_per_portion' => 'decimal:2',
    ];

    public function meals()
    {
        return $this->belongsToMany(meal::class, 'meal_meal_item')
            ->withPivot('portions')
            ->withTimestamps();
    }
}
