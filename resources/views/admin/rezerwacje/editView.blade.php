<x-default>
    <div class="max-w-3xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-white mb-6 text-center">Edytuj rezerwację</h1>

        <form action="{{ route('admin.rezerwacje.update', $rezerwacje->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="text-white block mb-1">Użytkownik</label>
                <select name="user_id" class="w-full p-2 rounded bg-white/10 text-white" required>
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

            <div class="mb-4">
                <label class="text-white block mb-1">Seans</label>
                <select name="seans_id" class="w-full p-2 rounded bg-white/10 text-white" required>
                    @foreach($seanse as $seans)
                        <option value="{{ $seans->id }}" {{ $rezerwacje->seans_id == $seans->id ? 'selected' : '' }}>
                            {{ $seans->film->tytul }} - {{ $seans->data }} {{ $seans->godzina }}
                        </option>
                    @endforeach
                </select>
                @error('seans_id')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-white block mb-1">Liczba miejsc</label>
                <input type="number" name="liczba_miejsc" value="{{ old('liczba_miejsc', $rezerwacje->liczba_miejsc) }}"
                       class="w-full p-2 rounded bg-white/10 text-white" min="1" required>
                @error('liczba_miejsc')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="text-white block mb-1">Status</label>
                <select name="is_active" class="w-full p-2 rounded bg-white/10 text-white" required>
                    <option value="1" {{ $rezerwacje->is_active ? 'selected' : '' }}>Aktywna</option>
                </select>
                @error('is_active')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded mt-4">
                Zapisz zmiany
            </button>
        </form>
    </div>
</x-default>
