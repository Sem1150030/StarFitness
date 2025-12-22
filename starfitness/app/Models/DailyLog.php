<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'goal_id',
        'date',
        'kcal_total',
        'protein_total',
        'carbs_total',
        'fat_total',
        'name',
    ];

    protected $casts = [
        'date' => 'date',
        'kcal_total' => 'decimal:2',
        'protein_total' => 'decimal:2',
        'carbs_total' => 'decimal:2',
        'fat_total' => 'decimal:2',
    ];

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function goal()
    {
        return $this->belongsTo(Goals::class, 'goal_id');
    }

    public function getTotalKcalAttribute()
    {
        return $this->meals->sum('kcal_total') ?? 0;
    }

    public function getTotalCarbAttribute()
    {
        return $this->meals->sum('carb_total') ?? 0;
}

    public function getTotalProteinAttribute()
    {
        return $this->meals->sum('protein_total') ?? 0;
    }

    public function getTotalFatAttribute()
    {
        return $this->meals->sum('fat_total') ?? 0;
    }

    public function scopeToday(Builder $query, User $user){
        return $query->where('user_id', $user->id)
                     ->where('date', now()->toDateString());
    }
}
