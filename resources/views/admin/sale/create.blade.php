<x-default>
    <div class="max-w-xl mx-auto py-10 px-4 text-brown">
        <form
            action="{{ route('admin.sale.store') }}"
            method="POST"
            class="bg-white rounded-xl shadow-md p-6 space-y-4"
        >
            @csrf

            <h2 class="text-2xl font-semibold text-center text-primary">➕ Nowa Sala</h2>

            <div>
                <label for="nazwa" class="block mb-1 font-medium">🎟 Nazwa Sali:</label>
                <input
                    type="text"
                    name="nazwa"
                    id="nazwa"
                    value="{{ old('nazwa') }}"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                @error('nazwa')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="liczba_miejsc" class="block mb-1 font-medium">🎟 Liczba miejsc:</label>
                <input
                    type="text"
                    name="liczba_miejsc"
                    id="liczba_miejsc"
                    value="{{ old('liczba_miejsc') }}"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                @error('liczba_miejsc')
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
                    💾 Zapisz salę
                </button>
            </div>
        </form>
    </div>
</x-default>
