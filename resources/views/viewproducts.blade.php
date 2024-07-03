@extends('layouts.master')

@section('content')
<div class="grid grid-cols-4 gap-10 px-24 py-10">
    <div>
        <img src="{{asset('images/products/'.$product->photopath)}}" alt="product" class="w-full h-64 object-cover shadow-lg rounded-lg">
    </div>
    <div class="col-span-2 border-r">
        <h1 class="text-4xl font-bold">{{$product->name}}</h1>
        <p class="text-xl font-thin mt-4">Rs. {{$product->price}}</p>
        <p class="text-xl font-thin mt-4">{{$product->description}}</p>
    <form action="{{route('cart.store')}}" method="POST">
        @csrf
        <input type="number" class="w-20 h-10 border rounded-lg mt-4 " value="1" name="quantity" min="1" max="{{$product->stock}}">
        <div class="text-red-600 text-sm">In stock:{{$product->stock}}</div>
        <br>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4">Add to Cart</button>
    </form>
    </div>
    <div>
        <p class="text-sm font-thin mt-4">Free Delivery</p>
        <p class="text-sm font-thin mt-4">7 Day Return</p>
        <p class="text-sm font-thin mt-4">Terms and Conditions Apply</p>
    </div>
</div>

<div class="grid grid-cols-3 gap-8 px-24 py-8">   
    <h2 class="text-3xl font-semibold col-span-3">Related Products</h2>
    @foreach($relatedproducts as $relatedproduct)
    <div class="p-2">
        <img src="{{ asset('images/products/' . $relatedproduct->photopath) }}" alt="{{ $relatedproduct->name }}" class="w-full h-64 object-cover rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold mt-4">{{ $relatedproduct->name }}</h1>
        <p class="text-xl font-thin mt-2">Rs. {{ $relatedproduct->price }}</p>
    </div>
    @endforeach
</div>
@endsection
