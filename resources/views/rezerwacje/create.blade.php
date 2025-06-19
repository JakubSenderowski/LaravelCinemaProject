<x-default>
    <h1>Wybierz film, który chciałbyś zarezerwować :) :</h1>
    <div class="grid grid-cols-2 gap-4">
    @foreach($rezerwacje as $rezerwacja)
        <x-movie-book-poster
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
