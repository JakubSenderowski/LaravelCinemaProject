<x-default>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-white mb-6 text-center">Edytuj Kategorię</h1>

        <form action="{{ route('admin.kategorie.update', $kategorie->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="text-white block mb-1">Nazwa kategorii</label>
                <input type="text" name="nazwa" value="{{ old('nazwa', $kategorie->nazwa) }}"
                       class="w-full p-2 rounded bg-white/10 text-white" required>
                @error('nazwa')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-white block mb-1">Status</label>
                <select name="is_active" class="w-full p-2 rounded bg-white/10 text-white" required>
                    <option value="1" {{ $kategorie->is_active ? 'selected' : '' }}>Aktywna</option>
                </select>
                @error('is_active')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded mt-4">
                💾 Zapisz zmiany
            </button>
        </form>
    </div>
</x-default>
