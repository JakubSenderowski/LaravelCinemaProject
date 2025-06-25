@props([
    'id',
    'user',
    'tytul',
    'seans',
    'czas_trwania',
    'data',
    'liczba_miejsc',
    'is_active',
])

<div class="bg-[#1c1c24] rounded-xl shadow-md p-4 text-white w-full max-w-md mx-auto border border-white/10">
    <h2 class="text-xl font-bold text-indigo-300 mb-3 flex items-center gap-2">
        👤 Użytkownik: <span class="text-white font-medium">{{ $user }}</span>
    </h2>

    <ul class="text-sm space-y-1 text-white/90">
        <li>🎬 <strong>Tytuł filmu:</strong> {{ $tytul }}</li>
        <li>⏱ <strong>Czas trwania:</strong> {{ $czas_trwania }} min</li>
        <li>📅 <strong>Data seansu:</strong> {{ $data }}</li>
        <li>🎟 <strong>Liczba miejsc:</strong> {{ $liczba_miejsc }}</li>
        <li>
            📌 <strong>Status rezerwacji:</strong>
            @if($is_active)
                <span class="text-green-400 font-semibold ml-1">✅ Aktywna</span>
            @else
                <span class="text-red-400 font-semibold ml-1">❌ Anulowana</span>
            @endif
        </li>
    </ul>

    <div class="flex justify-end gap-2 mt-4">
        <a href="{{ route('admin.rezerwacje.editView', $id) }}" class="px-4 py-1.5 text-sm rounded bg-blue-600 hover:bg-blue-700 transition">
            ✏️ Edytuj
        </a>
        <form action="{{ route('admin.rezerwacje.destroy', $id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-1.5 text-sm rounded bg-red-600 hover:bg-red-700 transition">
                🗑️ Usuń
            </button>
        </form>
    </div>
</div>
