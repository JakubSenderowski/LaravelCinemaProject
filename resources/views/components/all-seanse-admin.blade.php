{{-- resources/views/components/seans-card.blade.php --}}
@props([
  'id',
  'tytul',
  'nazwa',
  'data',
  'cena',
  'godzina',
  'is_active',
])

<div
    class="
    bg-white
    rounded-2xl
    p-5
    shadow-md
    border
    border-brown/20
    text-brown
    flex
    flex-col
    justify-between
    w-full
    max-w-[320px]
    mx-auto
  "
>
    <div>
        <h2 class="text-lg font-semibold text-primary mb-3">
            🎬 Tytuł filmu:
            <span class="text-brown font-medium">{{ $tytul }}</span>
        </h2>

        <ul class="text-sm space-y-1">
            <li>
                🎬 <strong class="font-semibold">Rodzaj/Numer Sali:</strong>
                <span class="text-brown">{{ $nazwa }}</span>
            </li>
            <li>
                📅 <strong class="font-semibold">Data seansu:</strong>
                <span class="text-brown">{{ $data }}</span>
            </li>
            <li>
                ⏱ <strong class="font-semibold">Godzina:</strong>
                <span class="text-brown">{{ $godzina }}</span>
            </li>
            <li>
                💸 <strong class="font-semibold">Cena za bilet:</strong>
                <span class="text-green">{{ $cena }} zł</span>
            </li>
            <li>
                📌 <strong class="font-semibold">Status:</strong>
                @if($is_active)
                    <span class="text-green font-semibold">✅ Aktywna</span>
                @else
                    <span class="text-brown/60 font-semibold">❌ Anulowana</span>
                @endif
            </li>
        </ul>
    </div>

    <div class="flex justify-center gap-2 mt-5 flex-wrap">
        <a
            href="{{ route('admin.seanse.editView', $id) }}"
            class="
        px-4
        py-2
        text-sm
        font-medium
        rounded-md
        bg-primary
        text-white
        hover:bg-accent
        transition-colors
        flex
        items-center
        justify-center
        gap-1
      "
        >
            ✏️ Edytuj
        </a>

        <form
            action="{{ route('admin.seanse.destroy', $id) }}"
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
          rounded-md
          bg-red-500
          text-white
          hover:bg-red-600
          transition-colors
          flex
          items-center
          justify-center
          gap-1
        "
            >
                🗑️ Usuń
            </button>
        </form>
    </div>
</div>
