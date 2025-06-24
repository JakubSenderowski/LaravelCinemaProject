<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kino - Jakub Senderowski</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-brown text-white font-sans">
<div class="px-10">
    <nav class="flex justify-between items-center py-4 border-b border-white/10">
        <div>
            <a href="/">
                @auth
                    @if(Auth::user()->is_admin)
                        <p class="text-white text-sm">
                            Witaj, {{ Auth::user()->name }} 👋 <span class="text-red-500 font-semibold">Administrator</span>
                        </p>
                    @else
                        <p class="text-white text-sm">
                            Witaj, {{ Auth::user()->name }} 👋
                        </p>
                    @endif
                @endauth
            </a>
        </div>
        <div class="space-x-6 font-bold">
            @auth
                @if(Auth::user()->is_admin)
            <a href="/dashboard"><span class="text-yellow-300 font-semibold"">Admin DashBoard</span></a>
                @endif
            @endauth
            <a href="/rezerwacja-dokonana">Moje Rezerwacje</a>
            <a href="/rezerwacja">Zarezerwuj</a>
            <a href="#">FAQ</a>
            <a href="#">Nasze kina</a>
        </div>
        <div class="space-x-6 font-bold">
            @guest
            <a href="/login">Zaloguj</a>
            <a href="/register">Zarejestruj</a>
            @endguest
            @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-white">Wyloguj</button>
                    </form>

                @endauth
        </div>

    </nav>
    <main class="mt-10 max-w-[986px] mx-auto">
        {{$slot}}
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
