<x-default>
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 space-y-4 md:space-y-0">
        <form action="{{ route('admin.tags.search') }}" method="GET" class="flex-1">
            <input
                name="q"
                type="text"
                value="{{ request('q') }}"
                placeholder="Szukaj tagi po nazwie"
                class="w-full rounded-xl bg-brown/10 border border-brown/20 px-5 py-4 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
            />
        </form>

        <h1 class="text-2xl font-bold text-brown text-center w-full md:w-auto">Wszystkie Tagi</h1>

        @if(session('success'))
            <div class="bg-green px-4 py-2 rounded text-white text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex gap-2">
            <a
                href="{{ route('admin.tags.create') }}"
                class="px-3 py-1.5 text-sm font-medium rounded-md bg-primary text-white hover:bg-accent transition-colors flex items-center justify-center gap-1"
            >
                ➕ Dodaj
            </a>
            <a
                href="{{ route('admin.tags.index') }}"
                class="px-3 py-1.5 text-sm font-medium rounded-md bg-primary text-white hover:bg-accent transition-colors flex items-center justify-center gap-1"
            >
                ➕ Powrót
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($tags as $tag)
            <x-all-tags-admin
                :id="$tag->id"
                :nazwa="$tag->nazwa"
                :is_active="$tag->is_active"
            />
        @endforeach
    </div>
</x-default>
