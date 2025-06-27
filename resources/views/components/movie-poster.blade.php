@props(['src', 'tytul', 'kategoria', 'czastrwania'])

<div
    class="
    group
    w-36
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
        class="w-full h-56 object-cover"
    />

    <div class="p-2 bg-cream">
        <h3
            class="
        text-sm
        font-semibold
        text-brown
        truncate
      "
            title="{{ $tytul }}"
        >
            {{ $tytul }}
        </h3>

        <p class="text-xs text-primary mt-1">
            {{ $kategoria }}
        </p>

        <p class="text-xs text-brown/60">
            {{ $czastrwania }}
        </p>
    </div>
</div>
