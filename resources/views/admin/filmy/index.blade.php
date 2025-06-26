<x-default>
    <div class="max-w-7xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-white text-center w-full">Lista filmów</h1>
            <a href="{{ route('admin.filmy.create') }}" class="ml-auto px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded">
                ➕ Dodaj Film
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green text-white px-4 py-2 rounded mb-4 text-center">
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
