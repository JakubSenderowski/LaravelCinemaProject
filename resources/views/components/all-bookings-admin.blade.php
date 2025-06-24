@props([
//    'id',
    'user',
    'tytul',
    'seans',
    'czas_trwania',
    'data',
    'liczba_miejsc',
    'is_active',
])
<div class="bg-gradient-to-br from-indigo-900/40 to-indigo-700/30 rounded-xl shadow-lg p-5 flex flex-col text-white hover:scale-[1.02] transition duration-300 w-full border border-white/10">
    <h2 class="text-lg font-semibold mb-2 text-center">👤 Użytkownik: <span class="text-indigo-300">{{ $user }}</span></h2>

    <ul class="space-y-1 text-sm text-white/90">
        <li><strong>🎬 Tytuł filmu:</strong> {{ $tytul }}</li>
        <li><strong>⏱ Czas trwania:</strong> {{ $czas_trwania }} min</li>
        <li><strong>📅 Data seansu:</strong> {{ $data }}</li>
        <li><strong>🎟 Liczba miejsc:</strong> {{ $liczba_miejsc }}</li>
        <li>
            <strong>📌 Status rezerwacji:</strong>
            @if($is_active)
                <span class="text-green-400 font-semibold">✅ Aktywna</span>
            @else
                <span class="text-red-400 font-semibold">❌ Anulowana</span>
            @endif
        </li>
    </ul>
</div>
{{--        <div class="flex justify-between mt-3">--}}
{{--            <a href="{{ route('admin.filmy.editView', $id) }}" class="px-4 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-sm">Edytuj</a>--}}
{{--            <form action="{{ route('admin.filmy.destroy', $id) }}" method="POST">--}}
{{--                @csrf--}}
{{--                @method('DELETE')--}}
{{--                <button type="submit" class="px-4 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-sm">--}}
{{--                    Usuń--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
