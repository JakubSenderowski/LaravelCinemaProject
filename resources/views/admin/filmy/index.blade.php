<x-default>
    <div class="max-w-7xl mx-auto py-10 px-4 text-brown">
        <form action="{{ route('admin.filmy.search') }}" method="GET" class="mb-6">
            <input
                name="q"
                type="text"
                value="{{ request('q') }}"
                placeholder="Szukaj filmów…"
                class="w-full rounded-xl bg-brown/10 border border-brown/20 px-5 py-4 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
            />
        </form>

        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-brown text-center w-full">Lista filmów</h1>
            <a
                href="{{ route('admin.filmy.create') }}"
                class="ml-auto px-4 py-2 bg-green text-white rounded hover:bg-green/80 transition-colors"
            >
                ➕ Dodaj Film
            </a>
            <a
                href="{{ route('admin.filmy.index') }}"
                class="px-3 py-1.5 text-sm font-medium rounded-md bg-primary text-white hover:bg-accent transition-colors flex items-center justify-center gap-1"
            >
                ➕ Powrót
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green px-4 py-2 rounded mb-4 text-white text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($filmy as $film)
                <x-all-movies-admin
                    :id="$film->id"
                    :tytul="$film->tytul"
                    :opis="$film->opis"
                    :czas_trwania="$film->czas_trwania"
                    :poster="$film->poster"
                    :kategoria="$film->kategoria->nazwa ?? null"
                    :is_hot="$film->is_hot"
                    :is_active="$film->is_active"
                />
            @endforeach
        </div>
    </div>
</x-default>
