@props([
  'id',
  'nazwa',
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
            🏷️ Nazwa kategorii:
            <span class="text-brown font-medium">{{ $nazwa }}</span>
        </h2>

        <ul class="text-sm space-y-1">
            <li>
                📌 <strong class="font-semibold">Status:</strong>
                @if($is_active)
                    <span class="text-green font-semibold">✅ Aktywna</span>
                @else
                    <span class="text-brown/60 font-semibold">❌ Nieaktywna</span>
                @endif
            </li>
        </ul>
    </div>

    <div class="flex justify-center gap-2 mt-5 flex-wrap">
        <a
            href="{{ route('admin.kategorie.editView', $id) }}"
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
            action="{{ route('admin.kategorie.destroy', $id) }}"
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
