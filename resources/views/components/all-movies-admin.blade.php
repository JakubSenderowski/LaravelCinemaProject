@props([
  'id',
  'tytul',
  'opis',
  'czas_trwania',
  'poster',
  'kategoria',
  'is_hot',
  'is_active',
])

<div
    class="
    bg-white
    rounded-xl
    shadow-md
    p-4
    flex
    flex-col
    items-center
    text-brown
    hover:scale-105
    transition-transform
    duration-300
    w-full
    max-w-sm
  "
>
    <img
        src="/storage/posters/{{ $poster }}"
        alt="Poster {{ $tytul }}"
        class="w-full h-56 object-cover rounded-md mb-4 flex-shrink-0"
    />

    <div class="w-full space-y-2">
        <h2 class="text-lg font-semibold text-primary">
            {{ $tytul }}
        </h2>

        <p class="text-sm text-brown/80 line-clamp-2">
            {{ $opis }}
        </p>

        <p class="text-sm text-brown">
            ⏱ {{ $czas_trwania }} min
        </p>

        <p class="text-sm text-primary">
            🎭 Kategoria: {{ $kategoria ?? 'Brak' }}
        </p>

        <p class="text-sm">
            🔥 Hot:
            @if($is_hot)
                <span class="text-primary font-semibold">Tak</span>
            @else
                <span class="text-brown/60">Nie</span>
            @endif
        </p>

        <p class="text-sm">
            ✅ Aktywny:
            @if($is_active)
                <span class="text-green font-semibold">Tak</span>
            @else
                <span class="text-brown/60">Nie</span>
            @endif
        </p>

        <div class="flex justify-between gap-3 mt-4">
            <a
                href="{{ route('admin.filmy.editView', $id) }}"
                class="
          flex-1
          text-center
          px-4
          py-2
          text-sm
          font-medium
          rounded-md
          bg-primary
          text-white
          hover:bg-accent
          transition-colors
        "
            >
                Edytuj
            </a>

            <form
                action="{{ route('admin.filmy.destroy', $id) }}"
                method="POST"
                class="flex-1"
            >
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="
            w-full
            px-4
            py-2
            text-sm
            font-medium
            rounded-md
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
