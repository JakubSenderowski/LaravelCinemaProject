<x-default>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-white text-center w-full">Lista Kategorii</h1>
        <a href="{{ route('admin.kategorie.create') }}" class=" text-white px-3 py-1.5 rounded-md text-sm font-medium flex items-center justify-center gap-1">
            ➕ Dodaj
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
