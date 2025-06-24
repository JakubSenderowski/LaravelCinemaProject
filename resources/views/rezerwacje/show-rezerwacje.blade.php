<x-default>
    <div class="mb-6">
        <div class="flex items-center gap-3 mb-4">
            <h1 class="text-xl font-semibold text-white">
                Poniżej lista twoich rezerwacji! To miejsce, w którym możesz je edytować lub usunąć :)
            </h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($rezerwacje as $rezerwacja)
                <x-movie-booked-poster
                    :seans_id="$rezerwacja->seans->id"
                    :src="'/storage/posters/' . $rezerwacja->seans->film->poster"
                    :tytul="$rezerwacja->seans->film->tytul"
                    :czas_trwania="$rezerwacja->seans->film->czas_trwania"
                    :data="$rezerwacja->seans->data"
                    :godzina="$rezerwacja->seans->godzina"
                    :liczba_miejsc="$rezerwacja->liczba_miejsc"
                    :id="$rezerwacja->id"
                    :rezerwacja="$rezerwacja"
                />
            @endforeach
        </div>
    </div>
</x-default>
