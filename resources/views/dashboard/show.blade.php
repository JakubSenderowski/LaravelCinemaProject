<x-default>
    <div class="max-w-6xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-white mb-6 text-center">Panel administratora</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 place-items-center">

            <div class="bg-white/10 rounded-xl shadow-md p-6 flex flex-col items-center text-white hover:scale-105 transition w-full max-w-xs">
                <img src="/storage/icons/filmy-dashboard.png" alt="Filmy" class="w-34 h-34 object-contain mb-4">
                <h2 class="text-lg font-semibold mb-2">Filmy</h2>
                <a href="/filmy-zarzadzanie" class="btn btn-primary">Zarządzaj</a>
            </div>

            <div class="bg-white/10 rounded-xl shadow-md p-6 flex flex-col items-center text-white hover:scale-105 transition w-full max-w-xs">
                <img src="/storage/icons/rezerwacje-dashboard.png" alt="Rezerwacje" class="w-34 h-34 object-contain mb-4">
                <h2 class="text-lg font-semibold mb-2">Rezerwacje</h2>
                <a href="/rezerwacje-zarzadzanie" class="btn btn-primary">Zarządzaj</a>
            </div>


            <div class="bg-white/10 rounded-xl shadow-md p-6 flex flex-col items-center text-white hover:scale-105 transition w-full max-w-xs">
                <img src="/storage/icons/seanse-dashboard.png" alt="Seanse" class="w-34 h-34 object-contain mb-4">
                <h2 class="text-lg font-semibold mb-2">Seanse</h2>
                <a href="/seanse-zarzadzanie" class="btn btn-primary">Zarządzaj</a>
            </div>

            <div class="bg-white/10 rounded-xl shadow-md p-6 flex flex-col items-center text-white hover:scale-105 transition w-full max-w-xs">
                <img src="/storage/icons/sala-dashboard.png" alt="Sale" class="w-34 h-34 object-contain mb-4">
                <h2 class="text-lg font-semibold mb-2">Sale</h2>
                <a href="/sale-zarzadzanie" class="btn btn-primary">Zarządzaj</a>
            </div>


        </div>
    </div>
</x-default>
