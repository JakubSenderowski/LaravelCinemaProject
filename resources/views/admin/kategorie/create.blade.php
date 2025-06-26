<x-default>
    <form action="{{ route('admin.kategorie.store') }}" method="POST" class="bg-[#1e1e2f] p-6 rounded-xl shadow-md max-w-xl mx-auto text-white space-y-4">
        @csrf

        <h2 class="text-2xl font-semibold text-center text-indigo-300 mb-4">➕ Nowa Kategoria</h2>

        <div>
            <label for="nazwa" class="block mb-1 font-medium">🎟 Nazwa Kategorii:</label>
            <input type="text" name="nazwa" id="nazwa" min="1" required class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600">
        </div>
        <div>
            <label for="is_active" class="block mb-1 font-medium">📌 Status:</label>
            <select name="is_active" id="is_active" required class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600">
                <option value="1" selected>Tak (aktywna)</option>
            </select>
        </div>

        <div class="text-center pt-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded text-white font-semibold transition">
                💾 Zapisz rezerwację
            </button>
        </div>
    </form>


</x-default>
