<x-default>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-white mb-6 text-center">🎬 Edytuj Seans</h1>

        <form action="{{ route('admin.seanse.update', $seanse->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="film_id" class="text-white block mb-1 font-medium">🎥 Film:</label>
                <select name="film_id" id="film_id" class="w-full p-2 rounded bg-white/10 text-white" required>
                    @foreach($filmy as $film)
                        <option value="{{ $film->id }}" {{ $seanse->film_id == $film->id ? 'selected' : '' }}>
                            {{ $film->tytul }}
                        </option>
                    @endforeach
                </select>
                @error('film_id')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="sala_id" class="text-white block mb-1 font-medium">🏛️ Sala:</label>
                <select name="sala_id" id="sala_id" class="w-full p-2 rounded bg-white/10 text-white" required>
                    @foreach($sale as $sala)
                        <option value="{{ $sala->id }}" {{ $seanse->sala_id == $sala->id ? 'selected' : '' }}>
                            {{ $sala->nazwa }}
                        </option>
                    @endforeach
                </select>
                @error('sala_id')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="data" class="text-white block mb-1 font-medium">📅 Data:</label>
                <input type="date" name="data" id="data" value="{{ $seanse->data }}" class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600" required>
                @error('data')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="godzina" class="text-white block mb-1 font-medium">⏰ Godzina:</label>
                <input type="time" name="godzina" id="godzina" value="{{ $seanse->godzina }}" class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600" required>
                @error('godzina')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="cena" class="text-white block mb-1 font-medium">💸 Cena biletu (zł):</label>
                <input type="number" name="cena" id="cena" min="0" value="{{ $seanse->cena }}" class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600" required>
                @error('cena')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="is_active" class="text-white block mb-1 font-medium">📌 Status:</label>
                <select name="is_active" id="is_active" class="w-full p-2 rounded bg-white/10 text-white" required>
                    <option value="1" {{ $seanse->is_active ? 'selected' : '' }}>Aktywna</option>
                </select>
                @error('is_active')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded transition">
                    💾 Zapisz zmiany
                </button>
            </div>
        </form>
    </div>
</x-default>
