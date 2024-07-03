<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        $data['user_id'] = auth()->id();
        $check = Cart::where('user_id', $data['user_id'])->where('product_id', $data['product_id'])->first();
        if ($check) {
            $check->update([
                'quantity' => $check->quantity + $data['quantity']
            ]);
            return redirect()->back()->with('success', 'Product Already in cart');
        }
        Cart::create($data);
        return redirect()->back()->with('success', 'Product added to cart successfully');
    }
}
