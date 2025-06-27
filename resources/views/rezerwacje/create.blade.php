<x-default>
    <h1 class="text-xl font-bold mb-4">Zarezerwuj seans: {{ $seans->film->tytul }}</h1>

    <div class="mb-4 text-white">
        <p><strong>Data:</strong> {{ $seans->data }}</p>
        <p><strong>Godzina:</strong> {{ $seans->godzina }}</p>
        <p><strong>Sala:</strong> {{ $seans->sala->nazwa ?? 'Brak danych' }}</p>
        <p><strong>Cena:</strong> {{ $seans->cena }} zł / bilet</p>
    </div>

    <form action="{{ route('rezerwacja.store') }}" method="POST" class="space-y-4">
        @csrf

        <input type="hidden" name="seans_id" value="{{ $seans->id }}">

        {{-- Liczba miejsc --}}
        <label class="block">
            <span class="text-white">Liczba miejsc:</span>
            <input type="number" name="liczba_miejsc" min="1" max="20" class="w-full p-2 rounded text-black" required>
        </label>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Zarezerwuj
        </button>
    </form>
</x-default>
