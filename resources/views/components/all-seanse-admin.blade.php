@props([
    'tytul',
    'nazwa',
    'data',
    'godzina'
])
<div class="bg-[#1f2937] rounded-2xl p-5 shadow-md border border-gray-700 text-white flex flex-col justify-between w-full max-w-[320px] mx-auto">
    <div>
        <h2 class="text-lg font-semibold text-indigo-300 mb-3">🎬 Tytuł filmu: <span class="text-white">{{ $tytul }}</span></h2>

        <ul class="text-sm space-y-1">
            <li>🎬 <strong>Rodzaj/Numer Sali:</strong> {{ $nazwa }}</li>
            <li>📅 <strong>Data seansu:</strong> {{ $data }}</li>
            <li>⏱ <strong>Godzina Seansu:</strong> {{ $godzina }} min</li>
        </ul>
    </div>
</div>
