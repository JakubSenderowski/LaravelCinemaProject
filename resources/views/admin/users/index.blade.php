<x-default>
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 space-y-4 md:space-y-0">
        <form action="{{ route('admin.users.search') }}" method="GET" class="flex-1">
            <input
                name="q"
                type="text"
                value="{{ request('q') }}"
                placeholder="Szukaj użytkowników po imieniu lub email…"
                class="w-full rounded-xl bg-gray-100 border border-gray-300 px-5 py-4 text-gray-700 placeholder-gray-500 focus:bg-white focus:border-blue-500 transition-colors"
            />
        </form>

        <h1 class="text-2xl font-bold text-gray-800 text-center w-full md:w-auto">Wszyscy Użytkownicy</h1>

        @if(session('success'))
            <div class="bg-green-600 px-4 py-2 rounded text-white text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex gap-2">
            <a
                href="{{ route('admin.users.index') }}"
                class="px-3 py-1.5 text-sm font-medium rounded-md bg-blue-600 text-white hover:bg-blue-700 transition-colors flex items-center justify-center gap-1"
            >
                🔙 Powrót
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($users as $user)
            <x-all-users-admin
                :id="$user->id"
                :name="$user->name"
                :email="$user->email"
                :is_active="$user->is_active"
                :is_admin="$user->is_admin"
            />
        @endforeach
    </div>
</x-default>
