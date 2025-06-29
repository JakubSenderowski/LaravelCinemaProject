<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kino – Jakub Senderowski</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cream text-brown font-sans">
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <header class="flex flex-col md:flex-row justify-between items-center py-6 border-b border-b-brown/20">
        <div class="mb-4 md:mb-0">
            <a href="/" class="text-xl font-semibold text-primary hover:text-accent transition-colors">
                Kino
            </a>
            @auth
                <p class="text-brown text-sm mt-1">
                    Witaj, <span class="font-medium">{{ Auth::user()->name }}</span>
                    @if(Auth::user()->is_admin)
                        <span class="ml-2 px-2 py-0.5 bg-red-500 text-white text-xs rounded">Administrator</span>
                    @endif
                </p>
            @endauth
        </div>

        <nav class="flex flex-wrap gap-6 font-medium">
            @auth
                @if(Auth::user()->is_admin)
                    <a href="/dashboard" class="text-accent hover:underline">Admin Dashboard</a>
                @endif
            @endauth
            <a href="/rezerwacja-dokonana" class="hover:text-primary">Moje Rezerwacje</a>
            <a href="/rezerwacja" class="hover:text-primary">Zarezerwuj</a>
            <a href="/faq" class="hover:text-primary">FAQ</a>
        </nav>

        <div class="flex gap-4 mt-4 md:mt-0">
            @guest
                <a href="/login" class="text-primary hover:text-accent">Zaloguj</a>
                <a href="/register" class="text-primary hover:text-accent">Rejestruj</a>
            @endguest
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-primary hover:text-accent">Wyloguj</button>
                </form>
            @endauth
        </div>
    </header>

    <main class="mt-10">
        {{$slot}}
    </main>
</div>
</body>
</html>
