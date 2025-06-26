<x-default>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-white text-center w-full">Lista filmów</h1>
        <a href="{{ route('admin.rezerwacje.create') }}" class=" text-white px-3 py-1.5 rounded-md text-sm font-medium flex items-center justify-center gap-1">
            ➕ Dodaj
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
