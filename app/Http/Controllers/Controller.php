<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function dashboard() {
        return view('admin.dashboard', [
            'totalCars' => Car::count(),
            'availableCars' => Car::where('availability', true)->count(),
            'totalRentals' => Rental::count(),
            'totalEarnings' => Rental::sum('total_cost'),
        ]);
    }
}    
