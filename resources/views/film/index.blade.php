<x-default>
    <h1>NOWA STRONA GŁÓWNA?</h1>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl mb-3">Wyszukaj film!</h1>
            <x-form action="/search" class="mt-6">
                <x-input> </x-input>
            </x-form>
        </section>
        <x-section-heading>Top 3 - Najlepsze filmy tego miesiąca 🔥.</x-section-heading>
        <div class="mt-10 px-6 grid grid-cols-1 md:grid-cols-3 gap-6 place-items-center">
        @foreach($hotMovies as $hotMovie)
                <x-movie-poster
                    :src="'/storage/posters/' . $hotMovie->poster"
                    :tytul="$hotMovie->tytul"
                    :kategoria="$hotMovie->kategoria->nazwa"
                    :czastrwania="$hotMovie->czas_trwania . ' min'"
                />
        @endforeach
        </div>
    </div>
    <x-section-heading>Nasze filmy</x-section-heading>
    <div class="mt-10 px-6 grid grid-cols-1 md:grid-cols-4 gap-6 place-items-center">
        @foreach($filmy as $film)
            <x-movie-poster
                :src="'/storage/posters/' . $film->poster"
                :tytul="$film->tytul"
                :kategoria="$film->kategoria->nazwa"
                :czastrwania="$film->czas_trwania . ' min'"
            />
        @endforeach
    </div>
    <x-section-heading>Hej! zerknij na nasze statystyki ☺️</x-section-heading>
    <div class="flex flex-col md:flex-row justify-center gap-10 text-center text-white text-xl font-bold">
        <div class="text-left ml-0">
            <p class="text-white/60 text-base mb-2">🎬 Filmów w bazie:</p>
            <span class="animate-bounce-in text-4xl font-bold bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                <span>{{$filmyPoliczone}}</span>
            </span>
        </div>
        <div class="text-left ml-0">
            <p class="text-white/60 text-base mb-2">🧙 Zarejestrowanych użytkowników:</p>
            <span class="animate-bounce-in text-4xl font-bold bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                TUTAJ DAĆ PRZELICZONYCH USERÓW Z BAZY - DO ZROBIENIA
            </span>
        </div>



    </div>
</x-default>
