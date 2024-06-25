@extends('layouts.master')

@section('content')
<div class="grid grid-cols-2 gap-8 px-24 py-8">
    <div class="p-2">
        <img src="{{ asset('images/products/' . $product->photopath) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-lg shadow-md">
    </div>
    <div class="p-2">
        <h2 class="text-4xl font-semibold">{{ $product->name }}</h2>
        <p class="text-xl font-thin mt-4">{{ $product->description }}</p>
        <div class="flex justify-between items-center mt-4">
            <span class="text-2xl font-thin">Rs. {{ $product->price }}</span>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Add to Cart</button>
        </div>
    </div>
    <div class="col-span-2 mt-8">
        <p class="text-sm font-thin">Free Delivery</p>
        <p class="text-sm font-thin mt-2">7 Days Return Policy</p>
        <p class="text-sm font-thin mt-2">Terms and Conditions Apply</p>
    </div>
</div>
@endsection
