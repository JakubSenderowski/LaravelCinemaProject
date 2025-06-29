{{-- resources/views/admin/users/editView.blade.php --}}
<x-default>
    <div class="max-w-2xl mx-auto py-10 px-4 text-gray-800">
        <h1 class="text-2xl font-bold mb-6 text-center">👤 Edytuj Użytkownika</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block mb-1 font-medium">📝 Imię i nazwisko:</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $user->name) }}"
                    required
                    class="w-full p-2 rounded bg-gray-100 border border-gray-300 text-gray-800 focus:bg-white focus:border-blue-500 transition-colors"
                >
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block mb-1 font-medium">📧 E-mail:</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $user->email) }}"
                    required
                    class="w-full p-2 rounded bg-gray-100 border border-gray-300 text-gray-800 focus:bg-white focus:border-blue-500 transition-colors"
                >
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block mb-1 font-medium">🔑 Nowe hasło (opcjonalnie):</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="w-full p-2 rounded bg-gray-100 border border-gray-300 text-gray-800 focus:bg-white focus:border-blue-500 transition-colors"
                >
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div>
                <label for="is_active" class="block mb-1 font-medium">📌 Status:</label>
                <select
                    name="is_active"
                    id="is_active"
                    required
                    class="w-full p-2 rounded bg-gray-100 border border-gray-300 text-gray-800 focus:bg-white focus:border-blue-500 transition-colors"
                >
                    <option value="1" {{ $user->is_active ? 'selected' : '' }}>✅ Aktywny</option>
                </select>
                @error('is_active')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="is_admin">👑 Administrator:</label>
                <select name="is_admin" id="is_admin" required>
                    <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Tak</option>
                    <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Nie</option>
                </select>
            </div>

            <div class="text-center">
                <button
                    type="submit"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded transition-colors"
                >
                    💾 Zapisz zmiany
                </button>
            </div>
        </form>
    </div>
</x-default>
