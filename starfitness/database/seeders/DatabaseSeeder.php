<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\dailyLog;
use App\Models\goals;
use App\Models\meal;
use App\Models\mealItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create test user
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('123455'),
        ]);

        // Create additional users
        $users = collect([$user]);
        for ($i = 0; $i < 4; $i++) {
            $users->push(User::factory()->create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => bcrypt('password'),
            ]));
        }

        // Create meal items library (food database)
        $foodLibrary = [
            // Proteins
            ['name' => 'Grilled Chicken Breast', 'desc' => 'Lean protein source', 'kcal' => 165, 'protein' => 31, 'carb' => 0, 'fat' => 4],
            ['name' => 'Salmon Fillet', 'desc' => 'Rich in omega-3', 'kcal' => 206, 'protein' => 22, 'carb' => 0, 'fat' => 13],
            ['name' => 'Scrambled Eggs', 'desc' => 'Complete protein', 'kcal' => 70, 'protein' => 6, 'carb' => 1, 'fat' => 5],
            ['name' => 'Greek Yogurt', 'desc' => 'High protein yogurt', 'kcal' => 100, 'protein' => 17, 'carb' => 6, 'fat' => 0],
            ['name' => 'Ground Turkey', 'desc' => 'Lean ground meat', 'kcal' => 150, 'protein' => 28, 'carb' => 0, 'fat' => 3],
            ['name' => 'Tuna', 'desc' => 'Canned tuna in water', 'kcal' => 100, 'protein' => 22, 'carb' => 0, 'fat' => 1],
            ['name' => 'Tofu', 'desc' => 'Plant-based protein', 'kcal' => 80, 'protein' => 8, 'carb' => 2, 'fat' => 5],

            // Carbs
            ['name' => 'Brown Rice', 'desc' => 'Complex carbohydrate', 'kcal' => 215, 'protein' => 5, 'carb' => 45, 'fat' => 2],
            ['name' => 'Sweet Potato', 'desc' => 'Nutrient-dense carb', 'kcal' => 112, 'protein' => 2, 'carb' => 26, 'fat' => 0],
            ['name' => 'Oatmeal', 'desc' => 'Slow-digesting carbs', 'kcal' => 150, 'protein' => 5, 'carb' => 27, 'fat' => 3],
            ['name' => 'Whole Wheat Bread', 'desc' => 'Whole grain bread', 'kcal' => 80, 'protein' => 4, 'carb' => 15, 'fat' => 1],
            ['name' => 'Quinoa', 'desc' => 'Complete grain', 'kcal' => 120, 'protein' => 4, 'carb' => 21, 'fat' => 2],
            ['name' => 'Pasta', 'desc' => 'Whole wheat pasta', 'kcal' => 180, 'protein' => 7, 'carb' => 37, 'fat' => 1],

            // Vegetables
            ['name' => 'Broccoli', 'desc' => 'Green vegetable', 'kcal' => 31, 'protein' => 3, 'carb' => 6, 'fat' => 0],
            ['name' => 'Mixed Green Salad', 'desc' => 'Fresh greens', 'kcal' => 15, 'protein' => 2, 'carb' => 3, 'fat' => 0],
            ['name' => 'Spinach', 'desc' => 'Leafy green', 'kcal' => 23, 'protein' => 3, 'carb' => 4, 'fat' => 0],
            ['name' => 'Bell Peppers', 'desc' => 'Colorful veggies', 'kcal' => 25, 'protein' => 1, 'carb' => 6, 'fat' => 0],
            ['name' => 'Asparagus', 'desc' => 'Spring vegetable', 'kcal' => 20, 'protein' => 2, 'carb' => 4, 'fat' => 0],

            // Healthy Fats
            ['name' => 'Avocado', 'desc' => 'Healthy fats', 'kcal' => 160, 'protein' => 2, 'carb' => 9, 'fat' => 15],
            ['name' => 'Almonds', 'desc' => 'Nuts (30g)', 'kcal' => 170, 'protein' => 6, 'carb' => 6, 'fat' => 15],
            ['name' => 'Olive Oil', 'desc' => '1 tablespoon', 'kcal' => 119, 'protein' => 0, 'carb' => 0, 'fat' => 14],
            ['name' => 'Peanut Butter', 'desc' => '2 tablespoons', 'kcal' => 190, 'protein' => 8, 'carb' => 7, 'fat' => 16],

            // Fruits & Others
            ['name' => 'Banana', 'desc' => 'Quick energy', 'kcal' => 105, 'protein' => 1, 'carb' => 27, 'fat' => 0],
            ['name' => 'Apple', 'desc' => 'Fresh fruit', 'kcal' => 95, 'protein' => 0, 'carb' => 25, 'fat' => 0],
            ['name' => 'Blueberries', 'desc' => 'Antioxidant-rich', 'kcal' => 85, 'protein' => 1, 'carb' => 21, 'fat' => 0],
            ['name' => 'Protein Shake', 'desc' => 'Whey protein', 'kcal' => 120, 'protein' => 25, 'carb' => 3, 'fat' => 1],
        ];

        $mealItems = collect();
        foreach ($foodLibrary as $food) {
            $mealItems->push(mealItem::create([
                'name' => $food['name'],
                'description' => $food['desc'],
                'image_url' => $faker->imageUrl(300, 300, 'food', true),
                'kcal_per_portion' => $food['kcal'],
                'protein_per_portion' => $food['protein'],
                'carb_per_portion' => $food['carb'],
                'fat_per_portion' => $food['fat'],
            ]));
        }

        // Create daily logs and meals for each user
        foreach ($users as $currentUser) {
            // Create goals for this user
            $userGoals = collect([
                goals::create([
                    'user_id' => $currentUser->id,
                    'kcal_goal' => $faker->numberBetween(1600, 2800),
                    'protein_goal' => $faker->numberBetween(100, 200),
                    'carbs_goal' => $faker->numberBetween(150, 350),
                    'fat_goal' => $faker->numberBetween(40, 90),
                    'is_kcal_max' => $faker->boolean(),
                    'is_carbs_max' => $faker->boolean(),
                    'is_fat_max' => $faker->boolean(),
                    'is_active' => true,
                ]),
            ]);

            // Create 7 days of logs (one per day)
            for ($day = 0; $day < 7; $day++) {
                $date = now()->subDays($day)->startOfDay();
                $goal = $userGoals->random();

                // Ensure only one log per user per day using the unique constraint
                $log = dailyLog::firstOrCreate(
                    [
                        'user_id' => $currentUser->id,
                        'date' => $date->toDateString(),
                    ],
                    [
                        'goal_id' => $goal->id,
                    ]
                );

                // Create 3-5 meals per day
                $mealCount = $faker->numberBetween(3, 5);
                $mealNames = ['Breakfast', 'Morning Snack', 'Lunch', 'Afternoon Snack', 'Dinner', 'Evening Snack'];

                for ($m = 0; $m < $mealCount; $m++) {
                    $mealKcal = 0;
                    $mealProtein = 0;
                    $mealCarbs = 0;
                    $mealFat = 0;

                    $meal = meal::create([
                        'user_id' => $currentUser->id,
                        'daily_log_id' => $log->id,
                        'name' => $mealNames[$m] ?? $faker->randomElement(['Snack', 'Post-Workout', 'Pre-Workout']),
                        'kcal_total' => 0,
                        'protein_total' => 0,
                        'carb_total' => 0,
                        'fat_total' => 0,
                    ]);

                    // Add 2-5 food items to each meal
                    $foodItemCount = $faker->numberBetween(2, 5);
                    $selectedFoods = $mealItems->random($foodItemCount);

                    foreach ($selectedFoods as $food) {
                        $portions = $faker->randomFloat(1, 0.5, 3);
                        $meal->mealItems()->attach($food->id, ['portions' => $portions]);

                        // Calculate meal totals from food items
                        $mealKcal += $food->kcal_per_portion * $portions;
                        $mealProtein += $food->protein_per_portion * $portions;
                        $mealCarbs += $food->carb_per_portion * $portions;
                        $mealFat += $food->fat_per_portion * $portions;
                    }

                    // Update meal with calculated totals
                    $meal->update([
                        'kcal_total' => round($mealKcal),
                        'protein_total' => round($mealProtein),
                        'carb_total' => round($mealCarbs),
                        'fat_total' => round($mealFat),
                    ]);
                }
            }
        }
    }
}
