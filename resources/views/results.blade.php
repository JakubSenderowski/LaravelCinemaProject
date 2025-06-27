<x-default>
    <x-section-heading>Wyniki wyszukiwania dla: „{{ $query }}”</x-section-heading>

    @if($filmy->isEmpty())
        <p class="text-primary text-center mt-8">
            Brak filmów spełniających kryteria wyszukiwania.
        </p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 px-4">
            @foreach($filmy as $film)
                <div
                    class="
            bg-white
            rounded-xl
            shadow-md
            overflow-hidden
            flex
            flex-col
            items-center
            p-4
            transition-transform
            duration-300
            hover:scale-105
          "
                >
                    <x-movie-poster
                        :src="'/storage/posters/' . $film->poster"
                        :tytul="$film->tytul"
                        :kategoria="$film->kategoria->nazwa"
                        :czastrwania="$film->czas_trwania . ' min'"
                        class="w-full"
                    />

                    <div class="mt-3 flex flex-wrap justify-center gap-2 w-full">
                        @foreach($film->tags as $tag)
                            <span
                                class="
                  bg-accent
                  text-white
                  text-xs
                  px-3
                  py-1
                  rounded-full
                "
                            >
                {{ $tag->nazwa }}
              </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-default>
