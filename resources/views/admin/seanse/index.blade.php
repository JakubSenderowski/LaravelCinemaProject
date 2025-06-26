<x-default>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-white text-center w-full">Wszystkie Seanse</h1>
        @if(session('success'))
            <div class="bg-green text-white px-4 py-2 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{route('admin.seanse.create')}}" class=" text-white px-3 py-1.5 rounded-md text-sm font-medium flex items-center justify-center gap-1">
            ➕ Dodaj
        </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach($seanse as $seans)
    <x-all-seanse-admin
        :tytul="$seans->film->tytul"
        :nazwa="$seans->sala->nazwa"
        :data="$seans->data"
        :godzina="$seans->godzina"
        :is_active="$seans->is_active"
        :cena="$seans->cena"
        :id="$seans->id"
        />
        @endforeach
    </div>
</x-default>
