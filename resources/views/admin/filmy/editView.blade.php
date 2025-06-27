<x-default>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-white mb-6 text-center">Edytuj film</h1>

        <form action="{{ route('admin.filmy.update', $film->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="text-white block mb-1">Tytuł</label>
                <input type="text" name="tytul" value="{{ old('tytul', $film->tytul) }}"
                       class="w-full p-2 rounded bg-white/10 text-white" required>
                @error('tytul')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-white block mb-1">Opis</label>
                <textarea name="opis" class="w-full p-2 rounded bg-white/10 text-white" required>{{ old('opis', $film->opis) }}</textarea>
                @error('opis')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-white block mb-1">Czas trwania (min)</label>
                <input type="number" name="czas_trwania" value="{{ old('czas_trwania', $film->czas_trwania) }}"
                       class="w-full p-2 rounded bg-white/10 text-white" required>
                @error('czas_trwania')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-white block mb-1">Nazwa pliku plakatu (poster)</label>
                <input type="text" name="poster" value="{{ old('poster', $film->poster) }}"
                       class="w-full p-2 rounded bg-white/10 text-white" required>
                @error('poster')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-white block mb-1">Kategoria</label>
                <select name="kategoria_id" class="w-full p-2 rounded bg-white/10 text-white" required>
                    @foreach($kategoria as $kat)
                        <option value="{{ $kat->id }}" {{ $film->kategoria_id == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nazwa }}
                        </option>
                    @endforeach
                </select>
                @error('kategoria_id')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="tags" class="block text-sm font-medium">Tagi</label>
                <select name="tags[]" id="tags" multiple
                        class="w-full mt-1 p-2 rounded bg-white/10 border border-white/20 text-white">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ $film->tags->contains('id', $tag->id) ? 'selected' : '' }}>
                            {{ $tag->nazwa }}
                        </option>
                    @endforeach
                </select>
                @error('tags')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-white block mb-1">Hot?</label>
                <select name="is_hot" class="w-full p-2 rounded bg-white/10 text-white" required>
                    <option value="1" {{ $film->is_hot ? 'selected' : '' }}>Tak</option>
                    <option value="0" {{ !$film->is_hot ? 'selected' : '' }}>Nie</option>
                </select>
                @error('is_hot')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-white block mb-1">Aktywny?</label>
                <select name="is_active" class="w-full p-2 rounded bg-white/10 text-white" required>
                    <option value="1" {{ $film->is_active ? 'selected' : '' }}>Tak</option>
                </select>
                @error('is_active')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded mt-4">
                Zapisz zmiany
            </button>
        </form>
    </div>
</x-default>
