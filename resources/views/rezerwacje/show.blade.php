
<x-default>
    <div class="flex items-center gap-3 mb-4">
        <h1 class="text-xl font-semibold">
            Chcesz zarezerwować, któryś z filmów? Kliknij na niego i potwierdź! To takie proste :)
        </h1>
        <img src="{{ asset('storage/gifs/cat.gif') }}" alt="kot" class="h-10 w-auto rounded-md">
    </div>

    <div class="grid grid-cols-2 gap-4">
        @foreach($rezerwacje as $rezerwacja)
            <x-movie-book-poster
                :seans_id="$rezerwacja->seans->id"
                :src="'/storage/posters/' . $rezerwacja->seans->film->poster"
                :tytul="$rezerwacja->seans->film->tytul"
                :czas_trwania="$rezerwacja->seans->film->czas_trwania"
                :data="$rezerwacja->seans->data"
                :godzina="$rezerwacja->seans->godzina"
                :cena="$rezerwacja->seans->cena . 'zł / bilet normalny'"
                :opis="$rezerwacja->seans->film->opis . ' min'"
            />
        @endforeach
    </div>
</x-default>
