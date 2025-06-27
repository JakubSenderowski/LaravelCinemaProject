<x-default>
    <div class="max-w-2xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-white mb-6 text-center">🏷️ Edytuj Tag</h1>

        <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nazwa" class="text-white block mb-1 font-medium">📝 Nazwa tagu:</label>
                <input type="text" name="nazwa" id="nazwa" value="{{ old('nazwa', $tag->nazwa) }}"
                       class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600" required>
                @error('nazwa')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="is_active" class="text-white block mb-1 font-medium">📌 Status:</label>
                <select name="is_active" id="is_active"
                        class="w-full p-2 rounded bg-white/10 text-white border border-gray-600" required>
                    <option value="1" {{ $tag->is_active ? 'selected' : '' }}>✅ Aktywny</option>
                </select>
                @error('is_active')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded transition">
                    💾 Zapisz zmiany
                </button>
            </div>
        </form>
    </div>
</x-default>
