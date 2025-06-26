<x-default>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach($seanse as $seans)
    <x-all-seanse-admin
        :tytul="$seans->film->tytul"
        :nazwa="$seans->sala->nazwa"
        :data="$seans->data"
        :godzina="$seans->godzina"
        />
        @endforeach
    </div>
</x-default>
