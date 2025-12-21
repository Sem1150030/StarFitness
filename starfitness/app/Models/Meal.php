<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'daily_log_id',
        'name',
        'kcal_total',
        'carb_total',
        'fat_total',
        'protein_total',
    ];

    protected $casts = [
        'kcal_total' => 'integer',
        'carb_total' => 'integer',
        'fat_total' => 'integer',
        'protein_total' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dailyLog()
    {
        return $this->belongsTo(DailyLog::class);
    }

    public function mealItems()
    {
        return $this->belongsToMany(MealItem::class, 'meal_meal_item')
            ->withPivot('portions')
            ->withTimestamps();
    }
}
