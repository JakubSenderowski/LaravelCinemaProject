<x-default>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-white mb-6 text-center">Edytuj Salę</h1>

        <form action="{{ route('admin.sale.update', $sale->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="text-white block mb-1">Nazwa sali</label>
                <input type="text" name="nazwa" value="{{ old('nazwa', $sale->nazwa) }}"
                       class="w-full p-2 rounded bg-white/10 text-white" required>
            </div>

            <div class="mb-4">
                <label class="text-white block mb-1">Liczba miejsc</label>
                <input type="number" name="liczba_miejsc" min="1" value="{{ old('liczba_miejsc', $sale->liczba_miejsc) }}"
                       class="w-full p-2 rounded bg-white/10 text-white" required>
            </div>

            <div class="mb-4">
                <label class="text-white block mb-1">Status</label>
                <select name="is_active" class="w-full p-2 rounded bg-white/10 text-white" required>
                    <option value="1" {{ $sale->is_active ? 'selected' : '' }}>Aktywna</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded mt-4">
                💾 Zapisz zmiany
            </button>
        </form>
    </div>
</x-default>
