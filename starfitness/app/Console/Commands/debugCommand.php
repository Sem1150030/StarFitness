<?php

namespace App\Console\Commands;


use App\Models\DailyLog;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class debugCommand extends Command
{
    protected $signature = 'debug';


    public function handle()
    {

        $log = DailyLog::query()
            ->with('meals')
            ->today(User::query()->first());

        dd($log->meals);

        $this->info('Debug command executed successfully.');
    }
}
