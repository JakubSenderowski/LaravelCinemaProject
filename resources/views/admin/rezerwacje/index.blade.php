<x-default>
    <div class="flex justify-between items-center mb-8">
        <form action="{{ route('admin.rezerwacje.search') }}" method="GET" class="mb-6">
            <input
                name="q"
                type="text"
                value="{{ request('q') }}"
                placeholder="Szukaj rezerwacji - po Imieniu Użytkownika"
                class="rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full"
            />
        </form>
        <h1 class="text-2xl font-bold text-white text-center w-full">Lista Rezerwacji</h1>
        @if(session('success'))
            <div class="bg-green text-white px-4 py-2 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('admin.rezerwacje.create') }}" class=" text-white px-3 py-1.5 rounded-md text-sm font-medium flex items-center justify-center gap-1">
            ➕ Dodaj
        </a>
        <a href="{{ route('admin.rezerwacje.index') }}" class=" text-white px-3 py-1.5 rounded-md text-sm font-medium flex items-center justify-center gap-1">
            ➕ Powrót
        </a>
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
