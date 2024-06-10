<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

  public function index()
  {
    $products = Products::all();
    return view('products.index', compact('products'));
  }

  public function create()
  {
    $categories = Category::orderBy('priority')->get();
    return view('products.create',compact('categories'));
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'category_id' => 'required|integer',
      'name' => 'required',
      'category' => 'required',
      'stock' => 'requried | numeric',
      'photopath' => 'required|image',
      'price' => 'requried|integer'
    
    ]);
    $photoname = time().'.'.$request->photopath->extension();
    $request->photopath->move(public_path('images/products'), $photoname);
    $data['photopath'] = $photoname;
    Products::create($data);
    return redirect()->route('products.index')->with('success','Product created successfully.');
  }

  public function edit($id)
  {
  }

  public function update(Request $request, $id)
  {
  }

  public function delete($id)
  {
  }
}
