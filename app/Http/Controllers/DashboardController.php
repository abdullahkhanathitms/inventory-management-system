<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $totalCategories = Category::count();

        $totalUsers = User::count();

        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalUsers'
        ));
    }
}
