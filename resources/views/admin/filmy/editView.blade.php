<x-default>
    <div class="max-w-3xl mx-auto py-10 px-4 text-brown">
        <h1 class="text-2xl font-bold mb-6 text-center">Edytuj film</h1>

        <form action="{{ route('admin.filmy.update', $film->id) }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium">Tytuł</label>
                <input
                    type="text"
                    name="tytul"
                    value="{{ old('tytul', $film->tytul) }}"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                @error('tytul')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Opis</label>
                <textarea
                    name="opis"
                    rows="3"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >{{ old('opis', $film->opis) }}</textarea>
                @error('opis')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Czas trwania (min)</label>
                <input
                    type="number"
                    name="czas_trwania"
                    value="{{ old('czas_trwania', $film->czas_trwania) }}"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                    min="1"
                >
                @error('czas_trwania')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Nazwa pliku plakatu</label>
                <input
                    type="text"
                    name="poster"
                    value="{{ old('poster', $film->poster) }}"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                @error('poster')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Kategoria</label>
                <select
                    name="kategoria_id"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
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
                <select
                    name="tags[]"
                    id="tags"
                    multiple
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $film->tags->contains('id', $tag->id) ? 'selected' : '' }}>
                            {{ $tag->nazwa }}
                        </option>
                    @endforeach
                </select>
                @error('tags')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Hot?</label>
                <select
                    name="is_hot"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                    <option value="1" {{ $film->is_hot ? 'selected' : '' }}>Tak</option>
                    <option value="0" {{ !$film->is_hot ? 'selected' : '' }}>Nie</option>
                </select>
                @error('is_hot')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Aktywny?</label>
                <select
                    name="is_active"
                    required
                    class="w-full p-2 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                    <option value="1" {{ $film->is_active ? 'selected' : '' }}>Tak</option>
                    <option value="0" {{ !$film->is_active ? 'selected' : '' }}>Nie</option>
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
                    Zapisz zmiany
                </button>
            </div>
        </form>
    </div>
</x-default>
