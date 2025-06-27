<x-default>
    <form
        action="{{ route('rezerwacja.update', $rezerwacja->id) }}"
        method="POST"
        class="max-w-md mx-auto bg-white rounded-xl shadow-md p-6 text-brown space-y-6"
    >
        @csrf

        <h2 class="text-xl font-semibold">Edytuj rezerwację</h2>

        <div class="space-y-1">
            <label for="seans_id" class="block text-sm font-medium">Wybierz seans:</label>
            <select
                name="seans_id"
                id="seans_id"
                required
                class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
            >
                @foreach($seanse as $seans)
                    <option value="{{ $seans->id }}" @selected($seans->id == $rezerwacja->seans_id)>
                        {{ $seans->film->tytul }} – {{ $seans->data }} {{ $seans->godzina }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="space-y-1">
            <label for="liczba_miejsc" class="block text-sm font-medium">Liczba miejsc:</label>
            <input
                type="number"
                name="liczba_miejsc"
                id="liczba_miejsc"
                value="{{ $rezerwacja->liczba_miejsc }}"
                min="1"
                required
                class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
            >
        </div>

        <button
            type="submit"
            class="w-full px-4 py-2 bg-primary hover:bg-accent text-white font-semibold rounded transition-colors"
        >
            Zapisz zmiany
        </button>
    </form>
</x-default>
