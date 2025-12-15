<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MealController
{
    public function index(){
        return view('home/meals/index');
    }
}
