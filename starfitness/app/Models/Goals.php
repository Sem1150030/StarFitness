<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goals extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kcal_goal',
        'protein_goal',
        'carbs_goal',
        'fat_goal',
        'is_kcal_max',
        'is_carbs_max',
        'is_fat_max',
        'is_active',
    ];

    protected $casts = [
        'protein_goal' => 'integer',
        'carbs_goal' => 'integer',
        'fat_goal' => 'integer',
        'is_kcal_max' => 'boolean',
        'is_carbs_max' => 'boolean',
        'is_fat_max' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dailyLogs()
    {
        return $this->hasMany(dailyLog::class, 'goal_id');
    }
}
