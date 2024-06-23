<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $products=Products::latest()->limit(3)->get();
        return view('welcome', compact('products'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
