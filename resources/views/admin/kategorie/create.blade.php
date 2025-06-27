<x-default>
    <form
        action="{{ route('admin.kategorie.store') }}"
        method="POST"
        class="bg-white rounded-xl shadow-md max-w-xl mx-auto p-6 text-brown space-y-4"
    >
        @csrf

        <h2 class="text-2xl font-semibold text-center text-primary mb-4">➕ Nowa Kategoria</h2>

        <div>
            <label for="nazwa" class="block mb-1 font-medium">🎟 Nazwa kategorii:</label>
            <input
                type="text"
                name="nazwa"
                id="nazwa"
                required
                class="w-full p-2 rounded bg-brown/10 border border-brown/20 placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                value="{{ old('nazwa') }}"
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
                <option value="1" selected>Tak (aktywna)</option>
            </select>
            @error('is_active')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="text-center pt-4">
            <button
                type="submit"
                class="px-6 py-2 bg-primary hover:bg-accent text-white font-semibold rounded transition-colors"
            >
                💾 Zapisz kategorię
            </button>
        </div>
    </form>
</x-default>
