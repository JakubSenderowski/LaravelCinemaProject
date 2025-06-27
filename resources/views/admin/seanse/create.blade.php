<x-default>
    <div class="max-w-xl mx-auto py-10 px-4 text-brown">
        @if(session('success'))
            <div class="bg-green px-4 py-2 rounded text-white text-center mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form
            action="{{ route('admin.seanse.store') }}"
            method="POST"
            class="bg-white rounded-xl shadow-md p-6 space-y-4"
        >
            @csrf

            <h2 class="text-2xl font-semibold text-center text-primary">➕ Nowy Seans</h2>

            <div>
                <label for="film_id" class="block mb-1 font-medium">🎥 Film:</label>
                <select
                    name="film_id"
                    id="film_id"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                    @foreach($filmy as $film)
                        <option value="{{ $film->id }}">{{ $film->tytul }}</option>
                    @endforeach
                </select>
                @error('film_id')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="sala_id" class="block mb-1 font-medium">🏛 Sala:</label>
                <select
                    name="sala_id"
                    id="sala_id"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                    @foreach($sale as $sala)
                        <option value="{{ $sala->id }}">{{ $sala->nazwa }}</option>
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
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                @error('data')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="godzina" class="block mb-1 font-medium">🕐 Godzina:</label>
                <input
                    type="time"
                    name="godzina"
                    id="godzina"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                @error('godzina')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="cena" class="block mb-1 font-medium">💰 Cena biletu:</label>
                <input
                    type="number"
                    name="cena"
                    id="cena"
                    min="0"
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
                    <option value="1" selected>Tak (aktywna)</option>
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
                    💾 Zapisz nowy seans
                </button>
            </div>
        </form>
    </div>
</x-default>
