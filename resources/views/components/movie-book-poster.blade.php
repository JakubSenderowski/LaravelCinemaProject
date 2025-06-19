@props(['src', 'tytul', 'czas_trwania', 'data', 'godzina', 'cena', 'opis'])

<div class="w-full flex items-start gap-4 p-3 rounded-xl overflow-hidden shadow-md hover:scale-105 transition duration-300 bg-white/5 text-white">
    <img src="{{ $src }}" alt="{{ $tytul }}" class="w-36 h-56 object-cover rounded-lg">
    <div class="flex flex-col justify-between h-full">
        <h3 class="text-base font-bold text-white">Tytuł: {{ $tytul }}</h3>
        <p class="text-sm text-white/90">Czas Trwania: {{ $czas_trwania }} min</p>
        <p class="text-sm text-white/80">Data: {{ $data }}</p>
        <p class="text-sm text-white/80">Godzina: {{ $godzina }}</p>
        <p class="text-sm text-white/80">Cena: {{ $cena }}</p>
        <p class="text-sm text-white/80 leading-snug">Opis: {{ $opis }}</p>
    </div>
</div>
