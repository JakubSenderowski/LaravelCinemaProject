<x-default>
    <div class="flex justify-between items-center mb-8">
        <form action="{{ route('admin.kategorie.search') }}" method="GET" class="mb-6">
            <input
                name="q"
                type="text"
                value="{{ request('q') }}"
                placeholder="Szukaj kategorii po nazwie"
                class="rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full"
            />
        </form>
        @if(session('success'))
            <div class="bg-green text-white px-4 py-2 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="text-2xl font-bold text-white text-center w-full">Lista Kategorii</h1>
        <a href="{{ route('admin.kategorie.create') }}" class=" text-white px-3 py-1.5 rounded-md text-sm font-medium flex items-center justify-center gap-1">
            ➕ Dodaj
        </a>
        <a href="{{ route('admin.kategorie.index') }}" class=" text-white px-3 py-1.5 rounded-md text-sm font-medium flex items-center justify-center gap-1">
            ➕ Powrót
        </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($kategorie as $kategoria)
            <x-all-categories-admin
                :nazwa="$kategoria->nazwa"
                :is_active="$kategoria->is_active"
                :id="$kategoria->id"
            />
        @endforeach
    </div>
</x-default>
