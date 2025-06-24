<x-default>


    <form action="{{ route('rezerwacja.update', $rezerwacja->id) }}" method="POST" class="max-w-md mx-auto bg-white/10 p-6 rounded-xl shadow-md text-white">
        @csrf

        <h2 class="text-xl font-semibold mb-4">Edytuj rezerwację</h2>

        <label for="film_id" class="block text-sm mb-1">Film:</label>
        <select name="film_id" id="film_id" class="w-full p-2 rounded text-black mb-4" required>
            @foreach($seanse->pluck('film')->unique('id') as $film)
                <option value="{{ $film->id }}" {{ $film->id == $rezerwacja->seans->film->id ? 'selected' : '' }}>
                    {{ $film->tytul }}
                </option>
            @endforeach
        </select>

        <label for="data" class="block text-sm mb-1">Data:</label>
        <input type="date" name="data" id="data" value="{{ $rezerwacja->seans->data }}" class="w-full p-2 rounded text-black mb-4" required>
        @error('data')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror

        <label for="godzina" class="block text-sm mb-1">Godzina:</label>
        <input type="time" name="godzina" id="godzina" value="{{ $rezerwacja->seans->godzina }}" class="w-full p-2 rounded text-black mb-4" required>

        <label for="liczba_miejsc" class="block text-sm mb-1">Liczba miejsc:</label>
        <input type="number" name="liczba_miejsc" id="liczba_miejsc" value="{{ $rezerwacja->liczba_miejsc }}" min="1" class="w-full p-2 rounded text-black mb-6" required>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded">
            Zapisz zmiany
        </button>
    </form>
</x-default>
