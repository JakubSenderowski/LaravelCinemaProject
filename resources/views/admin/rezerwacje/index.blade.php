<x-default>
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
