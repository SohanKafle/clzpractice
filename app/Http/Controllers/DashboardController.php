<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
     $categories = Category::count();
     $products = Products::count();
     return view('dashboard',compact('categories','products'));
    }
}
