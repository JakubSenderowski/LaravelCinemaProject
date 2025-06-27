@props(['seans_id', 'src', 'tytul', 'czas_trwania', 'data', 'godzina', 'cena', 'opis'])

<div
    class="
    group
    w-full
    flex
    items-start
    gap-4
    p-4
    rounded-xl
    overflow-hidden
    shadow-md
    transition-transform
    duration-300
    hover:scale-105
    hover:shadow-lg
    bg-white
  "
>
    <img
        src="{{ $src }}"
        alt="{{ $tytul }}"
        class="w-36 h-56 object-cover rounded-lg flex-shrink-0"
    />

    <div class="flex flex-col justify-between flex-1">
        <a
            href="{{ route('rezerwacja.create', $seans_id) }}"
            class="space-y-2"
        >
            <h3 class="text-lg font-bold text-primary">
                {{ $tytul }}
            </h3>

            <p class="text-sm text-brown/70">
                <span class="font-semibold text-brown">Czas:</span>
                {{ $czas_trwania }} min
            </p>
            <p class="text-sm text-brown/70">
                <span class="font-semibold text-brown">Data:</span>
                {{ $data }}
            </p>
            <p class="text-sm text-brown/70">
                <span class="font-semibold text-brown">Godzina:</span>
                {{ $godzina }}
            </p>

            <p class="text-sm font-semibold text-green">
                Cena: {{ $cena }} zł
            </p>

            <p class="text-sm text-brown/80 leading-snug">
                {{ $opis }}
            </p>
        </a>
    </div>
</div>
