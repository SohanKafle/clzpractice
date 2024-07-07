<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
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
    public function viewproducts($id)
    {
        $product=Products::find($id);
        $relatedproducts=Products::where('category_id',$product->category_id)->where('id','!=',$id)->get();
        return view('viewproducts', compact('product','relatedproducts'));
    }
    public function myprofile()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('myprofile',compact('orders'));
    }
}
