<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    @if (Session::has('success'))
        <div class="fixed top-4 right-4 rounded-lg shadow-md bg-blue-600 text-white px-5 py-3" id="message">
            <p>{{ session('success') }}</p>
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('message').style.display = 'none';
            }, 2000);
        </script>
    @endif
    <nav class="bg-amber-600 p-2 flex text-white justify-between items-center px-24">
        <h2 class="font-bold text-3xl">E-PASAL</h2>
        <div class="flex gap-10">
            <a href="{{ route('home') }}">Home</a>
            @php $categories = \App\Models\Category::orderBy('priority')->get(); @endphp
            @foreach ($categories as $category)
                <a href="{{ route('categoryproducts', $category->id) }}">{{ $category->name }}</a>
            @endforeach

            @auth
                {{-- <a href="">Hi, {{auth()->user()->name}}</a> --}}
                <a href="{{ route('myprofile') }}">Hi, {{ auth()->user()->name }}</a>
                <a href="{{ route('mycart') }}"><i class="ri-shopping-cart-2-line"></i></a>
                <form action="{{ route('logout') }}" method="post" class="inline">
                    @csrf
                    <button type="submit"><i class="ri-logout-box-r-line"></i></button>
                </form>
            @else
                <a href="/login">Login</a>
            @endauth
        </div>
    </nav>

    @yield('content')


    <footer class="bg-amber-600 p-2 text-white text-center">
        <p>&copy; 2024 E-PASAL</p>
    </footer>
</body>

</html>
