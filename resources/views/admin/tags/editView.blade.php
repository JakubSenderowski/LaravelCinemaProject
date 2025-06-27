<x-default>
    <div class="max-w-2xl mx-auto py-10 px-4 text-brown">
        <h1 class="text-2xl font-bold mb-6 text-center">🏷️ Edytuj Tag</h1>

        <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="nazwa" class="block mb-1 font-medium">📝 Nazwa tagu:</label>
                <input
                    type="text"
                    name="nazwa"
                    id="nazwa"
                    value="{{ old('nazwa', $tag->nazwa) }}"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                @error('nazwa')
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
                    <option value="1" {{ $tag->is_active ? 'selected' : '' }}>✅ Aktywny</option>
                    <option value="0" {{ !$tag->is_active ? 'selected' : '' }}>❌ Nieaktywny</option>
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
