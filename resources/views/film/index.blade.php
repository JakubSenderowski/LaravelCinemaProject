<x-default>
    <div class="space-y-12">
        @if(session('error'))
            <div class="bg-red-600 text-white px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <section class="text-center pt-8">
            <h1 class="font-bold text-4xl text-primary mb-4">
                Wyszukaj film!
            </h1>
            <form action="{{ route('filmy.search') }}" method="GET" class="mt-6">
                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Wpisz tytuł filmu..."
                    class="
            w-full
            rounded-xl
            bg-brown/10
            border
            border-primary
            px-5
            py-3
            placeholder-brown/50
            focus:bg-white
            focus:border-accent
            transition-colors
          "
                />
            </form>
        </section>

        <x-section-heading>Top 3 – Najlepsze filmy tego miesiąca 🔥</x-section-heading>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-6">
            @foreach($hotMovies as $hotMovie)
                <x-movie-poster
                    :src="'/storage/posters/' . $hotMovie->poster"
                    :tytul="$hotMovie->tytul"
                    :kategoria="$hotMovie->kategoria->nazwa"
                    :czastrwania="$hotMovie->czas_trwania . ' min'"
                />
            @endforeach
        </div>

        <x-section-heading>Nasze filmy</x-section-heading>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 px-6">
            @foreach($filmy as $film)
                <div class="text-center">
                    <x-movie-poster
                        :src="'/storage/posters/' . $film->poster"
                        :tytul="$film->tytul"
                        :kategoria="$film->kategoria->nazwa"
                        :czastrwania="$film->czas_trwania . ' min'"
                    />
                    <div class="mt-2 flex flex-wrap justify-center gap-2">
                        @foreach($film->tags as $tag)
                            <span class="bg-accent text-white text-xs px-2 py-1 rounded-full">
                {{ $tag->nazwa }}
              </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <x-section-heading>Hej! Zerknij na nasze statystyki ☺️</x-section-heading>
        <div class="flex flex-col md:flex-row justify-center gap-10 text-left text-brown">

            <div>
                <p class="text-brown/60 text-base mb-2">🎬 Filmów w bazie:</p>
                <span class="animate-bounce-in text-4xl font-bold
                     bg-gradient-to-r from-primary to-accent
                     bg-clip-text text-transparent">
          {{ $filmyPoliczone }}
        </span>
            </div>

            <div>
                <p class="text-brown/60 text-base mb-2">🧙 Zarejestrowanych użytkowników:</p>
                <span class="animate-bounce-in text-4xl font-bold
                     bg-gradient-to-r from-primary to-accent
                     bg-clip-text text-transparent">
        </span>
            </div>

        </div>

    </div>
</x-default>
