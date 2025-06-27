<x-default>
    <h1 class="text-xl font-bold mb-4 text-primary">Zarezerwuj seans: {{ $seans->film->tytul }}</h1>

    <div class="mb-4 text-brown">
        <p><strong>Data:</strong> {{ $seans->data }}</p>
        <p><strong>Godzina:</strong> {{ $seans->godzina }}</p>
        <p><strong>Sala:</strong> {{ $seans->sala->nazwa ?? 'Brak danych' }}</p>
        <p><strong>Cena:</strong> {{ $seans->cena }} zł / bilet</p>
    </div>

    <form action="{{ route('rezerwacja.store') }}" method="POST" class="space-y-4">
        @csrf

        <input type="hidden" name="seans_id" value="{{ $seans->id }}">

        <label class="block">
            <span class="text-brown">Liczba miejsc:</span>
            <input
                type="number"
                name="liczba_miejsc"
                min="1"
                max="20"
                required
                class="w-full p-2 mt-1 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
            >
        </label>

        <button
            type="submit"
            class="px-4 py-2 bg-primary hover:bg-accent text-white rounded transition-colors"
        >
            Zarezerwuj
        </button>
    </form>
</x-default>
