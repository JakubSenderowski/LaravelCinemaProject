<x-default>
    <form action="{{ route('admin.sale.store') }}" method="POST" class="bg-[#1e1e2f] p-6 rounded-xl shadow-md max-w-xl mx-auto text-white space-y-4">
        @csrf

        <h2 class="text-2xl font-semibold text-center text-indigo-300 mb-4">➕ Nowa Sala</h2>

        <div>
            <label for="nazwa" class="block mb-1 font-medium">🎟 Nazwa Sali:</label>
            <input type="text" name="nazwa" id="nazwa" value="{{ old('nazwa') }}" class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600" required>
            @error('nazwa')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="liczba_miejsc" class="block mb-1 font-medium">🎟 Liczba miejsc:</label>
            <input type="text" name="liczba_miejsc" id="liczba_miejsc" value="{{ old('liczba_miejsc') }}" class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600" required>
            @error('liczba_miejsc')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="is_active" class="block mb-1 font-medium">📌 Status:</label>
            <select name="is_active" id="is_active" class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600" required>
                <option value="1" selected>Tak (aktywna)</option>
            </select>
            @error('is_active')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-center pt-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded text-white font-semibold transition">
                💾 Zapisz salę
            </button>
        </div>
    </form>
</x-default>
