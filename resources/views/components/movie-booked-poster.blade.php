@props([
    'id',
    'rezerwacja',
    'seans_id',
    'src',
    'tytul',
    'data',
    'czas_trwania',
    'godzina',
    'liczba_miejsc' => null,
])

<div class="w-full flex items-start gap-4 p-3 rounded-xl overflow-hidden shadow-md hover:scale-105 transition duration-300 bg-white/5 text-white">
    <img src="{{ $src }}" alt="{{ $tytul }}" class="w-36 h-56 object-cover rounded-lg">
    <div class="flex flex-col justify-between h-full">
        <h3 class="text-base font-bold text-white">Tytuł: {{ $tytul }}</h3>
        <p class="text-sm text-white/90">Czas Trwania: {{ $czas_trwania }} min</p>
        <p class="text-sm text-white/80">Data: {{ $data }}</p>
        <p class="text-sm text-white/80">Godzina: {{ $godzina }}</p>
        @if($liczba_miejsc)
            <p class="text-sm text-white/90">Zarezerwowane miejsca: {{ $liczba_miejsc }}</p>
        @endif
        <a href="{{ route('rezerwacja.editView', $id) }}" class="btn btn-primary">Edytuj</a>
        <form action="{{ route('rezerwacja.delete', $rezerwacja) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Usuń</button>
        </form>

    </div>
</div>
