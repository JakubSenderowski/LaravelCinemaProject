<x-default>
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 space-y-4 md:space-y-0">
        <form action="{{ route('admin.sale.search') }}" method="GET" class="flex-1">
            <input
                name="q"
                type="text"
                value="{{ request('q') }}"
                placeholder="Szukaj sal po nazwie lub liczbie miejsc"
                class="w-full rounded-xl bg-brown/10 border border-brown/20 px-5 py-4 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
            />
        </form>

        <h1 class="text-2xl font-bold text-brown text-center w-full md:w-auto">Lista sal</h1>

        @if(session('success'))
            <div class="bg-green px-4 py-2 rounded text-white text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex gap-2">
            <a
                href="{{ route('admin.sale.create') }}"
                class="px-3 py-1.5 text-sm font-medium rounded-md bg-primary text-white hover:bg-accent transition-colors flex items-center justify-center gap-1"
            >
                ➕ Dodaj
            </a>
            <a
                href="{{ route('admin.sale.index') }}"
                class="px-3 py-1.5 text-sm font-medium rounded-md bg-primary text-white hover:bg-accent transition-colors flex items-center justify-center gap-1"
            >
                ➕ Powrót
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($sale as $sala)
            <x-all-sale-admin
                :nazwa="$sala->nazwa"
                :liczba_miejsc="$sala->liczba_miejsc"
                :is_active="$sala->is_active"
                :id="$sala->id"
            />
        @endforeach
    </div>
</x-default>
