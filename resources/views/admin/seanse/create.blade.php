<x-default>
    @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded text-center mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.seanse.store') }}" method="POST" class="bg-[#1e1e2f] p-6 rounded-xl shadow-md max-w-xl mx-auto text-white space-y-4">
        @csrf

        <h2 class="text-2xl font-semibold text-center text-indigo-300 mb-4">➕ Nowy Seans</h2>

        <div>
            <label for="film_id" class="block mb-1 font-medium">🎥 Film:</label>
            <select name="film_id" id="film_id" required class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600">
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
            <select name="sala_id" id="sala_id" required class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600">
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
            <input type="date" name="data" id="data" required class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600">
            @error('data')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="godzina" class="block mb-1 font-medium">🕐 Godzina:</label>
            <input type="time" name="godzina" id="godzina" required class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600">
            @error('godzina')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="cena" class="block mb-1 font-medium">💰 Cena biletu:</label>
            <input type="number" name="cena" id="cena" min="0" required class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600">
            @error('cena')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="is_active" class="block mb-1 font-medium">📌 Status:</label>
            <select name="is_active" id="is_active" required class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600">
                <option value="1" selected>Tak (aktywna)</option>
            </select>
            @error('is_active')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-center pt-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded text-white font-semibold transition">
                💾 Zapisz nowy seans
            </button>
        </div>
    </form>
</x-default>
