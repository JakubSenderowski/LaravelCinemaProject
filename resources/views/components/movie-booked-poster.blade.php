{{-- resources/views/components/rezerwacja-card.blade.php --}}
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
    bg-white
    transition-transform
    duration-300
    hover:scale-105
    hover:shadow-lg
  "
>
    <img
        src="{{ $src }}"
        alt="{{ $tytul }}"
        class="w-36 h-56 object-cover rounded-lg flex-shrink-0"
    />

    <div class="flex flex-col justify-between flex-1 space-y-1">
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

        @if($liczba_miejsc)
            <p class="text-sm text-brown/70">
                <span class="font-semibold text-brown">Zarezerwowane miejsca:</span>
                {{ $liczba_miejsc }}
            </p>
        @endif

        <div class="mt-3 flex flex-wrap gap-2">
            <a
                href="{{ route('rezerwacja.editView', $id) }}"
                class="
          px-4
          py-2
          text-sm
          font-medium
          rounded-lg
          bg-primary
          text-white
          hover:bg-accent
          transition-colors
        "
            >
                Edytuj
            </a>

            <form
                action="{{ route('rezerwacja.delete', $rezerwacja) }}"
                method="POST"
                class="inline-block"
            >
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="
            px-4
            py-2
            text-sm
            font-medium
            rounded-lg
            bg-red-500
            text-white
            hover:bg-red-600
            transition-colors
          "
                >
                    Usuń
                </button>
            </form>
        </div>
    </div>
</div>
