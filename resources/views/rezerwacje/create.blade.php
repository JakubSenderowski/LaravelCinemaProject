<x-default>
    <h1 class="text-xl font-bold mb-4">Zarezerwuj seans dla filmu: {{ $rezerwacja->seans->film->tytul }}</h1>

    <form action="{{ route('rezerwacja.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Ukryte dane z filmu i seansu --}}
        <input type="hidden" name="film_id" value="{{ $rezerwacja->seans->film->id }}">
        <input type="hidden" name="seans_id" value="{{ $rezerwacja->seans->id }}">

        {{-- Wybór sali --}}
        <label class="block">
            <span class="text-white">Wybierz salę:</span>
            <select name="sala_id" class="w-full p-2 rounded text-black">
                @foreach(\App\Models\Sala::all() as $sala)
                    <option value="{{ $sala->id }}">{{ $sala->nazwa }}</option>
                @endforeach
            </select>
        </label>

        {{-- Data --}}
        <label class="block">
            <span class="text-white">Data seansu:</span>
            <input type="date" name="data" class="w-full p-2 rounded text-black" required>
        </label>

        {{-- Godzina --}}
        <label class="block">
            <span class="text-white">Godzina seansu:</span>
            <input type="time" name="godzina" class="w-full p-2 rounded text-black" required>
        </label>

        {{-- Liczba miejsc --}}
        <label class="block">
            <span class="text-white">Liczba miejsc:</span>
            <input type="number" name="liczba_miejsc" min="1" class="w-full p-2 rounded text-black" required>
        </label>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Zarezerwuj
        </button>
    </form>
</x-default>
