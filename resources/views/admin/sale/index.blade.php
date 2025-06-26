<x-default>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-white text-center w-full">Lista Sal</h1>
        <a href="{{ route('admin.sale.create') }}" class=" text-white px-3 py-1.5 rounded-md text-sm font-medium flex items-center justify-center gap-1">
            ➕ Dodaj
        </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($sale as $sala)
        <x-all-sale-admin
            :nazwa="$sala->nazwa"
        :liczba_miejsc="$sala->liczba_miejsc"
        :is_active="$sala->is_active"
        />
        @endforeach
        </div>
</x-default>
