<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $products=Products::latest()->limit(5)->get();
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

    public function categoryproducts($catid)
    {
        $category=Category::find($catid);
        $products=Products::where('category_id',$catid)->paginate(3);
        return view('categoryproducts', compact('products','category'));
    }
}
