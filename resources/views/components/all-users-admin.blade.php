@props([
  'id',
  'name',
  'email',
  'is_active',
  'is_admin',
])
<div
    class="
    bg-white
    rounded-2xl
    p-5
    shadow-md
    border
    border-gray-200
    text-gray-800
    flex
    flex-col
    justify-between
    w-full
    max-w-[320px]
    mx-auto
  "
>
    <div>
        <h2 class="text-lg font-semibold text-blue-600 mb-3">
            👤 Użytkownik:
            <span class="text-gray-800 font-medium">{{ $name }}</span>
        </h2>

        <ul class="text-sm space-y-1">
            <li>
                📧 <strong>Email:</strong> {{ $email }}
            </li>
            <li>
                📌 <strong>Status:</strong>
                @if($is_active)
                    <span class="text-green-500 font-semibold">✅ Aktywny</span>
                @else
                    <span class="text-red-500 font-semibold">❌ Nieaktywny</span>
                @endif
            </li>
            <li>
                📌 <strong>Administrator:</strong>
                @if($is_admin)
                    <span class="text-green-500 font-semibold">✅ Tak</span>
                @else
                    <span class="text-red-500 font-semibold">❌ Nie</span>
                @endif
            </li>
        </ul>
    </div>

    <div class="flex justify-center gap-2 mt-5 flex-wrap">
        <a
            href="{{ route('admin.users.editView', $id) }}"
            class="
        px-4
        py-2
        text-sm
        font-medium
        rounded-md
        bg-yellow-500
        text-white
        hover:bg-yellow-600
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
            action="{{ route('admin.users.destroy', $id) }}"
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
