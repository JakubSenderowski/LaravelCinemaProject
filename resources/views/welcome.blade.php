<x-default>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl mb-3">Wyszukaj film!</h1>
            <x-form action="/search" class="mt-6">
                <x-input> </x-input>
            </x-form>
        </section>

        <x-section-heading>Top 3 - Najlepsze filmy tego miesiąca 🔥.</x-section-heading>

        <div class="mt-10 px-6 grid grid-cols-1 md:grid-cols-3 gap-6 place-items-center">
            @foreach($filmy as $film)
                <x-movie-poster
                    :src="'/storage/posters/' . $film->poster"
                    :tytul="$film->tytul"
                    :kategoria="$film->kategoria->nazwa"
                    :czastrwania="$film->czas_trwania . ' min'"
                />
            @endforeach
        </div>
    </div>

    <x-section-heading>Nasze filmy</x-section-heading>
    <p>TUTAJ WSZYSTKIE FILMY PO LOOPIE ZROBIĆ</p>

    <x-section-heading>Hej! zerknij na nasze statystyki ☺️. Tutaj animacja Count UP.</x-section-heading>
    <p>Z bazy liczba filmów, liczba użytkowników i liczba rezerwacji</p>
</x-default>
