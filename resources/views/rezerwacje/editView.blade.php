<x-default>
    <form action="{{ route('rezerwacja.update', $rezerwacja->id) }}" method="POST" class="max-w-md mx-auto bg-white/10 p-6 rounded-xl shadow-md text-white">
        @csrf

        <h2 class="text-xl font-semibold mb-4">Edytuj rezerwację</h2>

        <label for="seans_id" class="block text-sm mb-1">Wybierz seans:</label>
        <select name="seans_id" id="seans_id" class="w-full p-2 rounded text-black mb-4" required>
            @foreach($seanse as $seans)
                <option value="{{ $seans->id }}" @selected($seans->id == $rezerwacja->seans_id)>
                    {{ $seans->film->tytul }} – {{ $seans->data }} {{ $seans->godzina }}
                </option>
            @endforeach
        </select>

        <label for="liczba_miejsc" class="block text-sm mb-1">Liczba miejsc:</label>
        <input type="number" name="liczba_miejsc" id="liczba_miejsc" value="{{ $rezerwacja->liczba_miejsc }}" min="1" class="w-full p-2 rounded text-black mb-6" required>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded">
            Zapisz zmiany
        </button>
    </form>
</x-default>
