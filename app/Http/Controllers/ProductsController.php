<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Products::all();
        return view('products.index',compact('products'));
    }

    public function create()
    {
      return view('products.create');
    }

    public function store(Request $request)
    {
       $data = $request->validate([
        'category_id' => 'required|integer'
       ])
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request,$id)
    {
 
    }

    public function delete($id)
    {
       
    }
}
