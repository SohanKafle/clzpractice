<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
          'name' => 'required',
          'description' => 'required',
          'price' => 'required|integer',
          'stock' => 'required|integer',
          'category_id' => 'required',
          'photopath' => 'required|image',
      ]);
      
    $photoname = time().'.'.$request->photopath->extension();
    $request->photopath->move(public_path('images/products'), $photoname);
    $data['photopath'] = $photoname;
    Products::create($data);
    return redirect()->route('products.index')->with('success','Product created successfully.');
  }

  public function edit($id)
  {
    $products = Products::find($id);
    $categories = Category::orderBy('priority')->get();
    return view('products.edit',compact('products','categories'));
  }

  public function update(Request $request, $id)
  {
    $data = $request->validate([
      'name' => 'required',
      'description' => 'required',
      'price' => 'required|integer',
      'stock' => 'required|integer',
      'category_id' => 'required',
      'photopath' => 'image',
  ]);
  $products = Products::find($id);
  $data['photopath'] = $products->photopath;
  if($request->hasFile('photopath')){
      $photoname = time().'.'.$request->photopath->extension();
      $request->photopath->move(public_path('images/products'), $photoname);
      //delete old path
      File::delete(public_path('images/products/'.$products->photopath));
      $data['photopath'] = $photoname;
  }
  $products->update($data);
  return redirect()->route('products.index')->with('success','Product updated successfully.');
}

  public function delete($id)
  {
    $products = Products::find($id);
    File::delete(public_path('images/products/'.$products->photopath));
    $products-> delete();
    return redirect()->route('products.index')->with('success','Product deleted successfully.');
  }
}
