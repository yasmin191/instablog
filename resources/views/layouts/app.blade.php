<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InstaBlog</title>

    <Link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="p-8 bg-gradient-to-b from-green-400 via-black to-blue-400">
    <nav class="p-6 bg-black text-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li class="p-3">
                <a href="/">Home</a>
            </li>
            <li class="p-3">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="p-3">
                <a href="{{ route('posts') }}">Posts</a>
            </li>
               
        </ul>
        <ul class="flex items-center">
           @auth
            <li>
                <a href="" class="text-teal-400 text-bold p-3">Welcome, {{ auth()->user()->name}}</a>
            </li>
            <li>
               <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="p-3 mt-3">Logout</button>
                </form>
            </li>
            @endauth

            @guest
            <li class="p-3">
                <a href="{{ route('login') }}">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="p-3">Register</a>
            </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>