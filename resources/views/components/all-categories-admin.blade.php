@props([
    'id',
    'nazwa',
    'is_active',
])
<div class="bg-[#1f2937] rounded-2xl p-5 shadow-md border border-gray-700 text-white flex flex-col justify-between w-full max-w-[320px] mx-auto">
    <div>
        <h2 class="text-lg font-semibold text-indigo-300 mb-3">🏷️ Nazwa kategorii: <span class="text-white">{{ $nazwa }}</span></h2>

        <ul class="text-sm space-y-1">
            <li>
                📌 <strong>Status:</strong>
                @if($is_active)
                    <span class="text-green-400 font-semibold">✅ Aktywna</span>
                @else
                    <span class="text-red-400 font-semibold">❌ Nieaktywna</span>
                @endif
            </li>
        </ul>
    </div>

{{--    <div class="flex justify-center gap-2 mt-5 flex-wrap">--}}
{{--        <a href="{{ route('admin.kategorie.editView', $id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded-md text-sm font-medium flex items-center justify-center gap-1">--}}
{{--            ✏️ Edytuj--}}
{{--        </a>--}}
{{--        <form action="{{ route('admin.kategorie.destroy', $id) }}" method="POST" class="inline-block">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-md text-sm font-medium flex items-center justify-center gap-1">--}}
{{--                🗑️ Usuń--}}
{{--            </button>--}}
{{--        </form>--}}
{{--    </div>--}}
</div>
