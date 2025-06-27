{{-- resources/views/components/tag-card.blade.php --}}
@props([
  'id',
  'nazwa',
  'is_active'
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
            🏷️ Nazwa tagu:
            <span class="text-brown font-medium">{{ $nazwa }}</span>
        </h2>

        <ul class="text-sm space-y-1">
            <li>
                📌 <strong class="text-brown">Status:</strong>
                @if($is_active)
                    <span class="text-green font-semibold">✅ Aktywny</span>
                @else
                    <span class="text-brown/60 font-semibold">❌ Nieaktywny</span>
                @endif
            </li>
        </ul>
    </div>

    <div class="flex justify-center gap-2 mt-5 flex-wrap">
        <a
            href="{{ route('admin.tags.editView', $id) }}"
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
            action="{{ route('admin.tags.destroy', $id) }}"
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
                🗑️ Dezaktywuj
            </button>
        </form>
    </div>
</div>
