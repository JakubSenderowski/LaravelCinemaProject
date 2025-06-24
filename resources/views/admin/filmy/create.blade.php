<x-default>
    <div class="max-w-2xl mx-auto py-10 px-4 text-white">
        <h1 class="text-2xl font-bold mb-6 text-center">Dodaj nowy film</h1>

        <form method="POST" action="{{ route('admin.filmy.store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="tytul" class="block text-sm font-medium">Tytuł</label>
                <input type="text" name="tytul" id="tytul" value="{{ old('tytul') }}"
                       class="w-full mt-1 p-2 rounded bg-white/10 border border-white/20 text-white"
                       required minlength="5">
            </div>

            <div>
                <label for="opis" class="block text-sm font-medium">Opis</label>
                <textarea name="opis" id="opis" rows="3"
                          class="w-full mt-1 p-2 rounded bg-white/10 border border-white/20 text-white"
                          required minlength="10">{{ old('opis') }}</textarea>
            </div>

            <div>
                <label for="czas_trwania" class="block text-sm font-medium">Czas trwania (minuty)</label>
                <input type="number" name="czas_trwania" id="czas_trwania" value="{{ old('czas_trwania') }}"
                       class="w-full mt-1 p-2 rounded bg-white/10 border border-white/20 text-white"
                       required min="1">
            </div>

            <div>
                <label for="poster" class="block text-sm font-medium">Poster (nazwa pliku)</label>
                <input type="text" name="poster" id="poster" value="{{ old('poster') }}"
                       class="w-full mt-1 p-2 rounded bg-white/10 border border-white/20 text-white"
                       required>
            </div>

            <div class="flex gap-4">
                <div class="flex items-center">
                    <input type="checkbox" name="is_hot" id="is_hot" value="1"
                           class="mr-2" {{ old('is_hot') ? 'checked' : '' }}>
                    <label for="is_hot" class="text-sm font-medium">Gorący film</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                           class="mr-2" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label for="is_active" class="text-sm font-medium">Aktywny</label>
                </div>
            </div>

            <div>
                <label for="kategoria_id" class="block text-sm font-medium">Kategoria</label>
                <select name="kategoria_id" id="kategoria_id"
                        class="w-full mt-1 p-2 rounded bg-white/10 border border-white/20 text-white"
                        required>
                    <option value="">-- Wybierz kategorię --</option>
                    @foreach($kategorie as $kat)
                        <option value="{{ $kat->id }}" {{ old('kategoria_id') == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nazwa }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit"
                        class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded shadow">
                    Dodaj film
                </button>
            </div>
        </form>
    </div>
</x-default>
