<x-default>
    <div class="max-w-2xl mx-auto py-10 px-4 text-brown">
        <h1 class="text-2xl font-bold mb-6 text-center">Dodaj nowy film</h1>

        <form method="POST" action="{{ route('admin.filmy.store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="tytul" class="block text-sm font-medium text-brown">Tytuł</label>
                <input
                    type="text"
                    name="tytul"
                    id="tytul"
                    value="{{ old('tytul') }}"
                    class="
            w-full
            mt-1
            p-2
            rounded
            bg-brown/10
            border
            border-brown/20
            text-brown
            placeholder-brown/50
            focus:bg-white
            focus:border-primary
            transition-colors
          "
                    minlength="5"
                >
                @error('tytul')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="opis" class="block text-sm font-medium text-brown">Opis</label>
                <textarea
                    name="opis"
                    id="opis"
                    rows="3"
                    class="
            w-full
            mt-1
            p-2
            rounded
            bg-brown/10
            border
            border-brown/20
            text-brown
            placeholder-brown/50
            focus:bg-white
            focus:border-primary
            transition-colors
          "
                    minlength="10"
                >{{ old('opis') }}</textarea>
                @error('opis')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="czas_trwania" class="block text-sm font-medium text-brown">Czas trwania (minuty)</label>
                <input
                    type="number"
                    name="czas_trwania"
                    id="czas_trwania"
                    value="{{ old('czas_trwania') }}"
                    class="
            w-full
            mt-1
            p-2
            rounded
            bg-brown/10
            border
            border-brown/20
            text-brown
            placeholder-brown/50
            focus:bg-white
            focus:border-primary
            transition-colors
          "
                    min="1"
                >
                @error('czas_trwania')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="poster" class="block text-sm font-medium text-brown">Poster (nazwa pliku)</label>
                <input
                    type="text"
                    name="poster"
                    id="poster"
                    value="{{ old('poster') }}"
                    class="
            w-full
            mt-1
            p-2
            rounded
            bg-brown/10
            border
            border-brown/20
            text-brown
            placeholder-brown/50
            focus:bg-white
            focus:border-primary
            transition-colors
          "
                >
                @error('poster')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-6">
                <label class="flex items-center text-sm font-medium text-brown">
                    <input
                        type="checkbox"
                        name="is_hot"
                        id="is_hot"
                        value="1"
                        class="mr-2 text-primary focus:ring-primary"
                        {{ old('is_hot') ? 'checked' : '' }}
                    >
                    Gorący film
                </label>
                <label class="flex items-center text-sm font-medium text-brown">
                    <input
                        type="checkbox"
                        name="is_active"
                        id="is_active"
                        value="1"
                        class="mr-2 text-green focus:ring-green"
                        {{ old('is_active', true) ? 'checked' : '' }}
                    >
                    Aktywny
                </label>
            </div>

            <div>
                <label for="kategoria_id" class="block text-sm font-medium text-brown">Kategoria</label>
                <select
                    name="kategoria_id"
                    id="kategoria_id"
                    class="
            w-full
            mt-1
            p-2
            rounded
            bg-brown/10
            border
            border-brown/20
            text-brown
            placeholder-brown/50
            focus:bg-white
            focus:border-primary
            transition-colors
          "
                >
                    <option value="">-- Wybierz kategorię --</option>
                    @foreach($kategorie as $kat)
                        <option value="{{ $kat->id }}" {{ old('kategoria_id') == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nazwa }}
                        </option>
                    @endforeach
                </select>
                @error('kategoria_id')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tags" class="block text-sm font-medium text-brown">Tagi</label>
                <select
                    name="tags[]"
                    id="tags"
                    multiple
                    class="
            w-full
            mt-1
            p-2
            rounded
            bg-brown/10
            border
            border-brown/20
            text-brown
            placeholder-brown/50
            focus:bg-white
            focus:border-primary
            transition-colors
          "
                >
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                            {{ $tag->nazwa }}
                        </option>
                    @endforeach
                </select>
                @error('tags')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button
                    type="submit"
                    class="
            px-6
            py-2
            bg-primary
            hover:bg-accent
            text-white
            rounded
            shadow-md
            transition-colors
          "
                >
                    Dodaj film
                </button>
            </div>
        </form>
    </div>
</x-default>
