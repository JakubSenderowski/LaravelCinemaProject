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

<div class="bg-white/10 rounded-xl shadow-md p-4 flex flex-col items-center text-white hover:scale-[1.02] transition w-full">
    <img src="/storage/posters/{{ $poster }}" alt="Poster" class="w-full h-56 object-cover rounded-md mb-4">

    <div class="w-full">
        <h2 class="text-lg font-semibold mb-1">{{ $tytul }}</h2>
        <p class="text-sm text-white/80 mb-1 line-clamp-2">{{ $opis }}</p>
        <p class="text-sm mb-1">⏱ {{ $czas_trwania }} min</p>
        <p class="text-sm mb-1">🎭 Kategoria: {{ $kategoria ?? 'Brak' }}</p>
        <p class="text-sm mb-2">
            🔥 Hot: {!! $is_hot ? '<span class="text-red-400">Tak</span>' : '<span class="text-gray-400">Nie</span>' !!}
        </p>
        <p class="text-sm mb-2">
            ✅ Aktywny: {!! $is_active ? '<span class="text-green-400">Tak</span>' : '<span class="text-red-400">Nie</span>' !!}
        </p>

        <div class="flex justify-between mt-3">
            <a href="{{ route('admin.filmy.editView', $id) }}" class="px-4 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded text-sm">Edytuj</a>
            <form action="{{ route('admin.filmy.destroy', $id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-sm">
                    Usuń
                </button>
            </form>
        </div>
    </div>
</div>
