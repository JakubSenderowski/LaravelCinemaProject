<x-default>
    <div class="max-w-3xl mx-auto py-10 px-4 text-brown">
        <h1 class="text-2xl font-bold mb-6 text-center">Edytuj rezerwację</h1>

        <form action="{{ route('admin.rezerwacje.update', $rezerwacje->id) }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium">Użytkownik</label>
                <select
                    name="user_id"
                    required
                    class="w-full p-2 mt-1 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $rezerwacje->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Seans</label>
                <select
                    name="seans_id"
                    required
                    class="w-full p-2 mt-1 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                    @foreach($seanse as $seans)
                        <option value="{{ $seans->id }}" {{ $rezerwacje->seans_id == $seans->id ? 'selected' : '' }}>
                            {{ $seans->film->tytul }} – {{ $seans->data }} {{ $seans->godzina }}
                        </option>
                    @endforeach
                </select>
                @error('seans_id')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Liczba miejsc</label>
                <input
                    type="number"
                    name="liczba_miejsc"
                    value="{{ old('liczba_miejsc', $rezerwacje->liczba_miejsc) }}"
                    min="1"
                    required
                    class="w-full p-2 mt-1 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                @error('liczba_miejsc')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium">Status</label>
                <select
                    name="is_active"
                    required
                    class="w-full p-2 mt-1 rounded bg-brown/10 border border-brown/20 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
                >
                    <option value="1" {{ $rezerwacje->is_active ? 'selected' : '' }}>Aktywna</option>
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
