@props(['src', 'tytul', 'kategoria', 'czastrwania'])

<div class="w-36 h-auto rounded-xl overflow-hidden shadow-md hover:scale-105 transition duration-300 bg-white/5 text-white">
    <img src="{{ $src }}" alt="{{ $tytul }}" class="w-full h-56 object-cover">
    <div class="p-2">
        <h3 class="text-sm font-semibold truncate">{{ $tytul }}</h3>
        <p class="text-xs text-white/80">{{ $kategoria }}</p>
        <p class="text-xs text-white/60">{{ $czastrwania }}</p>
    </div>
</div>

