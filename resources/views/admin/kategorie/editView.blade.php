<x-default>
    <div class="max-w-3xl mx-auto py-10 px-4 text-brown">
        <h1 class="text-2xl font-bold mb-6 text-center">Edytuj kategorię</h1>

        <form action="{{ route('admin.kategorie.update', $kategorie->id) }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium">Nazwa kategorii</label>
                <input
                    type="text"
                    name="nazwa"
                    value="{{ old('nazwa', $kategorie->nazwa) }}"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                @error('nazwa')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Status</label>
                <select
                    name="is_active"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                    <option value="1" {{ $kategorie->is_active ? 'selected' : '' }}>Aktywna</option>
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
