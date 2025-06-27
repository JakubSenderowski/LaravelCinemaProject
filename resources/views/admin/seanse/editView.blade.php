<x-default>
    <div class="max-w-3xl mx-auto py-10 px-4 text-brown">
        <h1 class="text-2xl font-bold mb-6 text-center">🎬 Edytuj Seans</h1>

        <form action="{{ route('admin.seanse.update', $seanse->id) }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="film_id" class="block mb-1 font-medium">🎥 Film:</label>
                <select
                    name="film_id"
                    id="film_id"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
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

            <div>
                <label for="sala_id" class="block mb-1 font-medium">🏛️ Sala:</label>
                <select
                    name="sala_id"
                    id="sala_id"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
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

            <div>
                <label for="data" class="block mb-1 font-medium">📅 Data:</label>
                <input
                    type="date"
                    name="data"
                    id="data"
                    value="{{ $seanse->data }}"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                @error('data')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="godzina" class="block mb-1 font-medium">⏰ Godzina:</label>
                <input
                    type="time"
                    name="godzina"
                    id="godzina"
                    value="{{ $seanse->godzina }}"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                @error('godzina')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="cena" class="block mb-1 font-medium">💸 Cena biletu (zł):</label>
                <input
                    type="number"
                    name="cena"
                    id="cena"
                    min="0"
                    value="{{ $seanse->cena }}"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                @error('cena')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="is_active" class="block mb-1 font-medium">📌 Status:</label>
                <select
                    name="is_active"
                    id="is_active"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                    <option value="1" {{ $seanse->is_active ? 'selected' : '' }}>Aktywna</option>
                </select>
                @error('is_active')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button
                    type="submit"
                    class="px-6 py-2 bg-primary hover:bg-accent text-white font-semibold rounded transition-colors"
                >
                    💾 Zapisz zmiany
                </button>
            </div>
        </form>
    </div>
</x-default>
