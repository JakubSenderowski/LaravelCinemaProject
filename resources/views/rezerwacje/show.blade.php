
<x-default>
    <div class="flex items-center gap-3 mb-4">
        @if(session('success'))
            <div class="bg-green text-white px-4 py-2 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="text-xl font-semibold">
            Chcesz zarezerwować, któryś z filmów? Kliknij na niego i potwierdź! To takie proste :)
        </h1>
        <img src="{{ asset('storage/gifs/cat.gif') }}" alt="kot" class="h-10 w-auto rounded-md">
    </div>

    <div class="grid grid-cols-2 gap-4">
        @foreach($seanse as $seans)
            <x-movie-book-poster
                :seans_id="$seans->id"
                :src="'/storage/posters/' . $seans->film->poster"
                :tytul="$seans->film->tytul"
                :czas_trwania="$seans->film->czas_trwania"
                :data="$seans->data"
                :godzina="$seans->godzina"
                :cena="$seans->cena . 'zł / bilet normalny'"
                :opis="$seans->film->opis"
            />

        @endforeach
    </div>
</x-default>
