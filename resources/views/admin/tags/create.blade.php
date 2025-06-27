<x-default>
    @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded text-center mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.tags.store') }}" method="POST" class="bg-[#1e1e2f] p-6 rounded-xl shadow-md max-w-xl mx-auto text-white space-y-4">
        @csrf

        <h2 class="text-2xl font-semibold text-center text-indigo-300 mb-4">🏷️ Dodaj nowy tag</h2>

        <div>
            <label for="nazwa" class="block mb-1 font-medium">📝 Nazwa tagu:</label>
            <input type="text" name="nazwa" id="nazwa" required class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600">
            @error('nazwa')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="is_active" class="block mb-1 font-medium">📌 Status:</label>
            <select name="is_active" id="is_active" required class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600">
                <option value="1" selected>✅ Aktywny</option>
            </select>
            @error('is_active')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-center pt-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 rounded text-white font-semibold transition">
                💾 Zapisz tag
            </button>
        </div>
    </form>
</x-default>
