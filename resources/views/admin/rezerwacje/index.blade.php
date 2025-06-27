<x-default>
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8 space-y-4 md:space-y-0">
        <form action="{{ route('admin.rezerwacje.search') }}" method="GET" class="flex-1">
            <input
                name="q"
                type="text"
                value="{{ request('q') }}"
                placeholder="Szukaj rezerwacji – po imieniu użytkownika"
                class="w-full rounded-xl bg-brown/10 border border-brown/20 px-5 py-4 text-brown placeholder-brown/50 focus:bg-white focus:border-primary transition-colors"
            />
        </form>

        <h1 class="text-2xl font-bold text-brown text-center w-full md:w-auto">Lista rezerwacji</h1>

        @if(session('success'))
            <div class="bg-green px-4 py-2 rounded text-white text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex gap-2">
            <a
                href="{{ route('admin.rezerwacje.create') }}"
                class="px-3 py-1.5 text-sm font-medium rounded-md bg-primary text-white hover:bg-accent transition-colors flex items-center justify-center gap-1"
            >
                ➕ Dodaj
            </a>
            <a
                href="{{ route('admin.rezerwacje.index') }}"
                class="px-3 py-1.5 text-sm font-medium rounded-md bg-primary text-white hover:bg-accent transition-colors flex items-center justify-center gap-1"
            >
                ➕ Powrót
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($rezerwacje as $rezerwacja)
            <x-all-bookings-admin
                :id="$rezerwacja->id"
                :user="$rezerwacja->user->name"
                :tytul="$rezerwacja->seans->film->tytul"
                :czas_trwania="$rezerwacja->seans->film->czas_trwania"
                :data="$rezerwacja->seans->data"
                :liczba_miejsc="$rezerwacja->liczba_miejsc"
                :is_active="$rezerwacja->is_active"
            />
        @endforeach
    </div>
</x-default>
